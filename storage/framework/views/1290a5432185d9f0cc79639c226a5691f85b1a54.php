<div class="row justify-content-center">
    <div class="col-xl-12">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="checkout-progress-indicator ">
                    <?php if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour)): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.one", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.two", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.three", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour): ?>
                        <?php echo $__env->make("auth.publisher_register.steps.four", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php endif; ?>
                </div><!-- checkout -->
            </div>
            <div class="col-xl-7 col-lg-8 col-sm-10">
                <?php echo $__env->yieldContent("step_form_content"); ?>
            </div><!-- ends: col -->
        </div>
    </div><!-- ends: col -->
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/auth/publisher_register/base.blade.php ENDPATH**/ ?>