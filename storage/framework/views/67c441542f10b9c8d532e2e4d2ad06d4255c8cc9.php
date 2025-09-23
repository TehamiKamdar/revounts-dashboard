<?php $__env->startPush('scripts'); ?>
    <script>
        $("#loginForm").validate({
            rules: {
                "email": {
                    required: true,
                },
                "password": {
                    required: true,
                }
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) { // un-hightlight error inputs
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-modal-group'));
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partial.admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="logo-div text-center">
        <a href="https://www.linkscircle.com/">
            
            </a>
    </div>
    

    <form id="login-form" action="<?php echo e(route('login', ['type' => $type])); ?>" class="form-section">
        <?php echo csrf_field(); ?>
        <h2 class="form-title">Login to Your Account</h2>

        <div class="form-group">
            <label for="email"><?php echo e(__('Email Address')); ?>*</label>
            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="Enter your email"
                required>
        </div>

        <div class="form-group" style="position: relative;">
            <label for="password">Password*</label>
            <input id="password" class="form-control" type="password" name="password" 
                autocomplete="current-password" placeholder="Please Enter Password">

            <!-- Eye icon -->
            <i id="password-icon" class="ri-eye-close-line" 
            onclick="showPassword('password')" 
            style="position: absolute; right: 10px; top: 38px; cursor: pointer;"></i>
        </div>

        <div class="checkbox-theme-default custom-checkbox ">
            <input class="checkbox" type="checkbox" id="remember" name="remember" value="1">
            <label for="remember">
                <span class="checkbox-text"><?php echo e(__('Remember me')); ?></span>
            </label>
        </div>

        <div class="login-links">
            <a href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>

        <div class="login-links">
            <span>Don't have an account? <a href="<?php echo e(route('register', ["type" => $type])); ?>">Sign up</a></span>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel_guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/auth/login.blade.php ENDPATH**/ ?>