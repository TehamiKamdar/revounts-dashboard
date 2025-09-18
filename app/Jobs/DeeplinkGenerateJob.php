<?php

namespace App\Jobs;

use App\Helper\DeeplinkGenerate;
use App\Helper\Static\Methods;
use App\Helper\Static\Vars;
use App\Models\Advertiser;
use App\Models\AdvertiserApply;
use App\Models\DeeplinkTracking;
use App\Models\DeeplinkTrackingDetail;
use App\Models\GenerateLink;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\DeepLink as GenerateDeepLinkTrait;

class DeeplinkGenerateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, GenerateDeepLinkTrait;

    // override the queue tries
    // configuration for this job
    public $tries = 4;

    protected $data, $isStatusChange;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data, bool $isStatusChange)
    {
        $this->data = $data;
        $this->isStatusChange = $isStatusChange;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $errorCode = $errorMessage = $retryDateTime = null;

        try {
            if(isset($this->data['id']))
            {
                Methods::customDeepLinkGenerate("GENERATE DEEP LINK", "GENERATE LINK ID: {$this->data['job_id']} || PROCESS START || STARTING");

                $advertiserApply = AdvertiserApply::with('advertiser')->where('internal_advertiser_id', $this->data['advertiser_id'])->first();
                $advertiser = $advertiserApply->advertiser ?? null;

                if(empty($advertiser))
                {
                    $advertiserApply = AdvertiserApply::with('advertiser')->where('id', $this->data['advertiser_id'])->first();
                    $advertiser = $advertiserApply->advertiser ?? null;

                    if(empty($advertiser))
                    {
                        $advertiser = Advertiser::where('id', $this->data['advertiser_id'])->first();

                        if(empty($advertiser))
                        {
                            $advertiser = Advertiser::where('api_advertiser_id', $this->data['advertiser_id'])->first();
                        }
                    }
                }

                if(!isset($advertiser->id)) {
                    Methods::customDeepLinkGenerate("GENERATE DEEP LINK", "GENERATE  LINK ID: {$this->data['job_id']} || PROCESS START || NOT FOUND");

                    GenerateLink::where("id", $this->data['job_id'])->update([
                        'status' => Vars::JOB_STATUS_COMPLETE,
                        'is_processing' => Vars::JOB_ACTIVE
                    ]);

                    Methods::customDeepLinkGenerate("GENERATE DEEP LINK", "GENERATE LINK ID: {$this->data['job_id']} || PROCESS END || NOT FOUND");
                }
                else
                {
                    Methods::customDeepLinkGenerate("{$advertiser->source} GENERATE DEEP LINK", "PROCESSING START");
                    $link = new DeeplinkGenerate();
                    $clickLink = $link->generate($advertiser, $this->data['publisher_id'], $this->data['website_id'], $this->data['sub_id'], $this->data['landing_url']);

                    info("DEEPLINK GENERATE JOB: {$clickLink}");
                    info("DEEPLINK ID: {$this->data['id']}");

                    $link = DeeplinkTracking::select(['id', 'click_through_url', 'tracking_url'])->where('id', $this->data['id'])->first();

                    if($link)
                    {
                        $link->update([
                            "click_through_url" => $clickLink,
                        ]);

                        Methods::customDeepLinkGenerate(null, "TRACKING URL: {$clickLink}");
                        Methods::customDeepLinkGenerate(null, "SHORT URL: {$link->tracking_url}");
                    }

                    Methods::customDeepLinkGenerate("{$advertiser->source} GENERATE DEEP LINK", "PROCESSING END");

                    Methods::customDeepLinkGenerate("{$advertiser->source} GENERATE DEEP LINK", "GENERATE LINK ID: {$this->data['job_id']} || PROCESS START");

                    GenerateLink::where("id", $this->data['job_id'])->update([
                        'status' => Vars::JOB_STATUS_COMPLETE,
                        'is_processing' => Vars::JOB_ACTIVE
                    ]);

                    Methods::customDeepLinkGenerate("{$advertiser->source} GENERATE DEEP LINK", "GENERATE LINK ID: {$this->data['job_id']} || PROCESS END");
                }

            }
        } catch (\Throwable $exception) {

            Methods::customError("DEEP LINK GENERATE JOB", $exception);
            $errorCode = $exception->getCode();
            $errorMessage = $exception->getMessage();
            $retryDateTime = now()->addHours(1)->format(Vars::CUSTOM_DATE_FORMAT_2);

            GenerateLink::where("id", $this->data['job_id'])->update([
                "error_code" => $errorCode,
                "error_message" => $errorMessage,
                'date' => $retryDateTime,
                'is_processing' => Vars::JOB_ERROR
            ]);

        }

        Methods::customDeepLinkGenerate("GENERATE DEEP LINK", "GENERATE LINK ID: {$this->data['job_id']} || PROCESS END || COMPLETED");

    }
}
