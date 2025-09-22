<?php if (! $__env->hasRenderedOnce('214b6625-c654-449e-bf6e-5673df9b9a9f')): $__env->markAsRenderedOnce('214b6625-c654-449e-bf6e-5673df9b9a9f');
$__env->startPush('styles'); ?>

<style>
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

    .table,
    .changelog__according .card:not(:last-child) {
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
</style>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h1 class="title"><?php echo e(trans('global.show')); ?>

                        <?php echo e(trans('cruds.advertiser_configuration.title_singular')); ?></h1>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="approval-glass-card card">
                <div class="approval-header">
                    <div class="d-flex align-items-center gap-3">
                        <!-- Back button -->
                        <a href="<?php echo e(route("admin.settings.advertiser-configs.index")); ?>"
                            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none"
                            style="width: 40px; height: 40px; cursor: pointer;">
                            <i class="ri-arrow-left-line text-white"></i>
                        </a>

                        <!-- Publisher name -->
                        <h4 class="mb-0"><?php echo e($advertiserConfig->name); ?></h4>
                    </div>

                    <div class="card-tab btn-group nav nav-tabs">
                        <a class="btn btn-xs btn-white active border-light" id="overview_tab" data-toggle="tab"
                            href="#overview" role="tab" area-controls="intro" aria-selected="true">
                            <i class="ri-information-line"></i> Info
                        </a>
                    </div>
                </div>

                <div class="approval-body">
                    <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-social">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 15%">Field</th>
                                        <th scope="col">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.advertiser_configuration.fields.id')); ?>

                                        </th>
                                        <td>
                                            <?php echo e($advertiserConfig->id); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.advertiser_configuration.fields.name')); ?>

                                        </th>
                                        <td>
                                            <?php echo e($advertiserConfig->name); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.advertiser_configuration.fields.key')); ?>

                                        </th>
                                        <td>
                                            <?php echo e($advertiserConfig->key); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.advertiser_configuration.fields.value')); ?>

                                        </th>
                                        <td>
                                            <?php echo e($advertiserConfig->value); ?>

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
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/settings/advertiser_config/show.blade.php ENDPATH**/ ?>