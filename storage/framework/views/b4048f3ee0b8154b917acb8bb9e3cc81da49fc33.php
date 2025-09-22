<?php if (! $__env->hasRenderedOnce('3f079e66-9fdf-4fb1-b1a0-207c5bc3fe32')): $__env->markAsRenderedOnce('3f079e66-9fdf-4fb1-b1a0-207c5bc3fe32');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('b2b28efa-73d3-4eac-9c14-38fff9aee6be')): $__env->markAsRenderedOnce('b2b28efa-73d3-4eac-9c14-38fff9aee6be');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(function() {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.user-management.permissions.massDestroy')); ?>",
                className: 'btn-danger btn-xs ml-3',
                action: function(e, dt, node, config) {
                    let ids = $.map(dt.rows({
                        selected: true
                    }).nodes(), function(entry) {
                        return $(entry).attr("id");
                    });
                    if (ids.length === 0) {
                        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')
                        return
                    }
                    if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)

            $('#datatablePermission').dataTable({
                order: [
                    [1, 'asc']
                ],
                scrollY: true,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                autoWidth: true,
                deferRender: true,
                sScrollXInner: "99.5%",
                ajax: "<?php echo e(route('admin.user-management.permissions.index')); ?>",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "0%"
                    },
                ],
                buttons: dtButtons
            });

        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h1 class="title"><?php echo e(trans('cruds.permission.title')); ?> <?php echo e(trans('global.list')); ?></h1>
                    <div class="d-flex justify-content-end my-3">
                        <a href="<?php echo e(route('admin.user-management.permissions.create')); ?>" class="btn btn-sm btn-primary">
                            <i class="ri-add-line"></i> <?php echo e(trans('global.add')); ?>

                            <?php echo e(trans('cruds.advertiser_configuration.title_singular')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make('partial.admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatablePermission">
                    <thead>
                        <tr class="userDatatable-header footable-header">
                            <th></th>
                            <th>
                                <?php echo e(trans('cruds.permission.fields.title')); ?>

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

<?php echo $__env->make('layouts.admin.panel_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/template/admin/permissions/index.blade.php ENDPATH**/ ?>