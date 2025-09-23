<!-- Profile Acoount -->
<div class="card mb-25">
    <div class="card-body text-center p-0">

        <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
            <form action="javascript:void(0)" id="profile-image-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="ap-img mb-20 pro_img_wrapper">
                    <input id="file-upload" type="file" name="fileUpload" class="d-none">
                    <label for="file-upload">
                        <!-- Profile picture image-->
                        <img class="ap-img__main rounded-circle wh-120" id="profileImg" src="<?php echo e(\App\Helper\Static\Methods::staticAsset(isset($publisher->image) && $publisher->image ? $publisher->image : "img/blank_profile_img.png")); ?>" alt="profile">
                        <span class="cross" id="remove_pro_pic">
                            <span data-feather="camera"></span>
                        </span>
                    </label>
                </div>
            </form>
            <div class="ap-nameAddress pb-3">
                <h5 class="ap-nameAddress__title"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h5>
                <p class="ap-nameAddress__subTitle fs-14 m-0"><?php echo e($user->getRoleName()); ?> ID: <?php echo e($user->sid); ?></p>
            </div>
        </div>
        <div class="ps-tab p-20 pb-25">
            <?php if($user->profile_complete_per >= 100): ?>
                <div class="user-group-progress-bar">
                    <div class="progress-wrap d-flex align-items-center mb-0">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-percentage">100%</span>
                    </div>
                    <p class="color-light fs-12 mb-0">5 / 5 - Profile completed</p>
                </div>
            <?php endif; ?>
            <div class="nav flex-column text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <p class="mb-3 sidebarTextColor">Profile</p>
                <a class="nav-link <?php if(request()->is('publisher/profile/basic-information')): ?> active <?php endif; ?>" id="v-pills-basic-settings-tab" href="<?php echo e(route("publisher.profile.basic-information.index")); ?>" aria-controls="v-pills-basic-settings" aria-selected="<?php echo e(request()->is('publisher/profile/basic-information/*')); ?>">
                    <span data-feather="user"></span>Basic Information
                </a>
                <a class="nav-link <?php if(request()->is('publisher/profile/company')): ?> active <?php endif; ?>" id="v-pills-company-settings-tab" href="<?php echo e(route("publisher.profile.company.index")); ?>" aria-controls="v-pills-company-settings" aria-selected="<?php echo e(request()->is('publisher/profile/company/*')); ?>">
                    <span data-feather="home"></span>Company
                </a>
                    <a class="nav-link <?php if(request()->is('publisher/profile/websites')): ?> active <?php endif; ?>" id="v-pills-websites-tab" href="<?php echo e(route("publisher.profile.websites.index")); ?>" aria-controls="v-pills-websites" aria-selected="<?php echo e(request()->is('publisher/profile/websites/*')); ?>">
                    <span data-feather="globe"></span>Websites
                </a>
                <p class="mb-3 sidebarTextColor mt-25">Payments</p>
                <a class="nav-link <?php if(request()->is('publisher/payments/billing-information')): ?> active <?php endif; ?>" id="v-pills-payment-settings-tab" href="<?php echo e(route("publisher.payments.billing-information.index")); ?>" aria-controls="v-pills-payment-settings" aria-selected="<?php echo e(request()->is('publisher/payments/billing-information')); ?>">
                    <span data-feather="file-text"></span>Billing Information
                </a>
                <a class="nav-link <?php if(request()->is('publisher/payments/payment-settings')): ?> active <?php endif; ?>" id="v-pills-payment-settings-tab" href="<?php echo e(route("publisher.payments.payment-settings.index")); ?>" aria-controls="v-pills-payment-settings" aria-selected="<?php echo e(request()->is('publisher/payments/payment-settings')); ?>">
                    <span data-feather="settings"></span>Payment Settings
                </a>
                <p class="mb-3 sidebarTextColor mt-25">Account</p>
                <a class="nav-link <?php if(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*')): ?> active <?php endif; ?>" id="v-pills-login-information-tab" href="<?php echo e(route("publisher.account.login-info.index")); ?>" aria-controls="v-pills-login-information" aria-selected="<?php echo e(request()->is('publisher/account/login-info/*')); ?>">
                    <span data-feather="shield"></span>Login Information
                </a>
            </div>
        </div>

    </div>
</div>
<!-- Profile Acoount End -->
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/sidebar.blade.php ENDPATH**/ ?>