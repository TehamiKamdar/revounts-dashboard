
<?php if(($isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour) || (!$isStepOne && !$isStepTwo && !$isStepThree && !$isStepFour)): ?>
    <?php echo $__env->make("auth.publisher_register.steps.one", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif(!$isStepOne && $isStepTwo && !$isStepThree && !$isStepFour): ?>
    <?php echo $__env->make("auth.publisher_register.steps.two", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif(!$isStepOne && !$isStepTwo && $isStepThree && !$isStepFour): ?>
    <?php echo $__env->make("auth.publisher_register.steps.three", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif(!$isStepOne && !$isStepTwo && !$isStepThree && $isStepFour): ?>
    <?php echo $__env->make("auth.publisher_register.steps.four", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>
<?php echo $__env->yieldContent("step_form_content"); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/auth/publisher_register/base.blade.php ENDPATH**/ ?>