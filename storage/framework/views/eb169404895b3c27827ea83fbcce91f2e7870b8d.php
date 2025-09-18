<?php if (! $__env->hasRenderedOnce('e515fa77-728d-4a6f-9b97-25aa96071971')): $__env->markAsRenderedOnce('e515fa77-728d-4a6f-9b97-25aa96071971');
$__env->startPush('styles'); ?>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e9a49f4f-f7e8-4e7a-85b0-d0063584e691')): $__env->markAsRenderedOnce('e9a49f4f-f7e8-4e7a-85b0-d0063584e691');
$__env->startPush('scripts'); ?>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <?php if(auth()->user()->status == "active"): ?>
        <?php echo $__env->make("template.publisher.dashboard.active", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make("template.publisher.dashboard.not_active", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/template/publisher/dashboard/index.blade.php ENDPATH**/ ?>