<?php

namespace App\Console\Commands\Global;

use App\Helper\LinkGenerate;
use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Jobs\DeeplinkGenerateJob;
use App\Jobs\GenerateTrackingLinkJob;
use App\Jobs\GenerateTrackingLinkWithSubIDJob;
use App\Models\AdvertiserApply;
use App\Models\Advertiser;
use App\Models\FetchDailyData;
use App\Models\GenerateLink;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class LinkGenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Tracking / Deep Link.';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $jobCheck = GenerateLink::select('id')->where('is_processing', Vars::JOB_IN_PROCESS)->count();

        info("GENERATE LINK JOB: {$jobCheck}");

        if($jobCheck == 0)
        {
            $queue = Vars::LINK_GENERATE;
            $this->prepareFuncToGenerateDeepLink($queue);
            $this->prepareFuncToGenerateTrackingLink($queue, "GenerateTrackingLinkWithSubIDJob");
            $this->prepareFuncToGenerateTrackingLink($queue);
            $this->prepareFuncToGenerateAdvertiserApplyLink();
        }
    }

    private function prepareFuncToGenerateAdvertiserApplyLink(): void
    {
        $advertiserApplys = DB::table('advertiser_applies as aa')
    ->where('aa.status', AdvertiserApply::STATUS_ACTIVE)
    ->whereNull('aa.click_through_url')
    ->limit(300) // Chunk equivalent
    ->get();

foreach ($advertiserApplys as $advertiserApply) {
    $advertiserCollection = Advertiser::find($advertiserApply->internal_advertiser_id);

    $advertiserApply->advertiser = $advertiserCollection;
    $advertiser = $advertiserApply->advertiser;
    $link = new LinkGenerate();
    $clickLink = $link->generate($advertiserApply, $advertiserApply->publisher_id, $advertiserApply->website_id);

    if (!empty($clickLink)) {
        DB::table('advertiser_applies')
            ->where('id', $advertiserApply->id)
            ->update([
                'click_through_url' => $clickLink,
                'is_tracking_generate' => AdvertiserApply::GENERATE_LINK_COMPLETE
            ]);
    }
}
    }

    private function prepareFuncToGenerateTrackingLink($queue, $path = "GenerateTrackingLinkJob"): void
    {
        $this->jobDispatch($path, $queue, true, 200);
    }

    private function prepareFuncToGenerateDeepLink($queue): void
    {
        $path = "DeeplinkGenerateJob";
        $this->jobDispatch($path, $queue, true, 200);
    }

    public function jobDispatch($path, $queue, $isStatusChange, $take): void
    {
        $jobs = GenerateLink::select([
            'id', 'payload', 'queue', 'path', 'publisher_id', 'website_id', 'sub_id', 'is_processing'
        ])
            ->where("date", "<=", now()->format(Vars::CUSTOM_DATE_FORMAT_2))
            ->where("status", Vars::JOB_ACTIVE)
            ->where("queue", $queue)
            ->where("path", $path)
            ->take($take)
            ->get();

        foreach ($jobs as $job)
        {

            try {

                if(isset($job->id))
                {
                    info("JOB ID: {$job->id}");

//                    $job->update([
//                        'is_processing' => Vars::JOB_IN_PROCESS
//                    ]);
                    $payload = json_decode($job->payload);
                    $queue = $job->queue;
                    switch ($job->path)
                    {
                        case "GenerateTrackingLinkJob":
                            if(isset($payload->advertiser))
                            {
                                GenerateTrackingLinkJob::dispatch($job->id, $payload->advertiser, $job->publisher_id, $job->website_id, $job->sub_id, $isStatusChange)->onQueue($queue);
                            }
                            else
                            {
//                                Methods::customError("LinkGenerateCommand (Generate Tracking Link Job)", "PAYLOAD ADVERTISER EMPTY");
//                                Methods::customError("LinkGenerateCommand (Generate Tracking Link Job)", $payload);

                                GenerateLink::where("id", $job->id)->update([
                                    'status' => Vars::JOB_STATUS_COMPLETE,
                                    'is_processing' => Vars::JOB_ACTIVE
                                ]);
                            }
                            break;

                        case "DeeplinkGenerateJob":
                            $payload = json_decode($job->payload, true);
                            $payload['job_id'] = $job->id;
                            $payload['sub_id'] = $job->sub_id;
                            DeeplinkGenerateJob::dispatch($payload, $isStatusChange)->onQueue($queue);
                            break;

                        case "GenerateTrackingLinkWithSubIDJob":
                            if(isset($payload->advertiser))
                            {
                                GenerateTrackingLinkWithSubIDJob::dispatch($job->id, $payload->advertiser, $job->publisher_id, $job->website_id, $job->sub_id, $isStatusChange)->onQueue($queue);
                            }
                            else
                            {
//                                Methods::customError("LinkGenerateCommand (Generate Tracking Link Job)", "PAYLOAD ADVERTISER EMPTY");
//                                Methods::customError("LinkGenerateCommand (Generate Tracking Link Job)", $payload);

                                GenerateLink::where("id", $job->id)->update([
                                    'status' => Vars::JOB_STATUS_COMPLETE,
                                    'is_processing' => Vars::JOB_ACTIVE
                                ]);

                                if($isStatusChange)
                                {
                                    GenerateLink::where('status', Vars::JOB_STATUS_IN_PROCESS)->update([
                                        'date' => now()->format(Vars::CUSTOM_DATE_FORMAT_2)
                                    ]);
                                }
                            }
                            break;

                        default:
                            break;
                    }
                }

            } catch (\Exception $exception)
            {
                $job->update([
                    'is_processing' => Vars::JOB_ERROR
                ]);
            }
        }
    }
}

