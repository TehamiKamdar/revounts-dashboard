<!-- Start Table Responsive -->
<div class="table-responsive">
    <table class="table mb-0 table-hover table-borderless border-0">
        <thead>
        <tr>

            <th>
                Advertiser
            </th>
            <th>
                Advertiser URL
            </th>

            <th>
                Tracking Short Link
            </th>

            <th>
                Tracking Link
            </th>

            <th>
                Sud ID
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
                                <a href="<?php echo e($link->url); ?>" class="text-primary-light" target="_blank"><?php echo e(\Illuminate\Support\Str::limit($link->url, 30, $end='...')); ?></a>
                        </td>
                        <td>
                                <a href="<?php echo e($link->tracking_url_short); ?>" class="text-primary-light" id="trackingURL<?php echo e($key); ?>" target="_blank"><?php echo e($link->tracking_url_short ?? "-"); ?></a>
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
                    <td colspan="5">
                        <h6 class="text-center mt-2">Text Link Data Not Exist</h6>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if(count($links) && $links instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
    <?php echo e($links->withQueryString()->links('vendor.pagination.custom')); ?>

<?php endif; ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/creatives/text-links/list_view.blade.php ENDPATH**/ ?>