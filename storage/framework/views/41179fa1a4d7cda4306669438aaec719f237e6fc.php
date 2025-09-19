
        <?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Start Table Responsive -->
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead>
                <tr>
                    <th>
                        Advertiser
                    </th>
                    <th>
                        Tracking Link Clicks
                    </th>
                    <th>
                        Deeplink Clicks
                    </th>
                    <th>
                        Coupon Clicks
                    </th>
                    <th>
                        Total Clicks
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php if($performanceOverviewList2 && count($performanceOverviewList2)): ?>
                    <?php $__currentLoopData = $performanceOverviewList2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $sid = $data->advertiser_sid;
                            $advertiser = $data->advertiser_name;
                            $totalTrackingClicks = $data->tracking_total_clicks;
                            $totalDeepClicks = $data->deeplink_total_clicks;
                            $totalCouponClicks = $data->coupon_total_clicks;
                            $totalClicks = $data->total_clicks;
                        ?>
                        <tr>
                            <td>
                                <a target="_blank" href="<?php echo e(route("publisher.view-advertiser", ['sid' => $sid])); ?>" class="text-primary-light"><?php echo e($advertiser ?? "-"); ?> <br><span>(<?php echo e($sid); ?>)</span></a>
                            </td>
                            <td><?php echo e($totalTrackingClicks); ?></td>
                            <td><?php echo e($totalDeepClicks); ?></td>
                            <td><?php echo e($totalCouponClicks); ?></td>
                            <td><?php echo e($totalClicks); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">
                            <h6 class="my-5 text-center">Performance Overview Data Not Exist</h6>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

<?php if($performanceOverviewList2 && count($performanceOverviewList2) && $performanceOverviewList2 instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>
    <?php echo e($performanceOverviewList2->withQueryString()->links('vendor.pagination.custom')); ?>

<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/reports/performance/click/list_view.blade.php ENDPATH**/ ?>