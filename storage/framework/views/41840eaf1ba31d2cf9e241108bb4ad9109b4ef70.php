<?php $__env->startSection("step_form_content"); ?>

    <div class="card checkout-shipping-form" style="padding-bottom: 20px;">
        <div class="card-header border-bottom-0 align-content-start pb-sm-0 pb-1 px-0">
            <h1 class="title">1. Join as a Publisher</h1>
            <p>Start registering your publisher account with LinksCircle and partner with advertisers.</p>
        </div>
        <div class="card-body p-0">
            <div class="edit-profile__body">
                <form id="stepOne" action="javascript:void(0)" class="stepOne">
                    <div class="form-group row">
                        <div>
                            <label for="firstName">First Name*</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name" value="<?php echo e($stepOne['first_name'] ?? null); ?>">
                        </div>
                        <div>
                            <label for="lastName">Last Name*</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name" value="<?php echo e($stepOne['last_name'] ?? null); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username*</label>
                        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username"
                            value="<?php echo e($stepOne['user_name'] ?? null); ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address*</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="username@email.com"
                            value="<?php echo e($stepOne['email'] ?? null); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password*</label>
                        <input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" value="<?php echo e($stepOne['password'] ?? null); ?>">
                            <div class="fa fa-fw fa-eye-slash text-light fs-16 field-icon" id="password-icon"
                                onclick="showPassword('password')"></div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password*</label>
                        <input id="password_confirmation" class="form-control" type="password"
                                name="password_confirmation" required autocomplete="current-password_confirmation"
                                value="<?php echo e($stepOne['password_confirmation'] ?? null); ?>">
                            <div class="fa fa-fw fa-eye-slash text-light fs-16 field-icon" id="password_confirmation-icon"
                                onclick="showPassword('password_confirmation')"></div>
                    </div>
                    <div class="checkbox-group">
                        <input type="checkbox" class="checkbox" id="agree" name="agree" value="1" <?php echo e(isset($stepOne['agree']) && $stepOne['agree'] ? "checked" : null); ?> />
                        <label for="terms">I Agree With The <a href="https://www.linkscircle.com/terms">Terms And Conditions.</a></label>
                    </div>
                    <div class="form-buttons right-align">
                        <button type="submit" class="btn btn-primary">Save &amp; Next →</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- ends: card -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("auth.publisher_register.base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/auth/publisher_register/step_one.blade.php ENDPATH**/ ?>