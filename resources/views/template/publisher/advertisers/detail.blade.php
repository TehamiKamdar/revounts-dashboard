@extends("layouts.publisher.panel_app")

@pushonce('styles')

    <style>
        .friends-widget .card-body .labelLine, .friends-widget .card-body .trackerHeading {max-width: 100%!important;}.friends-widget .card-body .trackerMinimize {display:none!important;}
    </style>

@endpushonce

@pushonce('scripts')
    <script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/drawer.js") }}"></script>
    <script>
        function clickToCopy(id, msg)
        {
            copyToClipboard(document.getElementById(id))
            normalMsg({"message": msg, "success": true});
        }
        function prepareVoucherFormContent(id)
        {
            $.ajax({
                url: `/publisher/creatives/coupons/${id}`,
                type: 'GET',
                success: function (response) {
                    $("#voucherModalContent").html(response)
                },
                error: function (response) {

                }
            });
        }
        function changeLimit()
        {
            $.ajax({
                url: '{{ route("publisher.set-limit") }}',
                type: 'GET',
                data: {"limit": $("#limit").val(), "type": "coupon"},
                success: function (response) {
                    if(response) {
                        window.location.reload();
                    }
                },
                error: function (response) {

                }
            });
        }
        function fetch_data(page = 1)
        {
            $.ajax({
                url: '{{ route("publisher.creatives.coupons.list") }}',
                type: 'GET',
                data: {"search_by_name": "{{ $advertiser->advertiser_id }}", page},
                beforeSend: function () {
                },
                success: function (response) {
                    $("#ap-overview").html(response.html);
                    $("#limit").change(function () {
                        changeLimit();
                    });
                },
                error: function (response) {

                }
            });
        }
        document.addEventListener("DOMContentLoaded", function () {
            $(document).on('click', '.atbd-pagination__item a', function(event){
                event.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });
            $("#coupons-tab").one( "click", function () {
                fetch_data();
            });
            $("#applyAdvertiser").submit(function () {
                $("#applyAdvertiserBttn").prop('disabled', true);
            });
        });
    </script>
@endpushonce

@section("content")

    <div class="contents">

        <div class="container-fluid">
            <div class="profile-content mb-50">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"></h4>

                        </div>

                    </div>
                    <div class="cos-lg-3 col-md-4  ">
                        <aside class="profile-sider">
                            <!-- Profile Acoount -->
                            <div class="card mb-25">
                                <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0">

                                    <div class="account-profile">
                                    <div class="ap-img w-100 d-flex justify-content-center">
                                            <!-- Profile picture image-->
                                          @if (!empty($advertiser->fetch_logo_url) && $advertiser->is_fetchable_logo)
    <img loading="lazy" class="ap-img__main w-auto h-40 mb-3 d-flex" 
         src="{{ $advertiser->fetch_logo_url }}" alt="{{ $advertiser->name }}">
@elseif (!empty($advertiser->logo))
    <img src="{{ \App\Helper\Static\Methods::staticAsset("$advertiser->logo") }}" 
         alt="{{ $advertiser->name }}" class="mw-50px mw-lg-75px">
@else
    <img loading="lazy" class="ap-img__main w-auto h-40 mb-3 d-flex" 
         src="{{ \App\Helper\Static\Methods::isImageShowable($advertiser->logo) }}" 
         alt="{{ $advertiser->name }}">
@endif

                                        </div>
                                        <div class="ap-nameAddress pb-3 pt-1">
                                            <h5 class="ap-nameAddress__title">{{ $advertiser->name }}</h5>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0">ID: {{ $advertiser->sid }}</p>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0">
                                                @php
                                                    $regions = $advertiser->primary_regions ?? [];
                                                    if(count($regions) > 1) {
                                                        $regions = "Multi";
                                                    } elseif (count($regions) == 1 && $regions[0] == "00") {
                                                        $regions = "All";
                                                    } elseif (count($regions) == 1) {
                                                        $regions = $regions[0];
                                                    } else {
                                                        $regions = "-";
                                                    }
                                                @endphp
                                                <span data-feather="map-pin"></span>{{ $regions }}
                                            </p>
                                        </div>
                                        <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                                            <button type="button" class="border text-capitalize px-25 color-gray transparent shadow2 radius-md drawer-trigger" data-drawer="account">
                                                <span data-feather="mail"></span>message</button>

                                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_PENDING)

                                                <button type="button" class="btn btn-warning  btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-clock color-white"></i> Pending
                                                </button>

                                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)

                                                <button type="button" class="btn btn-success btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-check color-white"></i> Joined
                                                </button>

                                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_REJECTED)

                                                <button type="button" class="btn btn-danger btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-times color-white"></i> Rejected
                                                </button>

                                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_HOLD)

                                                <button type="button" class="btn btn-secondary btn-default btn-squared text-capitalize px-25 shadow2 radius-md" disabled>
                                                    <i class="las la-stop-circle color-white"></i> Hold
                                                </button>

                                            @else

                                                <button type="button" class="btn btn-default btn-squared btn-outline-success text-capitalize px-25 shadow2 follow radius-md" data-toggle="modal" data-target="#modal-basic">
                                                    <span class="las la-user-plus follow-icon"></span> Apply
                                                </button>

                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer mt-20 pt-20 pb-20 px-0">
                                        <div class="profile-overview d-flex justify-content-between flex-wrap">
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">{{ $advertiser->commission }}{{ $advertiser->commission_type == "percentage" ? "%" : $advertiser->commission_type }}</h6>
                                                <span class="po-details__sTitle">Commission</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">{{ $regions }}</h6>
                                                <span class="po-details__sTitle">Regions</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">{{ $advertiser->average_payment_time ?? "-" }} <span class="fs-12">days</span></h6>
                                                <span class="po-details__sTitle">APC</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile Acoount End -->

                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                @include("template.publisher.widgets.deeplink", compact('advertiser'))
                            @endif

                            <!-- Profile User Bio -->
                            <div class="card mb-25">
                                <div class="user-bio border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-30 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            About
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <div class="user-bio__content">
                                            @if($advertiser->short_description)
                                                <p class="m-0">
                                                    {!! \Illuminate\Support\Str::limit($advertiser->short_description, 2000) !!}
                                                </p>
                                                <p class="mt-3">
                                                    <small>
                                                        @if(strlen($advertiser->short_description) >= 80)
                                                            Read More to Detail Introduction
                                                        @endif
                                                    </small>
                                                </p>
                                            @else
                                                <p class="m-0">
                                                    {!! \Illuminate\Support\Str::limit($advertiser->description, 80) !!}
                                                </p>
                                                <p class="mt-3">
                                                    <small>
                                                        @if(strlen($advertiser->description) >= 80)
                                                            Read More to Detail Introduction
                                                        @endif
                                                    </small>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="user-info border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Contact info
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <div class="user-content-info">
                                            <p class="user-content-info__item">
                                                <span data-feather="mail"></span>{{ $advertiser->user->email ?? "-" }}
                                            </p>
                                            <p class="user-content-info__item mb-0">
                                                <span data-feather="globe"></span>
                                                {!! $url !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Primary Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            @if($advertiser->primary_regions)
                                                @foreach($advertiser->primary_regions as $region)
                                                    <li class="user-skils-parent__item">
                                                        <a href="#">{{ $region['region'] ?? $region }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Supported Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            @if($advertiser->supported_regions)
                                                @foreach($advertiser->supported_regions as $region)
                                                    <li class="user-skils-parent__item">
                                                        <a href="#">{{ $region['region'] ?? $region }}</a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="user-skils-parent__item">
                                                    -
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Categories
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            @if($advertiser->categories)
                                                @foreach(\App\Helper\PublisherData::getMixNames($advertiser->categories) as $category)
                                                    <li class="user-skils-parent__item">
                                                        <a href="#">{{ $category ?? "-" }}</a>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="user-skils-parent__item">
                                                    -
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
{{--                                <div class="db-social border-bottom">--}}
{{--                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">--}}
{{--                                        <div class="profile-header-title">--}}
{{--                                            Social Profiles--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body pt-md-1 pt-0">--}}
{{--                                        <ul class="db-social-parent mb-0">--}}
{{--                                            <li class="db-social-parent__item">--}}
{{--                                                <a class="color-facebook hover-facebook wh-44 fs-22" href="#">--}}
{{--                                                    <i class="lab la-facebook-f"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="db-social-parent__item">--}}
{{--                                                <a class="color-twitter hover-twitter wh-44 fs-22" href="#">--}}
{{--                                                    <i class="lab la-twitter"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="db-social-parent__item">--}}
{{--                                                <a class="color-ruby hover-ruby  wh-44 fs-22" href="#">--}}
{{--                                                    <i class="las la-basketball-ball"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="db-social-parent__item">--}}
{{--                                                <a class="color-instagram hover-instagram wh-44 fs-22" href="#">--}}
{{--                                                    <i class="lab la-instagram"></i>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <!-- Profile User Bio End -->
{{--                            <!-- Profile files Bio -->--}}
{{--                            <div class="card mb-25">--}}
{{--                                <div class="card-header py-20  px-sm-25 px-3 ">--}}
{{--                                    <h6>files</h6>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="mb-20">--}}

{{--                                        <div class="files-area d-flex justify-content-between align-items-center">--}}
{{--                                            <div class="files-area__left d-flex align-items-center">--}}
{{--                                                <div class="files-area__img">--}}
{{--                                                    <img src="{{ $advertiser->logo }}" alt="img" class="wh-42">--}}
{{--                                                </div>--}}
{{--                                                <div class="files-area__title">--}}
{{--                                                    <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">Main-admin-design.zip</p>--}}
{{--                                                    <span class="color-light fs-12 d-flex ">7.05 MB</span>--}}
{{--                                                    <div class="d-flex text-capitalize">--}}
{{--                                                        <a href="#" class="fs-12 fw-500 color-primary ">download</a>--}}
{{--                                                        <a href="#" class="fs-12 fw-500 color-primary ml-10"></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="mb-0">--}}

{{--                                        <div class="files-area d-flex justify-content-between align-items-center">--}}
{{--                                            <div class="files-area__left d-flex align-items-center">--}}
{{--                                                <div class="files-area__img">--}}
{{--                                                    <img src="{{ $advertiser->logo }}" alt="img" class="wh-42">--}}
{{--                                                </div>--}}
{{--                                                <div class="files-area__title">--}}
{{--                                                    <p class="mb-0 fs-14 fw-500 color-dark text-capitalize">Product-guidelines.pdf</p>--}}
{{--                                                    <span class="color-light fs-12 d-flex ">5.07 KB</span>--}}
{{--                                                    <div class="d-flex text-capitalize">--}}
{{--                                                        <a href="#" class="fs-12 fw-500 color-primary ">view</a>--}}
{{--                                                        <a href="#" class="fs-12 fw-500 color-primary ml-10">download</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Profile files End -->--}}
                        </aside>
                    </div>

                    <div class="col">
                        <!-- Tab Menu -->
                        <div class="ap-tab ap-tab-header">
                            <div class="ap-tab-header__img">
                                <img src="{{ \App\Helper\Static\Methods::staticAsset("img/placeholder-cover.png") }}" alt="ap-header" class="img-fluid w-100">
                            </div>
                            <div class="ap-tab-wrapper">
                                <ul class="nav px-25 ap-tab-main" id="ap-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="overview-tab" data-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="commission-rates-tab" data-toggle="pill" href="#commission-rates" role="tab" aria-controls="commission-rates" aria-selected="false">Commission Rates</a>
                                    </li>
                                    @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                        <li class="nav-item">
                                            <a class="nav-link" id="links-tab" data-toggle="pill" href="#links" role="tab" aria-controls="links" aria-selected="false">Tracking links</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" id="terms-tab" data-toggle="pill" href="#terms" role="tab" aria-controls="terms" aria-selected="false">Terms</a>
                                    </li>
                                    @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                        <li class="nav-item">
                                            <a class="nav-link" id="coupons-tab" data-toggle="pill" href="#coupons" role="tab" aria-controls="coupons" aria-selected="false">Creative</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <!-- Tab Menu End -->
                        <div class="tab-content mt-25" id="ap-tabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="ap-content-wrapper">
                                    @include("partial.admin.alert")
                                    <div class="row">
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 1 -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Detailed Introduction</h2>
                                                        <div>
                                                            @if($advertiser->description)
                                                                {!! $advertiser->description ?? "-" !!}
                                                            @else
                                                                {!! $advertiser->short_description !!}
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <!-- Card 1 End -->
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 2 End  -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Preferred Promotional Methods</h2>
                                                        <p>Promotional Traffic from these sources is allowed:</p>
                                                        <ul class="user-skils-parent">
                                                            @if($advertiser->promotional_methods)
                                                                @foreach(\App\Helper\PublisherData::getMixNames($advertiser->promotional_methods) as $method)
                                                                    <li class="badge badge-round badge-success badge-lg my-2 mr-2">
                                                                        {{ $method }}
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                -
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card 2 End  -->
                                        </div>
                                        <div class="col-lg-4 mb-25">
                                            <!-- Card 3 -->
                                            <div class="ap-po-details radius-xl bg-white d-flex justify-content-between">
                                                <div>
                                                    <div class="overview-content">
                                                        <h2>Restricted Methods</h2>
                                                        <p>Promotional Traffic from these sources are strictly not allowed:</p>
                                                        <ul class="user-skils-parent">
                                                            @if($advertiser->program_restrictions)
                                                                @foreach(\App\Helper\PublisherData::getMixNames($advertiser->program_restrictions) as $method)
                                                                    <li class="badge badge-round badge-danger badge-lg my-2 mr-2">
                                                                        {{ $method }}
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                -
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card 3 End -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="commission-rates" role="tabpanel" aria-labelledby="commission-rates-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Product Table -->
                                            <div class="card mt-25 mb-40">
                                                <div class="card-header text-capitalize px-md-25 px-3">
                                                    <h2>Commission Terms</h2>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="ap-product">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Condition</th>
                                                                    <th class="text-center">Commission Rate</th>
                                                                    <th>Additional info</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @if(count($advertiser->commissions))
                                                                        @foreach($advertiser->commissions as $commission)
                                                                            <tr>
                                                                                @if(empty($commission->date))
                                                                                    <td>{{ now()->format("Y-m-d") }}</td>
                                                                                @else
                                                                                    <td>{{ $commission->date }}</td>
                                                                                @endif
                                                                                <td>{{ $commission->condition ?? "-" }}</td>
                                                                                <td class="text-center">{{ $commission->rate ?? "-" }}{{ $commission->type == "amount" ? $advertiser->currency_code : "%" }}</td>
                                                                                <td>{{ $commission->info ?? "-" }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        <tr class="border-0">
                                                                            <td class="text-center" colspan="4">
                                                                                <small>No Commission Rates Exist</small>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Table End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                <div class="tab-pane fade" id="links" role="tabpanel" aria-labelledby="links-tab">
                                    <div class="ap-post-content">
                                        <div class="row">
                                            <div class="col-xxl-12">
                                                <div class="card global-shadow mb-25">
                                                    <div class="friends-widget">
                                                        <div class="card-header px-md-25 px-3">
                                                            <h2>Tracking Link</h2>
                                                        </div>
                                                        <div class="card-body ">
                                                           
                                                            @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                                <a href="{{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}" target="_blank" id="trackingURL">{{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}</a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" onclick="clickToCopy('trackingURL', 'Tracking URL Successfully Copied.')" class="btn btn-xs btn-outline-dashed">Copy Tracking Link</a>
                                                            @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                                <a href="javascript:void(0)"><i>Generating tracking links.....</i></a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" class="btn btn-xs btn-outline-dashed">Copy Tracking Link</a>
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card global-shadow mb-25">
                                                    <div class="friends-widget">
                                                        <div class="card-header px-md-25 px-3">
                                                            <h2>Short Tracking Link</h2>
                                                        </div>
                                                        <div class="card-body ">
                                                            @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url_short) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                                <a href="{{ $advertiser->advertiser_applies->tracking_url_short }}" id="trackingShortURL" target="_blank">{{ $advertiser->advertiser_applies->tracking_url_short }}</a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" onclick="clickToCopy('trackingShortURL', 'Tracking Short URL Successfully Copied.')" class="btn btn-xs btn-outline-dashed">Copy Short Tracking Link</a>
                                                            @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                                <a href="javascript:void(0)"><i>Generating short tracking links.....</i></a>
                                                                <br /><br />
                                                                <a href="javascript:void(0)" class="btn btn-xs btn-outline-dashed">Copy Short Tracking Link</a>
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-xxl-8">
                                            <!-- Friend post -->
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h2>Program Terms</h2>
                                                    </div>
                                                    <div class="card-body ">
                                                        {!! $advertiser->program_policies ?? "-" !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Friend Post End -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                <div class="tab-pane fade" id="coupons" role="tabpanel" aria-labelledby="coupons-tab">
                                    <div class="ap-post-content">
                                        <div class="orderDatatable global-shadow border py-30 px-sm-30 px-20 bg-white radius-xl w-100 mb-30" id="ap-overview"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="{{ route("publisher.apply-advertiser") }}" method="POST" id="applyAdvertiser">
                    @csrf
                    <input type="hidden" id="a_id" name="a_id" value="{{ $advertiser->sid }}">
                    <input type="hidden" id="a_name" name="a_name" value="{{ $advertiser->name }}">
                    <div class="modal-content modal-bg-white ">
                        <div class="modal-header">
                            <h6 class="modal-title">Apply To Program</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="ap-nameAddress__title text-black" id="advertiserName">{{ $advertiser->name }}</h6>
                            <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0" id="advertiserID">Brand ID: {{ $advertiser->sid }}</h6>
                            <p class="font-weight-bold mt-3 text-black">Optional: Tell us about your promotional methods and general marketing plan for this merchant to help speed up approval. (Websites you'll use, PPC terms, etc.)</p>
                            <textarea class="form-control" rows="4" cols="4" name="message"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="applyAdvertiserBttn" class="btn btn-primary btn-sm">Apply</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- .atbd-drawer -->
        <div class="drawer-basic-wrap right account">
            <div class="atbd-drawer drawer-account d-none">
                <div class="atbd-drawer__header d-flex aling-items-center justify-content-between">
                    <h6 class="drawer-title">Send Message To The Advertiser</h6>
                    <a href="#" class="btdrawer-close"><i class="la la-times"></i></a>
                </div><!-- ends: .atbd-drawer__header -->
                <div class="atbd-drawer__body">
                    <div class="drawer-content">
                        <div class="drawer-account-form form-basic">
                            <form action="{{ route("publisher.send-msg-to-advertiser") }}" method="POST">
                                @csrf
                                <input type="hidden" name="advertiser_id" id="advertiser_id" value="{{ $advertiser->id }}">

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="publisher_name">From</label>
                                        <input type="text" name="publisher_name" id="publisher_name" class="form-control form-control-sm" placeholder="Publisher Name" value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="advertiser_name">To</label>
                                        <input type="text" name="advertiser_name" id="advertiser_name" class="form-control form-control-sm" placeholder="Advertiser Name" readonly value="{{ $advertiser->name }}">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control form-control-sm" placeholder="Please Enter Subject For This Message" >
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="question_or_comment">Your Question or Comments</label>
                                        <textarea name="question_or_comment" id="question_or_comment" class="form-control form-control-sm" placeholder="Please Enter Your Question or Comments"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-default btn-squared ">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- ends: .atbd-drawer__body -->
            </div>
        </div>
        <div class="overlay-dark"></div>
        <div class="overlay-dark-l2"></div>
        <!-- ends: .atbd-drawer -->

    </div>

@endsection
