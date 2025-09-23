<?php if (! $__env->hasRenderedOnce('5edc13b0-4f05-4169-91f0-5ebfdf02c88d')): $__env->markAsRenderedOnce('5edc13b0-4f05-4169-91f0-5ebfdf02c88d');
$__env->startPush('scripts'); ?>
<script type="text/javascript">
    // Ek hi dafa listener bind karo
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

    function showDetails() {
        if (!$.fn.DataTable.isDataTable('#datatableStatisticLink')) {
            $('#datatableStatisticLink').DataTable({
                order: [[0, 'desc']],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                autoWidth: true,
                deferRender: true,
                sScrollXInner: "150%",
                ajax: {
                    url: "<?php echo e(route('admin.statistics.links.show', ['link' => $link->id])); ?>"
                },
                columns: [
                    { data: 'ip_address', name: 'ip_address' },
                    { data: 'operating_system', name: 'operating_system' },
                    { data: 'browser', name: 'browser' },
                    { data: 'device', name: 'device' },
                    { data: 'referer_url', name: 'referer_url' },
                    { data: 'country', name: 'country' },
                    { data: 'iso2', name: 'iso2' },
                    { data: 'region', name: 'region' },
                    { data: 'city', name: 'city' },
                    { data: 'zipcode', name: 'zipcode' },
                    { data: 'created_at', name: 'created_at' }
                ],
                columnDefs: [{
                    orderable: false,
                    className: '',
                    targets: 0
                }],
                buttons: [{}]
            });
        }
    }
</script>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('72938f2f-4e0b-47a5-b334-9e511b506210')): $__env->markAsRenderedOnce('72938f2f-4e0b-47a5-b334-9e511b506210');
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
        <h1 class="title"><?php echo e(trans('global.show')); ?> <?php echo e(trans('link.statistics.links.title_singular')); ?></h1>
        <a href="<?php echo e(route("admin.statistics.links.index")); ?>"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>
        <!-- Main Content Card -->
        <div class="content-card">
            <!-- Card Header with Tabs -->
            <div class="card-header-modern">
                <h2 class="card-title-modern">
                    <i
                        class="ri-user-3-line"></i><?php echo e(isset($link->publisher->first_name) && isset($link->publisher->last_name) ? $link->publisher->first_name . " " . $link->publisher->last_name : "-"); ?>

                </h2>
                <div class="tab-nav-modern nav" role="tablist">
                    <a class="tab-btn-modern active" style="cursor:pointer;" id="basic_intro_tab" data-bs-toggle="tab"
                        data-bs-target="#basic_intro" role="tab" area-controls="intro" aria-selected="true">
                        <i class="ri-information-line"></i> Intro
                    </a>
                    <a class="tab-btn-modern" style="cursor:pointer;" id="detail-tab" data-bs-toggle="tab"
                        data-bs-target="#detail" role="tab" aria-controls="detail" aria-selected="false">
                        <i class="ri-file-text-line"></i> Tracking Detail
                    </a>
                </div>
            </div>
            <div class="card-body p-0">

                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="tab-content">
                    <div class="tab-pane tab-pane-modern fade active show" id="basic_intro" role="tabpanel"
                        aria-labelledby="basic_intro_tab">
                            <div class="table-responsive">
                                <table class="table table-borderless table-social">

                                    <tbody>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.publisher_name')); ?>

                                            </th>
                                            <td>
                                                <?php echo e(isset($link->publisher->first_name) && isset($link->publisher->last_name) ? $link->publisher->first_name . " " . $link->publisher->last_name : "-"); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.advertiser_name')); ?>

                                            </th>
                                            <td>
                                                <?php echo e($link->advertiser->name ?? "-"); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.website_name')); ?>

                                            </th>
                                            <td>
                                                <?php echo e($link->website->name ?? "-"); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.click_through_url')); ?>

                                            </th>
                                            <td>
                                                <?php
    if (isset($link->click_through_url)) {
                                                                                        ?>
                                                <a href="<?php echo e($link->click_through_url); ?>"
                                                    target="_blank"><?php echo e($link->click_through_url); ?></a>
                                                <?php
    } else {
        echo "-";
    }
                                                                                        ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.tracking_url_short')); ?>

                                            </th>
                                            <td>
                                                <?php
    if (isset($link->tracking_url_short)) {
                                                                                        ?>
                                                <a href="<?php echo e($link->tracking_url_short); ?>"
                                                    target="_blank"><?php echo e($link->tracking_url_short); ?></a>
                                                <?php
    } else {
        echo "-";
    }
                                                                                        ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.tracking_url')); ?>

                                            </th>
                                            <td>
                                                <?php
    if (isset($link->tracking_url)) {
                                                                                        ?>
                                                <a href="<?php echo e($link->tracking_url); ?>"
                                                    target="_blank"><?php echo e($link->tracking_url); ?></a>
                                                <?php
    } else {
        echo "-";
    }
                                                                                        ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.hits')); ?>

                                            </th>
                                            <td>
                                                <?php echo e($link->hits ?? "0"); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.unique_visitor')); ?>

                                            </th>
                                            <td>
                                                <?php echo e($link->unique_visitor ?? "0"); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.generated_at')); ?>

                                            </th>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($link->created_at)->format("Y-m-d h:i:s a")); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <?php echo e(trans('link.statistics.links.fields.last_activity')); ?>

                                            </th>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($link->updated_at)->format("Y-m-d h:i:s a")); ?>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                    </div>
                    <div class="tab-pane tab-pane-modern fade p-3" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                            <div class="table-container">
                                <div class="table-responsive">
                                <table class="table table-borderless table-hover" id="datatableStatisticLink">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(trans('link.statistics.links.fields.ip_address')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.operating_system')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.browser')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.device')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.referer_url')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.country')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.iso2')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.region')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.city')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.zipcode')); ?></th>
                                            <th><?php echo e(trans('link.statistics.links.fields.created_at')); ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/statistics/links/show.blade.php ENDPATH**/ ?>