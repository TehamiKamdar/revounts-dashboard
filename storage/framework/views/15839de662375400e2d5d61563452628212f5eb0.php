<?php if (! $__env->hasRenderedOnce('d3444812-a022-4cb8-8e9b-9d431bcf41fc')): $__env->markAsRenderedOnce('d3444812-a022-4cb8-8e9b-9d431bcf41fc');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('58ed0582-bd5a-4020-bc8c-1ef7ec45c1c2')): $__env->markAsRenderedOnce('58ed0582-bd5a-4020-bc8c-1ef7ec45c1c2');
$__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(function () {

        $('#datatableStatisticLink').dataTable({
            order: [[0, 'asc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "99.5%",
            ajax: {
                url: "<?php echo e(route('admin.statistics.links.index')); ?>",
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
                <h1 class="title"><?php echo e(trans('link.statistics.links.title')); ?> <?php echo e(trans('global.list')); ?></h1>
            </div>
        </div>

        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableStatisticLink">
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
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/statistics/links/index.blade.php ENDPATH**/ ?>