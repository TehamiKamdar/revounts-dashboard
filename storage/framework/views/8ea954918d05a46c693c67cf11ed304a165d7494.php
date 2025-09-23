<?php if (! $__env->hasRenderedOnce('614f5502-c3db-4336-8383-c4ac7f9017d7')): $__env->markAsRenderedOnce('614f5502-c3db-4336-8383-c4ac7f9017d7');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css")); ?>"/>
    <style>
        .contents {
            margin-top: 60px;
        }
        .sidebarTextColor {
            font-size: 16px;
            font-weight: 600;
            color: #000;
        }
        .width-14 {
            width: 14px;
        }
        #verify-modal .modal-footer {
            justify-content: center !important;
        }
        .sidebar-fixed {
            height: 100%;
            width: 22.5%;
            position: fixed;
            overflow-x: hidden;
            z-index: 1;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6cb767d2-7b34-432e-9a60-95d0e6608629')): $__env->markAsRenderedOnce('6cb767d2-7b34-432e-9a60-95d0e6608629');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js")); ?>"></script>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js")); ?>"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            $("#datepickerdob").datepicker({
                dateFormat: "d MM yy",
                duration: "medium",
                changeMonth: true,
                changeYear: true,
                yearRange: "<?php echo e(now()->subYears(100)->format("Y")); ?>:<?php echo e(now()->format("Y")); ?>",
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
                    url: "<?php echo e(route("publisher.upload-profile-image")); ?>",
                    method: 'POST',
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(response)
                    {
                        $("#profileImg").attr("src", response.image)
                    },
                    error: function(response) {
                        showErrors(response.message)
                    }
                });
            });
        });
    </script>

    <?php if($type == \App\Helper\Static\Vars::BASIC_INFO): ?>
        <?php echo $__env->make("template.publisher.settings.basic_info.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($type == \App\Helper\Static\Vars::COMPANY_INFO): ?>
        <?php echo $__env->make("template.publisher.settings.company_info.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($type == \App\Helper\Static\Vars::WEBSITES): ?>
        <?php echo $__env->make("template.publisher.settings.websites.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($type == \App\Helper\Static\Vars::LOGIN_INFO): ?>
        <?php echo $__env->make("template.publisher.settings.login_info.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($type == \App\Helper\Static\Vars::API_INFO): ?>
        <?php echo $__env->make("template.publisher.settings.api_info.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($type == \App\Helper\Static\Vars::BILLING_INFO): ?>
        <?php echo $__env->make("template.publisher.settings.payment.billing_info.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif($type == \App\Helper\Static\Vars::PAYMENT_SETTINGS): ?>
        <?php echo $__env->make("template.publisher.settings.payment.payment_settings.js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="profile-setting">
            <div class="container-fluid">
                <?php echo $__env->make("template.publisher.widgets.profile_completion_percentage", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row">
                    <div class="col-xxl-3 col-lg-4 col-sm-5">
                        <!-- Profile Acoount -->
                        <?php echo $__env->make("template.publisher.settings.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- Profile Acoount End -->
                    </div>
                    <div class="col-xxl-9 col-lg-8 col-sm-7">
                        <div class="mb-50">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php if(request()->is('publisher/profile/basic-information')): ?>
                                    <div class="tab-pane fade <?php if(request()->is('publisher/profile/basic-information')): ?> active show <?php endif; ?>" id="v-pills-basic-settings" role="tabpanel" aria-labelledby="v-pills-basic-settings-tab">
                                    <?php if($type == \App\Helper\Static\Vars::BASIC_INFO): ?>
                                        <!-- Edit Profile -->
                                        <div class="edit-profile">
                                            <div class="card">
                                                <div class="card-header px-sm-25 px-3">
                                                    <div class="edit-profile__title">
                                                        <h6 class="font-weight-bold">Basic Information</h6>
                                                        <span class="fs-13 color-light fw-400">Set up your personal
                                                                information</span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <?php echo $__env->make("template.publisher.settings.basic_info.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Profile End -->
                                    <?php endif; ?>
                                </div>
                                <?php elseif(request()->is('publisher/profile/company')): ?>
                                    <div class="tab-pane fade <?php if(request()->is('publisher/profile/company')): ?> active show <?php endif; ?>" id="v-pills-company-settings" role="tabpanel" aria-labelledby="v-pills-company-settings-tab">
                                        <?php if($type == \App\Helper\Static\Vars::COMPANY_INFO): ?>
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Company</h6>
                                                            <span class="fs-13 color-light fw-400">Set up your company</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php echo $__env->make("template.publisher.settings.company_info.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        <?php endif; ?>
                                    </div>
                                <?php elseif(request()->is('publisher/profile/websites')): ?>
                                    <div class="tab-pane fade <?php if(request()->is('publisher/profile/websites')): ?> active show <?php endif; ?>" id="v-pills-websites" role="tabpanel" aria-labelledby="v-pills-websites-tab">
                                        <?php if($type == \App\Helper\Static\Vars::WEBSITES): ?>
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Websites</h6>
                                                            <span class="fs-13 color-light fw-400">Set up your website</span>
                                                        </div>

                                                        <div class="breadcrumb-action justify-content-center flex-wrap">
                                                            <div class="action-btn">
                                                                <a href="javascript:void(0)" data-toggle="modal"
                                                                   data-target="#website-modal"  class="btn btn-sm btn-primary btn-add"
                                                                   onclick="openWebsiteModal()"><i class="la la-plus"></i> Add</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php echo $__env->make("template.publisher.settings.websites.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        <?php endif; ?>
                                    </div>
                                <?php elseif(request()->is('publisher/payments/billing-information')): ?>
                                    <div class="tab-pane fade <?php if(request()->is('publisher/payments/billing-information')): ?> active show <?php endif; ?>" id="v-pills-basic-settings" role="tabpanel" aria-labelledby="v-pills-basic-settings-tab">
                                        <?php if($type == \App\Helper\Static\Vars::BILLING_INFO): ?>
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Billing Information</h6>
                                                            <span class="fs-13 color-light fw-400">Set Up Your Billing Information For Payment Clearance</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php echo $__env->make("template.publisher.settings.payment.billing_info.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        <?php endif; ?>
                                    </div>
                                <?php elseif(request()->is('publisher/payments/payment-settings')): ?>
                                    <div class="tab-pane fade <?php if(request()->is('publisher/payments/payment-settings')): ?> active show <?php endif; ?>" id="v-pills-payment-settings" role="tabpanel" aria-labelledby="v-pills-payment-settings-tab">
                                        <?php if($type == \App\Helper\Static\Vars::PAYMENT_SETTINGS): ?>
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Payment Settings</h6>
                                                            <span class="fs-13 color-light fw-400">Set Up Your Payment Methods To Withdraw Funds.</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php if($billing): ?>
                                                            <?php echo $__env->make("template.publisher.settings.payment.payment_settings.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php else: ?>
                                                            <div class="alert-icon-big alert alert-danger " role="alert">
                                                                <div class="alert-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                                                                </div>
                                                                <div class="alert-content">
                                                                    <h3 class="alert-heading">Notice</h3>
                                                                    <p>Please complete billing information to add payment methods.</p>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        <?php endif; ?>
                                    </div>
                                <?php elseif(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*')): ?>
                                    <div class="tab-pane fade <?php if(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*')): ?> active show <?php endif; ?>" id="v-pills-login-information" role="tabpanel" aria-labelledby="v-pills-login-information-tab">
                                        <?php if($type == \App\Helper\Static\Vars::LOGIN_INFO): ?>
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">Login Information</h6>
                                                            <span class="fs-13 color-light fw-400">Set up your login information</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php echo $__env->make("template.publisher.settings.login_info.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        <?php endif; ?>
                                    </div>
                                <?php elseif(request()->is('publisher/account/api-info') || request()->is('publisher/account/api-info/*')): ?>
                                    <div class="tab-pane fade <?php if(request()->is('publisher/account/api-info') || request()->is('publisher/account/api-info/*')): ?> active show <?php endif; ?>" id="v-pills-api-information" role="tabpanel" aria-labelledby="v-pills-api-information-tab">
                                        <?php if($type == \App\Helper\Static\Vars::API_INFO): ?>
                                            <!-- Edit Profile -->
                                            <div class="edit-profile">
                                                <div class="card">
                                                    <div class="card-header px-sm-25 px-3">
                                                        <div class="edit-profile__title">
                                                            <h6 class="font-weight-bold">API Information</h6>
                                                            <span class="fs-13 color-light fw-400">View your api information</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php echo $__env->make("template.publisher.settings.api_info.index", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/index.blade.php ENDPATH**/ ?>