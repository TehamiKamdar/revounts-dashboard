@extends("layouts.publisher.panel_app")

@pushonce('styles')
<style>

    .card {
        border: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-bottom: 1.5rem;
    }

    .card-header {
        background-color: white;
        border-bottom: 1px solid var(--light-color);
        padding: 1.25rem 1.5rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .account-profile {
        text-align: center;
    }

    .ap-img__main {
        max-height: 120px;
        object-fit: contain;
        border-radius: 0.5rem;
    }

    .ap-nameAddress__title {
        font-weight: 700;
        color: var(--primary-dark-color);
        margin-bottom: 0.5rem;
    }

    .ap-nameAddress__subTitle {
        color: var(--dark-color);
        font-size: 0.875rem;
    }

    .ap-button .btn {
        margin: 0.25rem;
        font-size: 0.875rem;
    }

    .btn-primary {
        background-color: var(--btn-primary-background-color);
        border-color: var(--btn-primary-border-color);
        color: var(--btn-primary-color);
    }

    .btn-outline-primary {
        color: var(--btn-primary-outline-color);
        border-color: var(--btn-primary-outline-border);
        background-color: var(--btn-primary-outline-background);
    }

    .btn-outline-primary:hover {
        background-color: var(--btn-primary-background-color);
        color: var(--btn-primary-color);
    }

    .profile-overview {
        text-align: center;
    }

    .po-details {
        flex: 1;
        min-width: 80px;
    }

    .po-details__title {
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }

    .po-details__sTitle {
        font-size: 0.75rem;
        color: var(--dark-color);
    }

    .profile-header-title {
        font-weight: 600;
        color: var(--primary-dark-color);
        font-size: 1.1rem;
    }

    .user-content-info__item {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .user-content-info__item i {
        margin-right: 0.5rem;
        color: var(--primary-color);
        width: 20px;
    }

    .user-skils-parent {
        list-style: none;
        padding-left: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .user-skils-parent__item a {
        display: inline-block;
        background-color: var(--primary-light-color);
        color: var(--primary-dark-color);
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-size: 0.875rem;
        text-decoration: none;
    }

    .ap-tab-header {
        position: relative;
        margin-bottom: 2rem;
    }

    .ap-tab-header__img {
        height: 200px;
        overflow: hidden;
        border-radius: 0.5rem;
    }

    .ap-tab-header__img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ap-tab-wrapper {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    .ap-tab-main {
        padding: 1rem 1.5rem;
    }

    .ap-tab-main .nav-link {
        color: white;
        padding: 0.5rem 1rem;
        margin-right: 0.5rem;
        border-radius: 0.25rem;
        font-weight: 500;
    }

    .ap-tab-main .nav-link.active,
    .ap-tab-main .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .overview-content h2 {
        font-size: 1.25rem;
        color: var(--primary-dark-color);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .badge-round {
        border-radius: 1rem;
    }

    .table th {
        background-color: var(--table-default-background);
        font-weight: 600;
        color: var(--dark-color);
    }

    .ap-product .table-responsive {
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .friends-widget h2 {
        font-size: 1.25rem;
        color: var(--primary-dark-color);
        margin-bottom: 0;
        font-weight: 600;
    }

    #trackingURL,
    #trackingShortURL {
        word-break: break-all;
        color: var(--primary-color);
        font-weight: 500;
    }

    .btn-outline-dashed {
        border: 1px dashed var(--primary-color);
        color: var(--primary-color);
    }

    .btn-outline-dashed:hover {
        background-color: var(--primary-light-color);
    }

    @media (max-width: 768px) {
        .profile-sider {
            position: static;
        }

        .ap-tab-header__img {
            height: 150px;
        }

        .ap-tab-main {
            flex-wrap: nowrap;
            overflow-x: auto;
            padding-bottom: 0.5rem;
        }

        .ap-tab-main .nav-link {
            white-space: nowrap;
        }
    }
</style>

@endpushonce

@pushonce('scripts')
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/drawer.js") }}"></script>
<script>
    function clickToCopy(id, msg) {
        copyToClipboard(document.getElementById(id))
        normalMsg({ "message": msg, "success": true });
    }
    function prepareVoucherFormContent(id) {
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
    function changeLimit() {
        $.ajax({
            url: '{{ route("publisher.set-limit") }}',
            type: 'GET',
            data: { "limit": $("#limit").val(), "type": "coupon" },
            success: function (response) {
                if (response) {
                    window.location.reload();
                }
            },
            error: function (response) {

            }
        });
    }
    function fetch_data(page = 1) {
        $.ajax({
            url: '{{ route("publisher.creatives.coupons.list") }}',
            type: 'GET',
            data: { "search_by_name": "{{ $advertiser->advertiser_id }}", page },
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
        $(document).on('click', '.atbd-pagination__item a', function (event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        $("#coupons-tab").one("click", function () {
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
            <div class="profile-content mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main mb-4">
                            <h4 class="text-capitalize breadcrumb-title"></h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <aside class="profile-sider">
                            <!-- Profile Account -->
                            <div class="card mb-4">
                                <div class="card-body text-center pt-4 pb-0 px-3">
                                    <div class="account-profile">
                                        <div class="ap-img w-100 d-flex justify-content-center mb-3">
                                            <!-- Profile picture image-->
                                            @if (!empty($advertiser->fetch_logo_url) && $advertiser->is_fetchable_logo)
                                                <img loading="lazy" class="ap-img__main" src="{{ $advertiser->fetch_logo_url }}"
                                                    alt="{{ $advertiser->name }}">
                                            @elseif (!empty($advertiser->logo))
                                                <img class="ap-img__main"
                                                    src="{{ \App\Helper\Static\Methods::staticAsset("$advertiser->logo") }}"
                                                    alt="{{ $advertiser->name }}">
                                            @else
                                                <img loading="lazy" class="ap-img__main"
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
                                                    if (count($regions) > 1) {
                                                        $regions = "Multi";
                                                    } elseif (count($regions) == 1 && $regions[0] == "00") {
                                                        $regions = "All";
                                                    } elseif (count($regions) == 1) {
                                                        $regions = $regions[0];
                                                    } else {
                                                        $regions = "-";
                                                    }
                                                @endphp
                                                <i class="ri-map-pin-line"></i> {{ $regions }}
                                            </p>
                                        </div>
                                        <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                                            <button type="button"
                                                class="btn btn-outline-primary btn-sm text-capitalize px-3 drawer-trigger"
                                                data-drawer="account">
                                                <i class="ri-mail-line"></i> Message
                                            </button>

                                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_PENDING)
                                                <button type="button" class="btn btn-warning btn-sm text-capitalize px-3"
                                                    disabled>
                                                    <i class="ri-time-line"></i> Pending
                                                </button>
                                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                                <button type="button" class="btn btn-success btn-sm text-capitalize px-3"
                                                    disabled>
                                                    <i class="ri-check-line"></i> Joined
                                                </button>
                                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_REJECTED)
                                                <button type="button" class="btn btn-danger btn-sm text-capitalize px-3"
                                                    disabled>
                                                    <i class="ri-close-line"></i> Rejected
                                                </button>
                                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_HOLD)
                                                <button type="button" class="btn btn-secondary btn-sm text-capitalize px-3"
                                                    disabled>
                                                    <i class="ri-stop-circle-line"></i> Hold
                                                </button>
                                            @else
                                                <button type="button"
                                                    class="btn btn-outline-success btn-sm text-capitalize px-3 follow"
                                                    data-toggle="modal" data-target="#modal-basic">
                                                    <i class="ri-user-add-line follow-icon"></i> Apply
                                                </button>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-footer mt-4 pt-3 pb-3 px-0">
                                        <div class="profile-overview d-flex justify-content-between flex-wrap">
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">
                                                    {{ $advertiser->commission }}{{ $advertiser->commission_type == "percentage" ? "%" : $advertiser->commission_type }}
                                                </h6>
                                                <span class="po-details__sTitle">Commission</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">{{ $regions }}</h6>
                                                <span class="po-details__sTitle">Regions</span>
                                            </div>
                                            <div class="po-details">
                                                <h6 class="po-details__title pb-1">
                                                    {{ $advertiser->average_payment_time ?? "-" }} <span
                                                        class="fs-12">days</span>
                                                </h6>
                                                <span class="po-details__sTitle">APC</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Profile Account End -->

                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                @include("template.publisher.widgets.deeplink", compact('advertiser'))
                            @endif

                            <!-- Profile User Bio -->
                            <div class="card mb-4">
                                <div class="user-bio border-bottom">
                                    <div class="card-header border-bottom-0 pt-3 pb-0 px-3">
                                        <div class="profile-header-title">
                                            About
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-3">
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
                                    <div class="card-header border-bottom-0 pt-3 pb-0 px-3">
                                        <div class="profile-header-title">
                                            Contact info
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-3">
                                        <div class="user-content-info">
                                            <p class="user-content-info__item">
                                                <i class="ri-mail-line"></i>{{ $advertiser->user->email ?? "-" }}
                                            </p>
                                            <p class="user-content-info__item mb-0">
                                                <i class="ri-global-line"></i>
                                                {!! $url !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-3 pb-0 px-3">
                                        <div class="profile-header-title">
                                            Primary Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-3">
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
                                    <div class="card-header border-bottom-0 pt-3 pb-0 px-3">
                                        <div class="profile-header-title">
                                            Supported Regions
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-3">
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
                                <div class="user-skils">
                                    <div class="card-header border-bottom-0 pt-3 pb-0 px-3">
                                        <div class="profile-header-title">
                                            Categories
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-3">
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
                            </div>
                        </aside>
                    </div>

                    <div class="col-lg-9 col-md-8">
                        <!-- Tab Menu -->
                        <div class="ap-tab ap-tab-header mb-4">
                            <div class="ap-tab-header__img">
                                <img src="{{ \App\Helper\Static\Methods::staticAsset("img/placeholder-cover.png") }}"
                                    alt="ap-header" class="img-fluid w-100">
                            </div>
                            <div class="ap-tab-wrapper">
                                <div class="header-nav p-3" id="ap-tab" role="tablist">
                                    <div class="nav-item">
                                        <a class="nav-link active" id="overview-tab" data-bs-toggle="pill" href="#overview"
                                            role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                    </div>
                                    <div class="nav-item">
                                        <a class="nav-link" id="commission-rates-tab" data-bs-toggle="pill"
                                            href="#commission-rates" role="tab" aria-controls="commission-rates"
                                            aria-selected="false">Commission Rates</a>
                                    </div>
                                    @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                        <div class="nav-item">
                                            <a class="nav-link" id="links-tab" data-bs-toggle="pill" href="#links" role="tab"
                                                aria-controls="links" aria-selected="false">Tracking links</a>
                                        </div>
                                    @endif
                                    <div class="nav-item">
                                        <a class="nav-link" id="terms-tab" data-bs-toggle="pill" href="#terms" role="tab"
                                            aria-controls="terms" aria-selected="false">Terms</a>
                                    </div>
                                    @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                        <div class="nav-item">
                                            <a class="nav-link" id="coupons-tab" data-bs-toggle="pill" href="#coupons"
                                                role="tab" aria-controls="coupons" aria-selected="false">Creative</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Tab Menu End -->

                        <div class="tab-content mt-4" id="ap-tabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview-tab">
                                <div class="ap-content-wrapper">
                                    @include("partial.admin.alert")
                                    <div class="row">
                                        <div class="col-lg-4 mb-4">
                                            <!-- Card 1 -->
                                            <div class="ap-po-details rounded-3 bg-white p-3 h-100">
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
                                            <!-- Card 1 End -->
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <!-- Card 2 End  -->
                                            <div class="ap-po-details rounded-3 bg-white p-3 h-100">
                                                <div class="overview-content">
                                                    <h2>Preferred Promotional Methods</h2>
                                                    <p>Promotional Traffic from these sources is allowed:</p>
                                                    <ul class="user-skils-parent">
                                                        @if($advertiser->promotional_methods)
                                                            @foreach(\App\Helper\PublisherData::getMixNames($advertiser->promotional_methods) as $method)
                                                                <li class="badge badge-round badge-success my-2">
                                                                    {{ $method }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            -
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Card 2 End  -->
                                        </div>
                                        <div class="col-lg-4 mb-4">
                                            <!-- Card 3 -->
                                            <div class="ap-po-details rounded-3 bg-white p-3 h-100">
                                                <div class="overview-content">
                                                    <h2>Restricted Methods</h2>
                                                    <p>Promotional Traffic from these sources are strictly not allowed:</p>
                                                    <ul class="user-skils-parent">
                                                        @if($advertiser->program_restrictions)
                                                            @foreach(\App\Helper\PublisherData::getMixNames($advertiser->program_restrictions) as $method)
                                                                <li class="badge badge-round badge-danger my-2">
                                                                    {{ $method }}
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            -
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Card 3 End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="commission-rates" role="tabpanel"
                                aria-labelledby="commission-rates-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Product Table -->
                                            <div class="card mt-3 mb-4">
                                                <div class="card-header text-capitalize px-3">
                                                    <h1 class="title">Commission Terms</h1>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-container">
                                                        <div class="table-responsive">
                                                        <table class="table table-hover">
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
                                                                            <td class="text-center">
                                                                                {{ $commission->rate ?? "-" }}{{ $commission->type == "amount" ? $advertiser->currency_code : "%" }}
                                                                            </td>
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
                                                <div class="card mb-4">
                                                    <div class="friends-widget">
                                                        <div class="pt-3 px-3">
                                                            <h1 class="title">Tracking Link</h1>
                                                        </div>
                                                        <div class="card-body">
                                                            @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                                <a href="{{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}"
                                                                    target="_blank"
                                                                    id="trackingURL">{{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}</a>
                                                                <br><br>
                                                                <a href="javascript:void(0)"
                                                                    onclick="clickToCopy('trackingURL', 'Tracking URL Successfully Copied.')"
                                                                    class="btn btn-primary-outline btn-sm">Copy Tracking Link</a>
                                                            @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                                <a href="javascript:void(0)"><i>Generating tracking
                                                                        links.....</i></a>
                                                                <br><br>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-primary-outline btn-sm">Copy Tracking Link</a>
                                                            @else
                                                                -
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mb-4">
                                                    <div class="friends-widget">
                                                        <div class="pt-3 px-3">
                                                            <h1 class="title">Short Tracking Link</h1>
                                                        </div>
                                                        <div class="card-body">
                                                            @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url_short) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                                <a href="{{ $advertiser->advertiser_applies->tracking_url_short }}"
                                                                    id="trackingShortURL"
                                                                    target="_blank">{{ $advertiser->advertiser_applies->tracking_url_short }}</a>
                                                                <br><br>
                                                                <a href="javascript:void(0)"
                                                                    onclick="clickToCopy('trackingShortURL', 'Tracking Short URL Successfully Copied.')"
                                                                    class="btn btn-primary-outline btn-sm">Copy Short Tracking
                                                                    Link</a>
                                                            @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                                <a href="javascript:void(0)"><i>Generating short tracking
                                                                        links.....</i></a>
                                                                <br><br>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-primary-outline btn-sm">Copy Short Tracking
                                                                    Link</a>
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
                                            <div class="card mb-4">
                                                <div class="friends-widget">
                                                    <div class="pt-3 px-3">
                                                        <h1 class="title">Program Terms</h1>
                                                    </div>
                                                    <div class="card-body">
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
                                        <div class="table-container" id="ap-overview"></div>
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
                            <h6 class="ap-nameAddress__subTitle text-left justify-content-start fs-14 pt-1 m-0"
                                id="advertiserID">Brand ID: {{ $advertiser->sid }}</h6>
                            <p class="font-weight-bold mt-3 text-black">Optional: Tell us about your promotional methods and
                                general marketing plan for this merchant to help speed up approval. (Websites you'll use,
                                PPC terms, etc.)</p>
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
                                        <input type="text" name="publisher_name" id="publisher_name"
                                            class="form-control form-control-sm" placeholder="Publisher Name"
                                            value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}"
                                            readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="advertiser_name">To</label>
                                        <input type="text" name="advertiser_name" id="advertiser_name"
                                            class="form-control form-control-sm" placeholder="Advertiser Name" readonly
                                            value="{{ $advertiser->name }}">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" id="subject" class="form-control form-control-sm"
                                            placeholder="Please Enter Subject For This Message">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="question_or_comment">Your Question or Comments</label>
                                        <textarea name="question_or_comment" id="question_or_comment"
                                            class="form-control form-control-sm"
                                            placeholder="Please Enter Your Question or Comments"></textarea>
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