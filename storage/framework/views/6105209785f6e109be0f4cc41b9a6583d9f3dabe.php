<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table mb-0 table-hover table-borderless border-0">
        <thead>
        <tr class="userDatatable-header">

            <th>
                <span class="userDatatable-title">Advertiser</span>
            </th>
            <th>
                <span class="userDatatable-title">Landing Page</span>
            </th>

            <th>
                <span class="userDatatable-title">Tracking Short Link</span>
            </th>

            <th>
                <span class="userDatatable-title">Tracking Link</span>
            </th>

            <th>
                <span class="userDatatable-title">Sud ID</span>
            </th>

            <th>

            </th>
        </tr>
        </thead>
        <tbody>
            <?php if(count($links)): ?>
                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                                <?php echo e($link->name); ?> <br>
                                <span class="text-primary-light">(<?php echo e($link->sid); ?>)</span>
                        </td>
                        <td>
                                <a href="<?php echo e($link->landing_url); ?>" class="text-primary-light" target="_blank"><?php echo e(\Illuminate\Support\Str::limit($link->landing_url ?? "-", 30, $end='...')); ?></a>
                        </td>
                        <td>
                                <a href="<?php echo e($link->tracking_url); ?>" class="text-primary-light" id="trackingURL<?php echo e($key); ?>" target="_blank"><?php echo e($link->tracking_url ?? "-"); ?></a>
                        </td>
                        <td>
                                <a href="<?php echo e($link->tracking_url_long); ?>" class="text-primary-light" id="trackingURL<?php echo e($key); ?>" target="_blank"><?php echo e(\Illuminate\Support\Str::limit($link->tracking_url_long ?? "-", 30, $end='...')); ?></a>
                        </td>
                        <td>
                                <?php echo e($link->sub_id ?? "-"); ?>

                        </td>
                        <td>
                            <a href="javascript:void(0)" onclick="copyLink('<?php echo e($key); ?>')" class="btn btn-sm text-primary text-lg">
                                <i class="ri-file-copy-line"></i>
                            </a>
                        </td>
                    </tr>
                    <!-- End: tr -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">
                        <h6 class="text-center mt-2">Deep Link Data Not Exist</h6>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<!-- Table Responsive End -->

<?php if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
    <?php echo e($links->withQueryString()->links('vendor.pagination.custom')); ?>

<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/creatives/deep-links/list_view.blade.php ENDPATH**/ ?>