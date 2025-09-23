<?php if (! $__env->hasRenderedOnce('6f582061-c313-471b-af6b-2fdccb31cbf1')): $__env->markAsRenderedOnce('6f582061-c313-471b-af6b-2fdccb31cbf1');
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
        padding: 1rem;
        min-height: 130px;
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


    <div class="container-fluid">
        <h1 class="title"><?php echo e(trans('global.show')); ?>

            <?php echo e(trans('cruds.advertiser_configuration.title_singular')); ?>

        </h1>
        <!-- Back button -->
        <a href="<?php echo e(route("admin.settings.advertiser-configs.index")); ?>"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>
        <!-- Main Content Card -->
        <div class="content-card">
            <!-- Card Header with Tabs -->
            <div class="card-header card-header-modern">

                <!-- Publisher name -->
                <h2 class="card-title-modern"><?php echo e($advertiserConfig->name); ?></h2>


                <div class="tab-nav-modern nav" role="tablist">
                    <a class="tab-btn-modern active" style="cursor:pointer;" id="overview_tab" data-toggle="tab"
                        href="#overview" role="tab" area-controls="intro" aria-selected="true">
                        <i class="ri-information-line"></i> Info
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="tab-content">
                    <div class="tab-pane tab-pane-modern fade active show" id="overview" role=""
                        aria-labelledby="overview_tab">

                        <div class="table-responsive">
                            <table class="table table-borderless table-social">
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