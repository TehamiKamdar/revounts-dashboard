<?php if (! $__env->hasRenderedOnce('c428582a-a0f3-485f-99a5-94bdc2aad221')): $__env->markAsRenderedOnce('c428582a-a0f3-485f-99a5-94bdc2aad221');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('5ba2d2e0-b51b-4231-bcd6-e63de5646a64')): $__env->markAsRenderedOnce('5ba2d2e0-b51b-4231-bcd6-e63de5646a64');
$__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(function () {

        $('#datatableStatisticDeepLink').dataTable({
            order: [[0, 'asc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "99.5%",
            ajax: {
                url: "<?php echo e(route('admin.statistics.deeplinks.index')); ?>",
                data: function (d) {

                }
            },
            columns: [
                { data: 'publisher_name', name: 'publisher_name' },
                { data: 'advertiser_name', name: 'advertiser_name' },
                { data: 'website_name', name: 'website_name' },
                { data: 'last_activity', name: 'last_activity' },
                { data: 'hits', name: 'hits' },
                { data: 'unique_visitor', name: 'unique_visitor' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h1 class="title"><?php echo e(trans('link.statistics.links.deep_title')); ?>

                        <?php echo e(trans('global.list')); ?>

                    </h1>
                </div>
            </div>
        </div>
        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableStatisticDeepLink">
                    <thead>
                        <tr>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/statistics/deep_links/index.blade.php ENDPATH**/ ?>