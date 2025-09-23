<?php if (! $__env->hasRenderedOnce('943b2be6-2591-47b3-9b7d-4670062a28ee')): $__env->markAsRenderedOnce('943b2be6-2591-47b3-9b7d-4670062a28ee');
$__env->startPush('styles'); ?>

<style>
    /* Main Layout Structure */
    .page-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 20px 0;
    }

    .page-wrapper {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Breadcrumb Section */
    .breadcrumb-modern {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 1.5rem 2rem;
        margin-bottom: 24px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .breadcrumb-main {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .breadcrumb-title {
        color: var(--primary-dark-color);
        font-weight: 600;
        font-size: 1.75rem;
        margin: 0;
    }

    .breadcrumb-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .action-btn-modern {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(123, 54, 181, 0.2);
        border-radius: 10px;
        padding: 0.75rem 1.25rem;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .action-btn-modern:hover {
        background: var(--primary-color);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(123, 54, 181, 0.2);
    }

    /* Main Content Card */
    .content-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-bottom: 24px;
    }

    /* Card Header */
    .card-header-modern {
        background: linear-gradient(135deg, rgba(123, 54, 181, 0.1) 0%, rgba(123, 54, 181, 0.05) 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(123, 54, 181, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .card-title-modern {
        color: var(--primary-dark-color);
        font-weight: 600;
        font-size: 1.5rem;
        margin: 0;
    }

    /* Tab Navigation */
    .tab-nav-modern {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 12px;
        padding: 0.5rem;
        border: 1px solid rgba(123, 54, 181, 0.2);
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem;
    }

    .tab-btn-modern {
        padding: 0.75rem 1.25rem;
        border: none;
        background: transparent;
        color: var(--dark-color);
        font-weight: 500;
        font-size: 0.85rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .tab-btn-modern:hover,
    .tab-btn-modern.active {
        background: var(--primary-color);
        color: white;
        box-shadow: 0 4px 12px rgba(123, 54, 181, 0.2);
    }

    /* Tab Content */
    .tab-content-modern {
        padding: 0;
    }

    .tab-pane-modern {
        padding: 2rem;
        min-height: 400px;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .page-wrapper {
            padding: 0 20px;
        }
    }

    @media (max-width: 768px) {
        .breadcrumb-main {
            flex-direction: column;
            align-items: flex-start;
        }

        .breadcrumb-actions {
            width: 100%;
            justify-content: flex-start;
        }

        .card-header-modern {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .tab-nav-modern {
            width: 100%;
            overflow-x: auto;
        }

        .tab-btn-modern {
            white-space: nowrap;
            font-size: 0.8rem;
            padding: 0.6rem 1rem;
        }

        .tab-pane-modern {
            padding: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .breadcrumb-modern {
            padding: 1rem;
        }

        .card-header-modern {
            padding: 1rem;
        }

        .tab-pane-modern {
            padding: 1rem;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .content-card {
        animation: fadeIn 0.5s ease-out;
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

    <div class="container-fluid">
                <h1 class="title"><?php echo e(trans('global.show')); ?> <?php echo e(trans('advertiser.api-advertiser.title_singular')); ?></h1>
                <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.index")); ?>"
                    class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
                    style="width: 40px; height: 40px; cursor: pointer;">
                    <i class="ri-arrow-left-line text-white"></i>
                </a>
        <!-- Main Content Card -->
        <div class="content-card">
            <!-- Card Header with Tabs -->
            <div class="card-header-modern">
                <h2 class="card-title-modern">
                    <i class="ri-user-3-line"></i><?php echo e($api_advertiser->name); ?>

                </h2>

                <div class="tab-nav-modern nav" role="tablist">
                    <a class="tab-btn-modern active" style="cursor:pointer;" id="overview_tab" data-bs-toggle="tab"
                        data-bs-target="#overview" role="tab" area-controls="intro" aria-selected="true">
                        <i class="ri-information-line"></i> Overview
                    </a>
                    <a class="tab-btn-modern" style="cursor:pointer;" id="commission_rates-tab" data-bs-toggle="tab"
                        data-bs-target="#commission_rates" role="tab" area-controls="commission_rates" aria-selected="false">
                        <i class="ri-file-text-line"></i> Commission Rates
                    </a>
                    <a class="tab-btn-modern" style="cursor:pointer;" id="terms-tab" data-bs-toggle="tab" data-bs-target="#terms"
                        role="tab" area-controls="terms" aria-selected="false">
                        <i class="ri-folder-2-line"></i> Terms
                    </a>
                </div>

            </div>

            <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="tab-content">
                <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview_tab">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-bordered table-social">
                                <thead>
                                    <tr>
                                        <th scope="col" class="width-15">Field</th>
                                        <th scope="col">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('advertiser.api-advertiser.fields.logo')); ?>

                                        </th>
                                        <td>
                                            <img src="<?php echo e(\App\Helper\Static\Methods::isImageShowable($api_advertiser->logo)); ?>"
                                                alt="<?php echo e($api_advertiser->name); ?>" class="width-100">
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
                                                if (isset($api_advertiser->url)):
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
                                            <a href="<?php echo e($api_advertiser->click_through_url ?? "-"); ?>"
                                                target="_blank"><?php echo e($api_advertiser->click_through_url ?? "-"); ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('advertiser.api-advertiser.fields.tracking_url_short')); ?>

                                        </th>
                                        <td>
                                            <a href="<?php echo e($api_advertiser->tracking_url_short ?? "-"); ?>"
                                                target="_blank"><?php echo e($api_advertiser->tracking_url_short ?? "-"); ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('advertiser.api-advertiser.fields.valid_domains')); ?>

                                        </th>
                                        <td>
                                            <?php echo $api_advertiser->valid_domains ? "<ol><li>" . implode("</li><li>", $api_advertiser->valid_domains) . "</li></ol>" : "-"; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('advertiser.api-advertiser.fields.promotional_methods')); ?>

                                        </th>
                                        <td>
                                            <?php echo $methods ? "<ol><li>" . implode("</li><li>", $methods) . "</li></ol>" : "-"; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('advertiser.api-advertiser.fields.program_restrictions')); ?>

                                        </th>
                                        <td>
                                            <?php echo $restrictions ? "<ol><li>" . implode("</li><li>", $restrictions) . "</li></ol>" : "-"; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('advertiser.api-advertiser.fields.categories')); ?>

                                        </th>
                                        <td>
                                            <?php echo $categories ? "<ol><li>" . implode("</li><li>", $categories) . "</li></ol>" : "-"; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('advertiser.api-advertiser.fields.tags')); ?>

                                        </th>
                                        <td>
                                            <?php echo $api_advertiser->tags ? "<ol><li>" . implode("</li><li>", $api_advertiser->tags) . "</li></ol>" : "-"; ?>

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
                                            <?php echo $api_advertiser->supported_regions ? "<ol><li>" . implode("</li><li>", $api_advertiser->supported_regions) . "</li></ol>" : "-"; ?>

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
                </div>
                <div class="tab-pane fade" id="commission_rates" role="tabpanel" aria-labelledby="commission_rates-tab">
                    <div class="table-container">
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
                </div>
                <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="terms-tab">
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-bordered table-social min-height-zero">
                                <thead>
                                    <tr>
                                        <th scope="col" class="width-15">Field</th>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/api/show.blade.php ENDPATH**/ ?>