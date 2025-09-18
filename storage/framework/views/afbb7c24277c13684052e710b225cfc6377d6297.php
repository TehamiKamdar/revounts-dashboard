<?php if (! $__env->hasRenderedOnce('ee5be8ce-0f5b-4445-83be-91c0d85e1f9d')): $__env->markAsRenderedOnce('ee5be8ce-0f5b-4445-83be-91c0d85e1f9d');
$__env->startPush('styles'); ?>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('fec00abc-e4e0-4fa3-b6e6-1cf33bbc624c')): $__env->markAsRenderedOnce('fec00abc-e4e0-4fa3-b6e6-1cf33bbc624c');
$__env->startPush('scripts'); ?>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <?php if(auth()->user()->status == "active"): ?>
        <?php echo $__env->make("template.publisher.dashboard.active", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make("template.publisher.dashboard.not_active", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/dashboard/index.blade.php ENDPATH**/ ?>