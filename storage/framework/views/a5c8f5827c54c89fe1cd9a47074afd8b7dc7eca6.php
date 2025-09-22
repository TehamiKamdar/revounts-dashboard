<?php if (! $__env->hasRenderedOnce('09040f74-bde5-4ef0-b14f-11c45e08f29e')): $__env->markAsRenderedOnce('09040f74-bde5-4ef0-b14f-11c45e08f29e');
$__env->startPush('styles'); ?>

    <style>
        .width-100 {
            width: 100px;
        }
        .table-social tbody tr td:not(:first-child) {
            text-align: left !important;
        }
        .card-header {
            padding: 0.75rem 1rem !important;
        }
        .card .card-header {
            text-transform: none !important;
            min-height: 40px !important;
        }
        .changelog__according .card .card-header {
            min-height: 40px !important;
            height: 40px !important;
        }
        .changelog__accordingCollapsed {
            height: 40px !important;
        }
        .v-num {
            font-size: 14px !important;
        }
        .btn-xs {
            line-height: 1.7 !important;
            font-size: 10px !important;
        }
        .table, .changelog__according .card:not(:last-child) {
            margin-bottom: 0 !important;
        }
        .social-dash-wrap .card.card-overview {
            margin-bottom: 5%;
        }
        .social-dash-wrap .card-body {
            padding: 0 !important;
        }
        .changelog__according {
            margin-top: 0 !important;
        }
        .width-15 {
            width: 15%;
        }
        .min-height-zero {
            min-height: 0
        }
    </style>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>
    <?php
        $mix = new \App\Models\Mix();
        $methods = $mix->whereIn("id", $api_advertiser->promotional_methods ?? [])->get()->pluck("name")->toArray();
        $restrictions = $mix->whereIn("id", $api_advertiser->program_restrictions ?? [])->get()->pluck("name")->toArray();
        $categories = $mix->whereIn("id", $api_advertiser->categories ?? [])->get()->pluck("name")->toArray();
    ?>
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(trans('global.show')); ?> <?php echo e(trans('advertiser.api-advertiser.title_singular')); ?></h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.index")); ?>" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
                                        <i class="la la-undo mr-2"></i> <?php echo e(trans('global.back_to_list')); ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-overview border-0">
                            <div class="card-header">
                                <h6><?php echo e($api_advertiser->name); ?></h6>
                                <div class="card-extra">
                                    <div class="card-tab btn-group nav nav-tabs">
                                        <a class="btn btn-xs btn-white active border-light" id="overview_tab" data-toggle="tab" href="#overview" role="tab" area-controls="intro" aria-selected="true">Overview</a>
                                        <a class="btn btn-xs btn-white border-light" id="commission_rates-tab" data-toggle="tab" href="#commission_rates" role="tab" area-controls="commission_rates" aria-selected="false">Commission Rates</a>
                                        <a class="btn btn-xs btn-white border-light" id="terms-tab" data-toggle="tab" href="#terms" role="tab" area-controls="terms" aria-selected="false">Terms</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="overview" role="" aria-labelledby="overview_tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"  class="width-15">Field</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.logo')); ?>

                                                        </th>
                                                        <td>
                                                            <img src="<?php echo e(\App\Helper\Static\Methods::isImageShowable($api_advertiser->logo)); ?>" alt="<?php echo e($api_advertiser->name); ?>" class="width-100">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.id')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->id); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.network_advertiser_id')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->advertiser_id ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.our_advertiser_id')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->sid ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.name')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->name ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.primary_region')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->primary_regions ? implode(" | ", $api_advertiser->primary_regions) : "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.country_full_name')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->country_full_name ? implode(" | ", $api_advertiser->country_full_name) : "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.currency_code')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->currency_code ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.average_payment_time')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->average_payment_time ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.validation_days')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->validation_days ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.goto_cookie_lifetime')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->goto_cookie_lifetime ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.epc')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->epc ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.source_type')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e(strtoupper($api_advertiser->type)); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.deeplink_enabled')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->deeplink_enabled ? "true" : "false"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.exclusive')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->exclusive ? "true" : "false"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.status')); ?>

                                                        </th>
                                                        <td>
                                                            <?php if($api_advertiser->status == 1): ?>
                                                                Active
                                                            <?php elseif($api_advertiser->status == 2): ?>
                                                                Hold
                                                            <?php else: ?>
                                                                Not Active
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.commission')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->commission ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.commission_type')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->commission_type ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.url')); ?>

                                                        </th>
                                                        <td>
                                                            <?php
                                                                $url = "-";
                                                                $href = "-";
                                                                if(isset($api_advertiser->url)):
                                                                    $url = $api_advertiser->url;
                                                                    $href = route("redirect.url") . "?url=" . urlencode($url);
                                                                endif;
                                                            ?>
                                                            <a href="<?php echo e($href); ?>" target="_blank"><?php echo e($url); ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.click_through_url')); ?>

                                                        </th>
                                                        <td>
                                                            <a href="<?php echo e($api_advertiser->click_through_url ?? "-"); ?>" target="_blank"><?php echo e($api_advertiser->click_through_url ?? "-"); ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.tracking_url_short')); ?>

                                                        </th>
                                                        <td>
                                                            <a href="<?php echo e($api_advertiser->tracking_url_short ?? "-"); ?>" target="_blank"><?php echo e($api_advertiser->tracking_url_short ?? "-"); ?></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.valid_domains')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo $api_advertiser->valid_domains ? "<ol><li>".implode("</li><li>", $api_advertiser->valid_domains)."</li></ol>" : "-"; ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.promotional_methods')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo $methods ? "<ol><li>".implode("</li><li>", $methods)."</li></ol>" : "-"; ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.program_restrictions')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo $restrictions ? "<ol><li>".implode("</li><li>", $restrictions)."</li></ol>" : "-"; ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.categories')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo $categories ? "<ol><li>".implode("</li><li>", $categories)."</li></ol>" : "-"; ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.tags')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo $api_advertiser->tags ? "<ol><li>".implode("</li><li>", $api_advertiser->tags)."</li></ol>" : "-"; ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.offer_type')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->offer_type ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.supported_regions')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo $api_advertiser->supported_regions ? "<ol><li>".implode("</li><li>", $api_advertiser->supported_regions)."</li></ol>" : "-"; ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <?php echo e(trans('advertiser.api-advertiser.fields.source')); ?>

                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->source ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Description
                                                        </th>
                                                        <td>
                                                            <?php echo e($api_advertiser->description ?? "-"); ?>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="commission_rates" role="" aria-labelledby="commission_rates-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social min-height-zero">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Condition</th>
                                                        <th scope="col">Rate</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Additional Info</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $api_advertiser->commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo e($commission->date ?? "-"); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($commission->condition ?? "-"); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($commission->rate ?? "-"); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($commission->type ?? "-"); ?>

                                                            </td>
                                                            <td>
                                                                <?php echo e($commission->info ?? "-"); ?>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="terms" role="" aria-labelledby="terms-tab">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-social min-height-zero">
                                                <thead>
                                                <tr>
                                                    <th scope="col"  class="width-15">Field</th>
                                                    <th scope="col">Value</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>
                                                            Program Terms
                                                        </th>
                                                        <td>
                                                            <?php echo $api_advertiser->program_policies ?? "-"; ?>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/api/show.blade.php ENDPATH**/ ?>