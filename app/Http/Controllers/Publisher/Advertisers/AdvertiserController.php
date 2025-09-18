<?php

namespace App\Http\Controllers\Publisher\Advertisers;

use App\Enums\ExportType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Publisher\ApplyAdvertiserRequest;
use App\Http\Requests\Publisher\SendMessageToAdvertiserRequest;
use App\Service\Publisher\Advertiser\ApplyService;
use App\Service\Publisher\Advertiser\ExportService;
use App\Service\Publisher\Advertiser\FindService;
use App\Service\Publisher\Advertiser\OwnService;
use App\Service\Publisher\Advertiser\SearchService;
use App\Service\Publisher\Advertiser\SendMsgService;
use App\Service\Publisher\Advertiser\TypeService;
use App\Service\Publisher\Advertiser\ViewService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdvertiserController extends Controller
{
    /**
     * @param Request $request
     * @param FindService $service
     * @return Application|Factory|View|RedirectResponse|JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function actionFindAdvertiser(Request $request, FindService $service): View|Factory|RedirectResponse|Application|JsonResponse
    {
        return $service->init($request);
    }

    /**
     * @param Request $request
     * @param TypeService $service
     * @return Application|Factory|View|RedirectResponse|JsonResponse
     */
    public function actionAdvertiserTypes(Request $request, TypeService $service): View|Factory|RedirectResponse|Application|JsonResponse
    {
        return $service->init($request);
    }

    /**
     * @param Request $request
     * @param OwnService $service
     * @return View|Factory|RedirectResponse|Application|JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function actionOwnAdvertiser(Request $request, OwnService $service): View|Factory|RedirectResponse|Application|JsonResponse
    {
        return $service->init($request);
    }

    /**
     * @param ViewService $service
     * @param $sid
     * @return View|Factory|RedirectResponse|Application
     */
    public function actionViewAdvertiser(ViewService $service, $sid): View|Factory|RedirectResponse|Application
    {
        // dd($service->init($sid));
        return $service->init($sid);
    }

    /**
     * @param Request $request
     * @param SearchService $service
     * @return Application|Factory|View|RedirectResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function actionSearchAdvertiserFilter(Request $request, SearchService $service): View|Factory|RedirectResponse|Application
    {
        return $service->init($request);
    }

    /**
     * @param ApplyAdvertiserRequest $request
     * @param ApplyService $service
     * @return RedirectResponse
     */
    public function actionApplyNetwork(ApplyAdvertiserRequest $request, ApplyService $service): RedirectResponse
    {
        $data = $service->init($request);
        return redirect()->back()->with($data['type'], $data['message']);

    }

    /**
     * @param ExportType $type
     * @param ExportService $service
     * @return BinaryFileResponse|RedirectResponse
     */
    public function actionExportAdvertisers(ExportType $type, ExportService $service, Request $request): BinaryFileResponse|RedirectResponse
    {
        return $service->init($request, $type);
    }

    /**
     * @param SendMessageToAdvertiserRequest $request
     * @param SendMsgService $service
     * @return RedirectResponse
     */
    public function actionSendMsgToAdvertiser(SendMessageToAdvertiserRequest $request, SendMsgService $service): RedirectResponse
    {
        $data = $service->init($request);
        return redirect()->back()->with($data['type'], $data['message']);
    }
}
