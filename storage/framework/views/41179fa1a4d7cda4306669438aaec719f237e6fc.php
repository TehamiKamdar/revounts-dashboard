<div class="tab-content" id="ap-tabContent">
    <div class="tab-pane fade show active" id="all-transactions" role="tabpanel" aria-labelledby="all-transactions-tab">

        <?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Start Table Responsive -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Advertiser</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Tracking Link Clicks</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Deeplink Clicks</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Coupon Clicks</span>
                    </td>
                    <td>
                        <span class="userDatatable-title font-weight-bold text-black">Total Clicks</span>
                    </td>
                </tr>
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
                                <a target="_blank" href="<?php echo e(route("publisher.view-advertiser", ['sid' => $sid])); ?>"><?php echo e($advertiser ?? "-"); ?> <br><span class="fs-12 color-gray">(<?php echo e($sid); ?>)</span></a>
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
        <!-- Table Responsive End -->
    </div>
</div>

<?php if($performanceOverviewList2 && count($performanceOverviewList2) && $performanceOverviewList2 instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>

    <div class="d-flex justify-content-sm-end justify-content-start mt-15 pt-25 border-top">

        <?php echo e($performanceOverviewList2->withQueryString()->links()); ?>


    </div>

<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/reports/performance/click/list_view.blade.php ENDPATH**/ ?>