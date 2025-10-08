<!-- Profile Acoount -->
<div class="card mb-4">
    <div class="card-body text-center p-0">

        <!-- Profile Image -->
        <div class="border-bottom py-4 px-3 d-flex flex-column align-items-center">
            <form action="javascript:void(0)" id="profile-image-form" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="position-relative mb-3">
                    <input id="file-upload" type="file" name="fileUpload" class="d-none">
                    <label for="file-upload" class="cursor-pointer">
                        <img
                            id="profileImg"
                            src="<?php echo e(\App\Helper\Static\Methods::staticAsset(isset($publisher->image) && $publisher->image ? $publisher->image : 'img/blank_profile_img.png')); ?>"
                            alt="profile"
                            class="rounded-circle img-thumbnail"
                            style="width:120px; height:120px; object-fit:cover;"
                        >
                        <span class="position-absolute bottom-0 end-0 bg-light rounded-circle p-2 shadow-sm" id="remove_pro_pic" style="cursor:pointer;">
                            <i class="ri-camera-line"></i>
                        </span>
                    </label>
                </div>
            </form>
            <div class="pb-3">
                <h5 class="mb-1"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h5>
                <p class="text-muted small mb-0"><?php echo e($user->getRoleName()); ?> — ID: <?php echo e($user->sid); ?></p>
            </div>
        </div>

        <!-- Profile Progress -->
        <div class="px-3 py-3">
            <?php if($user->profile_complete_per >= 100): ?>
                <div class="mb-3">
                    <div class="d-flex align-items-center">
                        <div class="progress flex-grow-1" style="height: 6px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%;"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="ms-2 fw-semibold small text-success">100%</span>
                    </div>
                    <p class="text-muted small mb-0">5 / 5 - Profile completed</p>
                </div>
            <?php endif; ?>

            <!-- Sidebar Navigation -->
            <nav class="nav flex-column">
                <p class="fw-bold text-secondary small mb-2">Profile</p>
                <a class="nav-link d-flex align-items-center text-primary <?php if(request()->is('publisher/profile/basic-information')): ?> active <?php endif; ?>"
                   href="<?php echo e(route('publisher.profile.basic-information.index')); ?>">
                    <i class="ri-user-line me-2"></i> Basic Information
                </a>
                <a class="nav-link d-flex align-items-center text-primary <?php if(request()->is('publisher/profile/company')): ?> active <?php endif; ?>"
                   href="<?php echo e(route('publisher.profile.company.index')); ?>">
                    <i class="ri-building-line me-2"></i> Company
                </a>
                <a class="nav-link d-flex align-items-center text-primary <?php if(request()->is('publisher/profile/websites')): ?> active <?php endif; ?>"
                   href="<?php echo e(route('publisher.profile.websites.index')); ?>">
                    <i class="ri-global-line me-2"></i> Websites
                </a>

                <p class="fw-bold text-secondary small mt-3 mb-2">Payments</p>
                <a class="nav-link d-flex align-items-center text-primary <?php if(request()->is('publisher/payments/billing-information')): ?> active <?php endif; ?>"
                   href="<?php echo e(route('publisher.payments.billing-information.index')); ?>">
                    <i class="ri-file-list-3-line me-2"></i> Billing Information
                </a>
                <a class="nav-link d-flex align-items-center text-primary <?php if(request()->is('publisher/payments/payment-settings')): ?> active <?php endif; ?>"
                   href="<?php echo e(route('publisher.payments.payment-settings.index')); ?>">
                    <i class="ri-settings-3-line me-2"></i> Payment Settings
                </a>

                <p class="fw-bold text-secondary small mt-3 mb-2">Account</p>
                <a class="nav-link d-flex align-items-center text-primary <?php if(request()->is('publisher/account/login-info') || request()->is('publisher/account/login-info/*')): ?> active <?php endif; ?>"
                   href="<?php echo e(route('publisher.account.login-info.index')); ?>">
                    <i class="ri-shield-user-line me-2"></i> Login Information
                </a>
            </nav>
        </div>
    </div>
</div>

<!-- Profile Acoount End -->
<?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/template/publisher/settings/sidebar.blade.php ENDPATH**/ ?>