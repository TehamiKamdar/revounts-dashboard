<?php if (! $__env->hasRenderedOnce('661181b1-3814-46a6-a2bf-a15941864af0')): $__env->markAsRenderedOnce('661181b1-3814-46a6-a2bf-a15941864af0');
$__env->startPush('styles'); ?>
<style>
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('5d69fc25-75bd-4ffa-bf07-c45e816cb129')): $__env->markAsRenderedOnce('5d69fc25-75bd-4ffa-bf07-c45e816cb129');
$__env->startPush('scripts'); ?>
<script type="text/javascript">
    $(function () {

        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "<?php echo e(route('admin.creative-management.coupons.massDestroy')); ?>",
            className: 'btn-danger btn-xs ml-3',
            action: function (e, dt, node, config) {
                let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                    return $(entry).attr("id");
                });
                if (ids.length === 0) {
                    alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')
                    return
                }
                if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                    $.ajax({
                        headers: { 'x-csrf-token': $('meta[name="csrf-token"]').attr('content') },
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }
                    })
                        .done(function () { location.reload() })
                }
            }
        }
        dtButtons.push(deleteButton)

        $('#datatableCoupon').dataTable({
            order: [[1, 'asc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "99.5%",
            ajax: {
                url: "<?php echo e(route('admin.creative-management.coupons.index')); ?>",
            },
            columns: [
                { data: 'id', name: 'id', width: "1%" },
                { data: 'advertiser_name', name: 'advertiser_name', width: "25%" },
                { data: 'title', name: 'title', width: "35%" },
                { data: 'start_date', name: 'start_date', width: "10%" },
                { data: 'end_date', name: 'end_date', width: "10%" },
                { data: 'source', name: 'source', width: "1%" },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
            ],
            buttons: dtButtons
        });

    });
</script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h1 class="title"><?php echo e(trans('creative.creativeManagement.coupon.title')); ?>

                        <?php echo e(trans('global.list')); ?>

                    </h1>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                        <div class="breadcrumb-action justify-content-center flex-wrap">
                            <div class="action-btn">
                                <a href="<?php echo e(route("admin.creative-management.coupons.create")); ?>"
                                    class="btn btn-sm btn-primary btn-add">
                                    <i class="la la-plus"></i> <?php echo e(trans('global.add')); ?>

                                    <?php echo e(trans('cruds.creativeManagement.coupon.title_singular')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableCoupon">
                    <thead>
                        <tr class="userDatatable-header footable-header">
                            <th></th>
                            <th>
                                <?php echo e(trans('creative.creativeManagement.coupon.fields.advertiser_name')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('creative.creativeManagement.coupon.fields.title')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('creative.creativeManagement.coupon.fields.start_date')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('creative.creativeManagement.coupon.fields.end_date')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('creative.creativeManagement.coupon.fields.source')); ?>

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
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/coupons/index.blade.php ENDPATH**/ ?>