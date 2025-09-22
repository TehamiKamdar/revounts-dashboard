<?php if($advertisers->count()): ?>
    <?php $__currentLoopData = $advertisers->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiserChunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php $__currentLoopData = $advertiserChunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td style="width: 25%;">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input checkbox" name="ids[]" <?php echo e($advertiser->is_show == 1 ? "checked" : ($advertiser->is_show == 0 ? "unchecked" : "")); ?> value="<?php echo e($advertiser->id); ?>" title="<?php echo e($advertiser->name); ?>"> <?php echo e(\Illuminate\Support\Str::limit($advertiser->name, 30, '....')); ?>

                            <?php if($advertiser->is_show !== 2): ?>
                                <input type="hidden" class="form-check-input" name="not_showed_ids[]" value="<?php echo e($advertiser->id); ?>">
                            <?php endif; ?>
                        </label>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <tr class="text-center">
        <td colspan="4">
            <div class="d-flex justify-content-center mt-1 mb-20">
                <?php echo e($advertisers->withQueryString()->links()); ?>

            </div>
        </td>
    </tr>
<?php else: ?>
    <tr>
        <td colspan="4" class="text-center">
            <small>No Advertiser Exist</small>
        </td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/show_on/ajax.blade.php ENDPATH**/ ?>