<?php
    $checkAdmin = auth()->user()->getRoleName() != \App\Models\Role::ADMIN_ROLE
?>
        <div class="table-responsive">
            <table class="table table-hover table-borderless">
                <thead>
                <tr>
                    <th>

                    </th>
                    <th scope="col">
                        Advertiser
                    </th>
                    <th scope="col">
                        Commission
                    </th>
                    <th scope="col">
                        Region
                    </th>
                    <th scope="col">
                        APC
                    </th>
                    <?php if($checkAdmin): ?>
                        <th>
                        </th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php if(count($advertisers)): ?>
                    <?php $__currentLoopData = $advertisers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertiser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="img-td">

            <a href="<?php echo e(route('publisher.view-advertiser', ['sid' => $advertiser->sid])); ?>" class="text-primary-light fw-500 me-3">
                <?php
                    $fetch = \App\Models\Advertiser::find($advertiser->id);
                ?>
                <?php if(!empty($fetch->fetch_logo_url)): ?>
                    <img loading="lazy" class="rounded me-3" src="<?php echo e($fetch->fetch_logo_url); ?>" alt="<?php echo e($advertiser->name); ?>" style="width: 60px; height: 60px; object-fit: contain;">
                <?php else: ?>
                    <img loading="lazy" class="rounded me-3" src="<?php echo e(\App\Helper\Static\Methods::isImageShowable($advertiser->logo)); ?>" alt="<?php echo e($advertiser->name); ?>" style="width: 60px; height: 60px; object-fit: contain;">
                <?php endif; ?>
            </a>
                            </td>
    <td>
                <a href="<?php echo e(route('publisher.view-advertiser', ['sid' => $advertiser->sid])); ?>" class="text-primary-light fw-500 text-decoration-none">
                    <h6 class="mb-1"><?php echo e($advertiser->name); ?></h6>
                </a>
                <p class="mb-0 small">
                    <a href="<?php echo e($advertiser->url); ?>" target="_blank" class="text-primary">
                        <i class="ri-external-link-line align-middle"></i> View website
                    </a>
                </p>
    </td>
    <td>
            <span class="text-primary-light"><?php echo e($advertiser->commission); ?>

<?php echo e($advertiser->commission_type == "percentage" && !Str::endsWith($advertiser->commission, '%') ? '%' : ($advertiser->commission_type != "percentage" ? $advertiser->commission_type : '')); ?>

</span>
    </td>
    <td>
            <?php
                $regions = [];
                if(is_string($advertiser->primary_regions))
                {
                    $regions = json_decode($advertiser->primary_regions);
                }
                elseif (is_array($advertiser->primary_regions))
                {
                    $regions = $advertiser->primary_regions;
                }
                if(count($regions) > 1) {
                    $regions = "Multi";
                } elseif (count($regions) == 1 && $regions[0] == "00") {
                    $regions = "All";
                } elseif (count($regions) == 1) {
                    $regions = $regions[0];
                } else {
                    $regions = "-";
                }
            ?>
            <span class="text-primary-light fw-semibold"><?php echo e($regions && $regions != '-' ? $regions.' Region' : 'No Record'); ?></span>

    </td>
    <td>
            <?php if($advertiser->average_payment_time): ?>
                <span class="text-primary-light fw-semibold"><?php echo e($advertiser->average_payment_time); ?> days</span>
            <?php else: ?>
                <span class="text-primary-light">-</span>
            <?php endif; ?>
    </td>
    <td>
        <div class="d-flex justify-content-center gap-2">
            <?php if($advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="window.location.href='<?php echo e(route("publisher.view-advertiser", ['sid' => $advertiser->sid])); ?>'">
                    <i class="ri-eye-line"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary drawer-trigger" data-drawer="account" onclick="pushInfo('<?php echo e($advertiser->sid); ?>', '<?php echo e($advertiser->name); ?>')">
                    <i class="ri-mail-line"></i>
                </button>
            <?php endif; ?>
            <?php if($checkAdmin): ?>
                <?php
                    $status = null;
                    if(isset($advertiser->advertiser_applies->status))
                    {
                        $status = $advertiser->advertiser_applies->status;
                    }
                    elseif (isset($advertiser->advertiser_applies_status))
                    {
                        $status = $advertiser->advertiser_applies_status;
                    }
                ?>
                <?php if($status && $status == \App\Models\AdvertiserApply::STATUS_PENDING): ?>
                    <button type="button" class="btn btn-sm btn-warning text-capitalize" disabled>
                        <i class="ri-time-line"></i> Pending
                    </button>
                <?php elseif($status && $status == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>
                    <button type="button" class="btn btn-sm btn-success text-capitalize" disabled>
                        <i class="ri-check-line"></i> Joined
                    </button>
                <?php elseif($status && $status == \App\Models\AdvertiserApply::STATUS_REJECTED): ?>
                    <button type="button" class="btn btn-sm btn-danger text-capitalize" disabled>
                        <i class="ri-close-line"></i> Rejected
                    </button>
                <?php elseif($status && $status == \App\Models\AdvertiserApply::STATUS_HOLD || $status && $status == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD): ?>
                    <button type="button" class="btn btn-sm btn-secondary text-capitalize" disabled>
                        <i class="ri-pause-circle-line"></i> Hold
                    </button>
                <?php else: ?>
                    <button type="button" class="btn btn-sm btn-success text-capitalize" data-bs-toggle="modal" data-bs-target="#modal-basic"
                            <?php if($advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>
                                onclick="openApplyModal('<?php echo e($advertiser->sid); ?>', `<?php echo e($advertiser->name); ?>`)"
                            <?php else: ?>
                                onclick="window.location.href='<?php echo e(route("publisher.view-advertiser", ['sid' => $advertiser->sid])); ?>'"
                            <?php endif; ?>
                    >
                        <i class="ri-user-add-line"></i> Apply
                    </button>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </td>
</tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">
                            <h6 class="text-center">Advertiser Data Not Exist</h6>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>


<?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(count($advertisers) && $advertisers instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>
    <?php echo e($advertisers->withQueryString()->links('vendor.pagination.custom')); ?>

<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/advertisers/advertiser-list.blade.php ENDPATH**/ ?>