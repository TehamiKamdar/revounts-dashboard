<div class="row">
    <div class="col-lg-12">
        <div class="card-extra">
            <div class="card-tab btn-group nav nav-tabs">
                <a class="btn btn-xs btn-white <?php if(request()->is('publisher/account/login-info')): ?> active <?php endif; ?> border-light" id="username-tab" href="<?php echo e(route("publisher.account.login-info.index")); ?>">
                    <h6 class="py-2 text-black font-size14">Username</h6>
                </a>
                <a class="btn btn-xs btn-white <?php if(request()->is('publisher/account/login-info/change-email')): ?> active <?php endif; ?> border-light" id="user_email-tab" href="<?php echo e(route("publisher.account.login-info.change-email")); ?>">
                    <h6 class="py-2 text-black font-size14">User Email</h6>
                </a>
                <a class="btn btn-xs btn-white border-light <?php if(request()->is('publisher/account/login-info/change-password')): ?> active <?php endif; ?>" id="login_password-tab" href="<?php echo e(route("publisher.account.login-info.change-password")); ?>">
                    <h6 class="py-2 text-black font-size14">Login Password</h6>
                </a>
            </div>
        </div>
        <div class="tab-content mt-4">
            <div class="tab-pane fade <?php if(request()->is('publisher/account/login-info')): ?>active show <?php endif; ?>" id="username" role="" aria-labelledby="username-tab">

                <?php if(request()->is('publisher/account/login-info')): ?>
                    <?php echo $__env->make("template.publisher.settings.login_info.username", compact('user'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

            </div>
            <div class="tab-pane fade <?php if(request()->is('publisher/account/login-info/change-email')): ?>active show <?php endif; ?>" id="user_email" role="" aria-labelledby="user_email-tab">

                <?php if(request()->is('publisher/account/login-info/change-email')): ?>
                    <?php echo $__env->make("template.publisher.settings.login_info.change_email", compact('user'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

            </div>
            <div class="tab-pane fade <?php if(request()->is('publisher/account/login-info/change-password')): ?>active show <?php endif; ?>" id="login_password" role="" aria-labelledby="login_password-tab">

                <?php if(request()->is('publisher/account/login-info/change-password')): ?>
                    <?php echo $__env->make("template.publisher.settings.login_info.change_password", compact('user'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>


<div class="loader-overlay display-hidden" id="showLoader">
    <div class="atbd-spin-dots spin-lg">
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
        <span class="spin-dot badge-dot dot-primary"></span>
    </div>
</div>


<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/login_info/index.blade.php ENDPATH**/ ?>