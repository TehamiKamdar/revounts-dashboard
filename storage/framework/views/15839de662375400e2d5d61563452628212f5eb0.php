<?php if (! $__env->hasRenderedOnce('1731e723-e058-4b47-96a8-a466eacd9d86')): $__env->markAsRenderedOnce('1731e723-e058-4b47-96a8-a466eacd9d86');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('7c4c98db-dccc-437f-8d7c-9fcf4787068f')): $__env->markAsRenderedOnce('7c4c98db-dccc-437f-8d7c-9fcf4787068f');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(function () {

            $('#datatableStatisticLink').dataTable({
                order:          [[0, 'asc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "<?php echo e(route('admin.statistics.links.index')); ?>",
                    data: function (d) {

                    }
                },
                columns: [
                    {data: 'publisher_name', name: 'publisher_name'},
                    {data: 'advertiser_name', name: 'advertiser_name'},
                    {data: 'website_name', name: 'website_name'},
                    {data: 'last_activity', name: 'last_activity'},
                    {data: 'hits', name: 'hits'},
                    {data: 'unique_visitor', name: 'unique_visitor'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                columnDefs: [{
                    // orderable: false,
                    // className: '',
                    // targets: 0
                }, {
                }],
                buttons: [{}]
            });

        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(trans('link.statistics.links.title')); ?> <?php echo e(trans('global.list')); ?></h4>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableStatisticLink">
                                    <thead>
                                    <tr class="userDatatable-header footable-header">
                                        <th>
                                            <?php echo e(trans('link.statistics.links.fields.publisher_name')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('link.statistics.links.fields.advertiser_name')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('link.statistics.links.fields.website_name')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('link.statistics.links.fields.last_activity')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('link.statistics.links.fields.hits')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('link.statistics.links.fields.unique_visitor')); ?>

                                        </th>
                                        <th>
                                            <?php echo e(trans('global.action')); ?>

                                        </th>
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

<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/statistics/links/index.blade.php ENDPATH**/ ?>