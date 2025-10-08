@extends("layouts.publisher.panel_app")

@pushonce('styles')
<style>
    :root {
        --profile-gradient: linear-gradient(135deg, #aa66ea 0%, #764ba2 100%);
        --card-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --hover-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .profile-hero {
        background: var(--profile-gradient);
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 4px solid white;
        background: white;
        overflow: hidden;
    }

    .profile-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--hover-shadow);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .stat-icon.commission {
        background: linear-gradient(135deg, #667eea, #764ba2);
    }

    .stat-icon.regions {
        background: linear-gradient(135deg, #f093fb, #f5576c);
    }

    .stat-icon.payment {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
    }

    .nav-pills-custom .nav-link {
        border-radius: 0.75rem;
        padding: 0.75rem 1.5rem;
        margin: 0.25rem;
        border: 1px solid transparent;
        transition: all 0.3s ease;
        color: var(--dark-color);
        font-weight: 500;
    }

    .nav-pills-custom .nav-link.active {
        background: var(--profile-gradient);
        color: white;
        border-color: transparent;
        box-shadow: 0 4px 15px rgba(170, 102, 234, 0.4);
    }

    .nav-pills-custom .nav-link:hover:not(.active) {
        border-color: var(--primary-color);
        color: var(--primary-color);
        background: rgba(164, 102, 234, 0.1);
    }

    .feature-badge {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.5rem;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 500;
        margin: 0.25rem;
        display: inline-block;
    }

    .feature-badge.danger {
        background: linear-gradient(135deg, #f093fb, #f5576c);
    }

    .feature-badge.success {
        background: linear-gradient(135deg, #4facfe, #00f2fe);
    }

    .content-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: var(--card-shadow);
        margin-bottom: 1.5rem;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .action-btn {
        padding: 0.5rem;
        border-radius: 0.75rem;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-btn.primary {
        background: var(--profile-gradient);
        color: white;
    }

    .action-btn.outline {
        border-color: var(--light-color);
        color: var(--light-color);
        background: var(--primary-color);
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .tab-content {
        background: transparent;
        border: none;
        padding: 0;
    }

    .tracking-link-box {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border: 2px dashed #dee2e6;
        border-radius: 1rem;
        padding: 1.5rem;
        text-align: center;
    }

    @media (max-width: 768px) {
        .profile-hero {
            padding: 1.5rem;
            text-align: center;
        }

        .nav-pills-custom .nav-link {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
    }
</style>
@endpushonce

@pushonce('scripts')
<script>
    // Your existing JavaScript remains the same
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
                // Handle error
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
                // Handle error
            }
        });
    }

    function fetch_data(page = 1) {
        $.ajax({
            url: '{{ route("publisher.creatives.coupons.list") }}',
            type: 'GET',
            data: { "search_by_name": "{{ $advertiser->advertiser_id }}", page },
            beforeSend: function () {
                // Show loading
            },
            success: function (response) {
                $("#ap-overview").html(response.html);
                $("#limit").change(function () {
                    changeLimit();
                });
            },
            error: function (response) {
                // Handle error
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

        // Smooth scrolling for anchor links
        $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
            const target = $(e.target).attr("href");
            $('html, body').animate({
                scrollTop: $(target).offset().top - 100
            }, 500);
        });
    });
</script>
@endpushonce

@section("content")
    <div class="contents">
        <div class="container-fluid">
            <!-- Profile Hero Section -->
            <div class="profile-hero">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="profile-avatar">
                            @if (!empty($advertiser->fetch_logo_url) && $advertiser->is_fetchable_logo)
                                <img loading="lazy" src="{{ $advertiser->fetch_logo_url }}" alt="{{ $advertiser->name }}">
                            @elseif (!empty($advertiser->logo))
                                <img src="{{ \App\Helper\Static\Methods::staticAsset("$advertiser->logo") }}"
                                    alt="{{ $advertiser->name }}">
                            @else
                                <img loading="lazy" src="{{ \App\Helper\Static\Methods::isImageShowable($advertiser->logo) }}"
                                    alt="{{ $advertiser->name }}">
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <h1 class="h2 mb-2">{{ $advertiser->name }}</h1>
                        <p class="mb-3 opacity-75">ID: {{ $advertiser->sid }} •
                            @php
                                $regions = $advertiser->primary_regions ?? [];
                                if (count($regions) > 1) {
                                    $regions = "Multi-Region";
                                } elseif (count($regions) == 1 && $regions[0] == "00") {
                                    $regions = "Global";
                                } elseif (count($regions) == 1) {
                                    $regions = $regions[0];
                                } else {
                                    $regions = "Not Specified";
                                }
                            @endphp
                            <i class="ri-map-pin-line"></i> {{ $regions }}
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_PENDING)
                                <span class="feature-badge warning">
                                    <i class="ri-time-line"></i> Application Pending
                                </span>
                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                <span class="feature-badge success">
                                    <i class="ri-check-line"></i> Program Joined
                                </span>
                            @elseif(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_REJECTED)
                                <span class="feature-badge danger">
                                    <i class="ri-close-line"></i> Application Rejected
                                </span>
                            @else
                                <button type="button" class="action-btn primary" data-bs-toggle="modal"
                                    data-bs-target="#modal-basic">
                                    <i class="ri-user-add-line"></i> Apply to Program
                                </button>
                            @endif

                            <button type="button" class="action-btn outline drawer-trigger" data-bs-drawer="account">
                                <i class="ri-mail-line"></i> Send Message
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon commission">
                            <i class="ri-percent-line text-white" style="font-size: 1.5rem;"></i>
                        </div>
                        <h3 class="h4 mb-2">
                            {{ $advertiser->commission }}{{ $advertiser->commission_type == "percentage" ? "%" : $advertiser->commission_type }}
                        </h3>
                        <p class="text-muted mb-0">Commission Rate</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon regions">
                            <i class="ri-global-line text-white" style="font-size: 1.5rem;"></i>
                        </div>
                        <h3 class="h4 mb-2">{{ $regions }}</h3>
                        <p class="text-muted mb-0">Primary Regions</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon payment">
                            <i class="ri-calendar-check-line text-white" style="font-size: 1.5rem;"></i>
                        </div>
                        <h3 class="h4 mb-2">{{ $advertiser->average_payment_time ?? "-" }} <small>days</small></h3>
                        <p class="text-muted mb-0">Average Payment Cycle</p>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- About Card -->
                    <div class="content-card">
                        <h4 class="mb-3"><i class="ri-information-line"></i> About Program</h4>
                        <div class="text-muted">
                            @if($advertiser->short_description)
                                {!! \Illuminate\Support\Str::limit($advertiser->short_description, 200) !!}
                            @else
                                {!! \Illuminate\Support\Str::limit($advertiser->description, 200) !!}
                            @endif
                        </div>
                        @if(strlen($advertiser->short_description ?: $advertiser->description) >= 200)
                            <div class="mt-2">
                                <small class="text-primary">Read more in Overview tab</small>
                            </div>
                        @endif
                    </div>

                    <!-- Contact Info -->
                    <div class="content-card">
                        <h4 class="mb-3"><i class="ri-contacts-line"></i> Contact Information</h4>
                        <div class="d-flex align-items-center mb-2">
                            <i class="ri-mail-line text-primary me-2"></i>
                            <span>{{ $advertiser->user->email ?? "Not provided" }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="ri-global-line text-primary me-2"></i>
                            <span>{!! $url !!}</span>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="content-card">
                        <h4 class="mb-3"><i class="ri-price-tag-3-line"></i> Categories</h4>
                        <div class="d-flex flex-wrap gap-2">
                            @if($advertiser->categories)
                                @foreach(\App\Helper\PublisherData::getMixNames($advertiser->categories) as $category)
                                    <span class="feature-badge">{{ $category }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">No categories specified</span>
                            @endif
                        </div>
                    </div>

                    <!-- Regions -->
                    <div class="content-card">
                        <h4 class="mb-3"><i class="ri-map-pin-line"></i> Supported Regions</h4>
                        <div class="d-flex flex-wrap gap-2">
                            @if($advertiser->supported_regions)
                                @foreach($advertiser->supported_regions as $region)
                                    <span class="feature-badge success">{{ $region['region'] ?? $region }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">Global</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Main Content Area -->
                <div class="col-lg-8">
                    <!-- Navigation Pills -->
                    <div class="content-card mb-4">
                        <ul class="nav nav-pills nav-pills-custom justify-content-center" id="ap-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="overview-tab" data-bs-toggle="pill" href="#overview"
                                    role="tab">
                                    <i class="ri-layout-line"></i> Overview
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="commission-rates-tab" data-bs-toggle="pill" href="#commission-rates"
                                    role="tab">
                                    <i class="ri-money-dollar-circle-line"></i> Commission
                                </a>
                            </li>
                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="links-tab" data-bs-toggle="pill" href="#links" role="tab">
                                        <i class="ri-link"></i> Tracking
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="terms-tab" data-bs-toggle="pill" href="#terms" role="tab">
                                    <i class="ri-file-text-line"></i> Terms
                                </a>
                            </li>
                            @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="coupons-tab" data-bs-toggle="pill" href="#coupons" role="tab">
                                        <i class="ri-coupon-line"></i> Creatives
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Tab Content -->
                    <div class="tab-content" id="ap-tabContent">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel">
                            @include("partial.admin.alert")

                            <div class="content-card">
                                <h3 class="mb-4" style="position:sticky; top: 0; z-index: 1;">Detailed Introduction</h3>
                                <div class="text-muted" style="max-height: 250px; overflow-y: auto;">
                                    @if($advertiser->description)
                                        {!! $advertiser->description !!}
                                    @else
                                        {!! $advertiser->short_description !!}
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-card h-100">
                                        <h4 class="mb-3 text-success">Allowed Methods</h4>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if($advertiser->promotional_methods)
                                                @foreach(\App\Helper\PublisherData::getMixNames($advertiser->promotional_methods) as $method)
                                                    <span class="feature-badge success">{{ $method }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-muted">All standard methods allowed</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="content-card h-100">
                                        <h4 class="mb-3 text-danger">Restricted Methods</h4>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if($advertiser->program_restrictions)
                                                @foreach(\App\Helper\PublisherData::getMixNames($advertiser->program_restrictions) as $method)
                                                    <span class="feature-badge danger">{{ $method }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-muted">No specific restrictions</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Commission Rates Tab -->
                        <div class="tab-pane fade" id="commission-rates" role="tabpanel">
                            <div class="content-card">
                                <h3 class="mb-4">Commission Structure</h3>
                                <div class="table-container">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Condition</th>
                                                <th class="text-center">Rate</th>
                                                <th>Additional Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($advertiser->commissions))
                                                @foreach($advertiser->commissions as $commission)
                                                    <tr>
                                                        <td>{{ $commission->date ?? now()->format("Y-m-d") }}</td>
                                                        <td>{{ $commission->condition ?? "Standard" }}</td>
                                                        <td class="text-center fw-bold">
                                                            {{ $commission->rate ?? "-" }}{{ $commission->type == "amount" ? $advertiser->currency_code : "%" }}
                                                        </td>
                                                        <td class="text-muted">{{ $commission->info ?? "-" }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4" class="text-center py-4">
                                                        No specific commission rates defined
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Tracking Links Tab -->
                        @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                            <div class="tab-pane fade" id="links" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="content-card h-100">
                                            <h4 class="mb-3">Tracking Link</h4>
                                            @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                <div class="tracking-link-box mb-3">
                                                    <code id="trackingURL"
                                                        class="d-block mb-3">{{ $advertiser->advertiser_applies->tracking_url_long ?? $advertiser->advertiser_applies->tracking_url }}</code>
                                                    <button onclick="clickToCopy('trackingURL', 'Tracking URL copied!')"
                                                        class="action-btn primary">
                                                        <i class="ri-file-copy-line"></i> Copy Link
                                                    </button>
                                                </div>
                                            @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                <div class="text-center py-4">
                                                    <i class="ri-loader-4-line spin text-primary" style="font-size: 2rem;"></i>
                                                    <p class="mt-2 text-muted">Generating tracking link...</p>
                                                </div>
                                            @else
                                                <p class="text-muted">No tracking link available</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="content-card h-100">
                                            <h4 class="mb-3">Short Tracking Link</h4>
                                            @if(isset($advertiser->advertiser_applies->is_tracking_generate) && isset($advertiser->advertiser_applies->tracking_url_short) && $advertiser->advertiser_applies->is_tracking_generate == 1)
                                                <div class="tracking-link-box mb-3">
                                                    <code id="trackingShortURL"
                                                        class="d-block mb-3">{{ $advertiser->advertiser_applies->tracking_url_short }}</code>
                                                    <button onclick="clickToCopy('trackingShortURL', 'Short URL copied!')"
                                                        class="action-btn primary">
                                                        <i class="ri-file-copy-line"></i> Copy Short Link
                                                    </button>
                                                </div>
                                            @elseif(isset($advertiser->advertiser_applies->is_tracking_generate) && $advertiser->advertiser_applies->is_tracking_generate == 2)
                                                <div class="text-center py-4">
                                                    <i class="ri-loader-4-line spin text-primary" style="font-size: 2rem;"></i>
                                                    <p class="mt-2 text-muted">Generating short link...</p>
                                                </div>
                                            @else
                                                <p class="text-muted">No short tracking link available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Terms Tab -->
                        <div class="tab-pane fade" id="terms" role="tabpanel">
                            <div class="content-card">
                                <h3 class="mb-4">Program Terms & Policies</h3>
                                <div class="text-muted">
                                    {!! $advertiser->program_policies ?? "<p class='text-muted'>No specific terms and policies defined.</p>" !!}
                                </div>
                            </div>
                        </div>

                        <!-- Creatives Tab -->
                        @if(isset($advertiser->advertiser_applies->status) && $advertiser->advertiser_applies->status == \App\Models\AdvertiserApply::STATUS_ACTIVE)
                            <div class="tab-pane fade" id="coupons" role="tabpanel">
                                <div class="content-card">
                                    <div id="ap-overview"></div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Keep your existing modals and drawer components -->
    <!-- Modal Basic -->
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

    <!-- Drawer -->
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
                                        value="{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}" readonly>
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
@endsection