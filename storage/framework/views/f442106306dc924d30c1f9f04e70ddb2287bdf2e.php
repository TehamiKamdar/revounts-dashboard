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
    <div class="login-header animate-in">
        <h1>Publisher Login</h1>
        <p>Sign in to your account to continue</p>
    </div>

    <div class="login-form">
        <form id="loginForm" class="animate-in" action="<?php echo e(route('login', ['type' => $type])); ?>" >
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group">
                    <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Enter your email"
                required>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input id="password" class="form-control" type="password" name="password"
                autocomplete="current-password" placeholder="Please Enter Password">
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="ri-eye-line"></i>
                    </button>
                </div>
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input class="checkbox" type="checkbox" id="remember" name="remember" value="1">
                    <label for="remember">Remember me</label>
                </div>
                <a href="<?php echo e(route('password.request')); ?> class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-login">Sign In</button>
        </form>

        <div class="register-link animate-in">
            <p>Don't have an account?</p>
            <a href="<?php echo e(route('register', ['type' => 'publisher'])); ?>" class="btn-register">Create Publisher Account</a>
        </div>
    </div>
    
    

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.panel_guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/auth/login.blade.php ENDPATH**/ ?>