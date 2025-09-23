@extends("layouts.publisher.panel_app")

@pushonce('styles')
<link rel="stylesheet" href="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css") }}" />
<style>
    .profile-setting-modern {
        min-height: 100vh;
        padding: 20px 0;
    }

    .settings-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Profile Completion Widget */
    .completion-widget-modern {
        background: rgba(255, 255, 255);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 1.5rem;
        margin-bottom: 24px;
    }

    /* Sidebar Modern */
    .sidebar-modern {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 1.5rem;
        height: fit-content;
    }

    /* Main Content Area */
    .content-modern {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 0;
        overflow: hidden;
    }

    /* Card Header Modern */
    .card-header-modern {
        background: linear-gradient(135deg, rgba(123, 54, 181, 0.1) 0%, rgba(123, 54, 181, 0.05) 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(123, 54, 181, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .edit-profile__title h6 {
        color: var(--primary-dark-color);
        font-weight: 600;
        font-size: 1.25rem;
        margin: 0 0 0.25rem 0;
    }

    .edit-profile__title span {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .action-btn-modern {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(123, 54, 181, 0.2);
        border-radius: 10px;
        padding: 0.5rem 1rem;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.85rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .action-btn-modern:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(123, 54, 181, 0.2);
    }

    /* Card Body */
    .card-body-modern {
        padding: 2rem;
    }

    /* Alert Modern */
    .alert-modern {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(220, 53, 69, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        margin: 1rem 0;
    }

    .alert-danger-modern {
        background: rgba(220, 53, 69, 0.1);
        border-color: rgba(220, 53, 69, 0.3);
    }

    .alert-icon-big {
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .alert-icon {
        color: #dc3545;
        font-size: 1.5rem;
    }

    .alert-content h3 {
        color: var(--primary-dark-color);
        margin-bottom: 0.5rem;
    }

    /* Tab Content */
    .tab-pane-modern {
        animation: fadeIn 0.3s ease-in-out;
    }
    .btn.active,
    .nav-link.active
    {
        background-color: rgba(173,173,173, 0.3) !important;
    }
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .settings-container {
            padding: 0 20px;
        }
    }

    @media (max-width: 768px) {
        .card-header-modern {
            flex-direction: column;
            align-items: flex-start;
            padding: 1rem;
        }

        .card-body-modern {
            padding: 1rem;
        }

        .alert-icon-big {
            flex-direction: column;
            text-align: center;
        }
    }
    .select2-selection__choice{
        background-color: var(--primary-dark-color) !important;
        color: var(--primary-light-color) !important;

    }
</style>
@endpushonce

@pushonce('scripts')
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js") }}"></script>
<script src="{{ \App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js") }}"></script>
<script>

    document.addEventListener("DOMContentLoaded", function () {
        $("#datepickerdob").datepicker({
            dateFormat: "d MM yy",
            duration: "medium",
            changeMonth: true,
            changeYear: true,
            yearRange: "{{ now()->subYears(100)->format("Y") }}:{{ now()->format("Y") }}",
        });
        $("#file-upload").change(function () {

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#profilePic').attr('src', e.target.result);
                $('#sidebarProfilePic').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

            $("#profile-image-form").submit();
        });
        $("#profile-image-form").submit(function () {
            $.ajax({
                url: "{{ route("publisher.upload-profile-image") }}",
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    $("#profileImg").attr("src", response.image)
                },
                error: function (response) {
                    showErrors(response.message)
                }
            });
        });
    });
</script>

@if($type == \App\Helper\Static\Vars::BASIC_INFO)
    @include("template.publisher.settings.basic_info.js")
@elseif($type == \App\Helper\Static\Vars::COMPANY_INFO)
    @include("template.publisher.settings.company_info.js")
@elseif($type == \App\Helper\Static\Vars::WEBSITES)
    @include("template.publisher.settings.websites.js")
@elseif($type == \App\Helper\Static\Vars::LOGIN_INFO)
    @include("template.publisher.settings.login_info.js")
@elseif($type == \App\Helper\Static\Vars::API_INFO)
    @include("template.publisher.settings.api_info.js")
@elseif($type == \App\Helper\Static\Vars::BILLING_INFO)
    @include("template.publisher.settings.payment.billing_info.js")
@elseif($type == \App\Helper\Static\Vars::PAYMENT_SETTINGS)
    @include("template.publisher.settings.payment.payment_settings.js")
@endif

@endpushonce

@section("content")

    <div class="profile-setting-modern">
        <div class="settings-container container-fluid">
            <!-- Profile Completion Widget -->
            <div class="completion-widget-modern">
                @include("template.publisher.widgets.profile_completion_percentage")
            </div>

            <div class="row">
                <!-- Sidebar -->
                <div class="col-xxl-3 col-lg-4 col-sm-5 mb-4">
                    <div class="sidebar-modern">
                        @include("template.publisher.settings.sidebar")
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-xxl-9 col-lg-8 col-sm-7">
                    <div class="content-modern">
                        <div class="tab-content" id="v-pills-tabContent">

                            <!-- Basic Information -->
                            @if(request()->is('publisher/profile/basic-information'))
                                <div class="tab-pane-modern fade @if(request()->is('publisher/profile/basic-information')) active show @endif"
                                    id="v-pills-basic-settings" role="tabpanel" aria-labelledby="v-pills-basic-settings-tab">
                                    @if($type == \App\Helper\Static\Vars::BASIC_INFO)
                                        <div class="edit-profile">
                                            <div class="card border-0">
                                                <div class="card-header-modern">
                                                    <div class="edit-profile__title">
                                                        <h6><i class="ri-user-line"></i> Basic Information</h6>
                                                        <span>Set up your personal information</span>
                                                    </div>
                                                </div>
                                                <div class="card-body-modern">
                                                    @include("template.publisher.settings.basic_info.index")
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Company Information -->
                            @elseif(request()->is('publisher/profile/company'))
                                <div class="tab-pane-modern fade @if(request()->is('publisher/profile/company')) active show @endif"
                                    id="v-pills-company-settings" role="tabpanel"
                                    aria-labelledby="v-pills-company-settings-tab">
                                    @if($type == \App\Helper\Static\Vars::COMPANY_INFO)
                                        <div class="edit-profile">
                                            <div class="card border-0">
                                                <div class="card-header-modern">
                                                    <div class="edit-profile__title">
                                                        <h6><i class="ri-building-2-line"></i> Company</h6>
                                                        <span>Set up your company</span>
                                                    </div>
                                                </div>
                                                <div class="card-body-modern">
                                                    @include("template.publisher.settings.company_info.index")
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Websites -->
                            @elseif(request()->is('publisher/profile/websites'))
                                <div class="tab-pane-modern fade @if(request()->is('publisher/profile/websites')) active show @endif" id="v-pills-websites" role="tabpanel" aria-labelledby="v-pills-websites-tab">
                                    @if($type == \App\Helper\Static\Vars::WEBSITES)
                                        <div class="edit-profile">
                                            <div class="card border-0">
                                                <div class="card-header-modern">
                                                    <div class="edit-profile__title">
                                                        <h6><i class="ri-global-line"></i> Websites</h6>
                                                        <span>Set up your website</span>
                                                    </div>
                                                    <div class="breadcrumb-actions">
                                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                                            data-bs-target="#website-modal" class="action-btn-modern">
                                                            <i class="ri-add-line"></i> Add Website
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body-modern">
                                                    @include("template.publisher.settings.websites.index")
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Billing Information -->
                            @elseif(request()->is('publisher/payments/billing-information'))
                                <div class="tab-pane-modern fade @if(request()->is('publisher/payments/billing-information')) active show @endif"
                                    id="v-pills-basic-settings" role="tabpanel" aria-labelledby="v-pills-basic-settings-tab">
                                    @if($type == \App\Helper\Static\Vars::BILLING_INFO)
                                        <div class="edit-profile">
                                            <div class="card border-0">
                                                <div class="card-header-modern">
                                                    <div class="edit-profile__title">
                                                        <h6><i class="ri-bank-card-line"></i> Billing Information</h6>
                                                        <span>Set Up Your Billing Information For Payment Clearance</span>
                                                    </div>
                                                </div>
                                                <div class="card-body-modern">
                                                    @include("template.publisher.settings.payment.billing_info.index")
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Payment Settings -->
                            @elseif(request()->is('publisher/payments/payment-settings'))
                                <div class="tab-pane-modern fade @if(request()->is('publisher/payments/payment-settings')) active show @endif"
                                    id="v-pills-payment-settings" role="tabpanel"
                                    aria-labelledby="v-pills-payment-settings-tab">
                                    @if($type == \App\Helper\Static\Vars::PAYMENT_SETTINGS)
                                        <div class="edit-profile">
                                            <div class="card border-0">
                                                <div class="card-header-modern">
                                                    <div class="edit-profile__title">
                                                        <h6><i class="ri-money-dollar-circle-line"></i> Payment Settings</h6>
                                                        <span>Set Up Your Payment Methods To Withdraw Funds</span>
                                                    </div>
                                                </div>
                                                <div class="card-body-modern">
                                                    @if($billing)
                                                        @include("template.publisher.settings.payment.payment_settings.index")
                                                    @else
                                                        <div class="alert-modern alert-danger-modern">
                                                            <div class="alert-icon-big">
                                                                <div class="alert-icon">
                                                                    <i class="ri-information-line"></i>
                                                                </div>
                                                                <div class="alert-content">
                                                                    <h3>Notice</h3>
                                                                    <p>Please complete billing information to add payment methods.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Login Information -->
                            @elseif(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*'))
                                <div class="tab-pane-modern fade @if(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*')) active show @endif"
                                    id="v-pills-login-information" role="tabpanel"
                                    aria-labelledby="v-pills-login-information-tab">
                                    @if($type == \App\Helper\Static\Vars::LOGIN_INFO)
                                        <div class="edit-profile">
                                            <div class="card border-0">
                                                <div class="card-header-modern">
                                                    <div class="edit-profile__title">
                                                        <h6><i class="ri-lock-line"></i> Login Information</h6>
                                                        <span>Set up your login information</span>
                                                    </div>
                                                </div>
                                                <div class="card-body-modern">
                                                    @include("template.publisher.settings.login_info.index")
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- API Information -->
                            @elseif(request()->is('publisher/account/api-info') || request()->is('publisher/account/api-info/*'))
                                <div class="tab-pane-modern fade @if(request()->is('publisher/account/api-info') || request()->is('publisher/account/api-info/*')) active show @endif"
                                    id="v-pills-api-information" role="tabpanel" aria-labelledby="v-pills-api-information-tab">
                                    @if($type == \App\Helper\Static\Vars::API_INFO)
                                        <div class="edit-profile">
                                            <div class="card border-0">
                                                <div class="card-header-modern">
                                                    <div class="edit-profile__title">
                                                        <h6><i class="ri-code-s-slash-line"></i> API Information</h6>
                                                        <span>View your API information</span>
                                                    </div>
                                                </div>
                                                <div class="card-body-modern">
                                                    @include("template.publisher.settings.api_info.index")
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection