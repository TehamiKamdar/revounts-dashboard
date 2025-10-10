<div class="row justify-content-center">
    <div class="col-12">
        <div class="checkout-progress-indicator content-center">
            <div class="checkout-progress justify-content-center">
                <?php if(($isStepOne && !$isStepTwo && !$isStepThree) || (!$isStepOne && !$isStepTwo && !$isStepThree)): ?>

                    <div class="step current" id="1">
                        <span>1</span>
                    </div>
                    <div class="current"><img src="<?php echo e(asset("img/svg/checkout.svg")); ?>" alt="img" class="svg"></div>
                    <div class="step" id="2">
                        <span>2</span>
                    </div>
                    <div class="current"><img src="<?php echo e(asset("img/svg/checkout.svg")); ?>" alt="img" class="svg"></div>
                    <div class="step" id="3">
                        <span>3</span>
                    </div>

                <?php elseif(!$isStepOne && $isStepTwo && !$isStepThree): ?>

                    <div class="step completed" id="1">
                        <span class="ri-check-line"></span>
                    </div>
                    <div class="current"><img src="<?php echo e(asset("img/svg/checkoutin.svg")); ?>" alt="img" class="svg"></div>
                    <div class="step current" id="2">
                        <span>2</span>
                    </div>
                    <div class="current"><img src="<?php echo e(asset("img/svg/checkout.svg")); ?>" alt="img" class="svg"></div>
                    <div class="step" id="3">
                        <span>3</span>
                    </div>

                <?php elseif(!$isStepOne && !$isStepTwo && $isStepThree): ?>

                    <div class="step completed" id="1">
                        <span class="ri-check-line"></span>
                    </div>
                    <div class="current"><img src="<?php echo e(asset("img/svg/checkoutin.svg")); ?>" alt="img" class="svg"></div>
                    <div class="step completed" id="1">
                        <span class="ri-check-line"></span>
                    </div>
                    <div class="current"><img src="<?php echo e(asset("img/svg/checkout.svg")); ?>" alt="img" class="svg"></div>
                    <div class="step current" id="3">
                        <span>3</span>
                    </div>

                <?php endif; ?>

            </div>
        </div><!-- ends: .checkout-progress-indicator -->
        <?php echo $__env->yieldContent('step_form_content'); ?>
    </div>
</div>
<?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/auth/advertiser_register/base.blade.php ENDPATH**/ ?>