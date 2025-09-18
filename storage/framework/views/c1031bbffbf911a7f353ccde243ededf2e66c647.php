
    <div class="table-responsive">
        <table class="table mb-0 table-hover table-borderless border-0">
            <thead>
                <tr>
                    <th style="width: 20%;">
                        Advertiser
                    </th>
                    <th style="width: 40%;">
                        Offer Name
                    </th>
                    <th style="width: 15%;">
                        Code
                    </th>
                    <th style="width: 15%;">
                        Start-End Dates
                    </th>
                    <th style="width: 10%;">
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($coupons)): ?>
                    <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td>
                                <?php echo e(ucwords($coupon->advertiser_name)); ?> <br>
                                <span class="text-primary-light">(<?php echo e($coupon->sid ?? 0); ?>)</span>
                            </td>
                            <td>
                                <?php echo $coupon->title; ?>

                            </td>
                            <td>
                                <?php echo e($coupon->code ? $coupon->code : "No code required"); ?>

                            </td>
                            <td>
                                <?php if($coupon->start_date && $coupon->end_date): ?>
                                    <?php echo e(\Carbon\Carbon::parse($coupon->start_date)->format("d/m/Y")); ?> -
                                    <?php echo e(\Carbon\Carbon::parse($coupon->end_date)->format("d/m/Y")); ?>

                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-xs btn-primary btn-add" data-toggle="modal"
                                    data-target="#showVoucherForm" onclick="prepareVoucherFormContent('<?php echo e($coupon->id); ?>')">
                                    VIEW
                                </a>
                            </td>
                        </tr>
                        <!-- End: tr -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">
                            <h6 class="text-center mt-2">Coupons Data Not Exist</h6>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

<div class="modal fade showVoucherForm" id="showVoucherForm" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-xl" id="voucherModalContent"></div>
    </div>
</div>
<!-- Modal -->
<?php if(count($coupons) && $coupons instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
    <?php echo e($coupons->withQueryString()->links('vendor.pagination.custom')); ?>

<?php endif; ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/creatives/coupons/list_view.blade.php ENDPATH**/ ?>