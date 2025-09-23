<?php if (! $__env->hasRenderedOnce('2ddcf8eb-e5ee-4f45-b3aa-bc9b9ff19b1a')): $__env->markAsRenderedOnce('2ddcf8eb-e5ee-4f45-b3aa-bc9b9ff19b1a');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('9f614834-665c-49f3-8902-0537bc3dad34')): $__env->markAsRenderedOnce('9f614834-665c-49f3-8902-0537bc3dad34');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(function() {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


            let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.user-management.roles.massDestroy')); ?>",
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

            $('#datatableRole').dataTable({
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
                ajax: "<?php echo e(route('admin.user-management.roles.index')); ?>",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'permissions',
                        name: 'permissions'
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
                <h1 class="title"><?php echo e(trans('cruds.role.title')); ?> <?php echo e(trans('global.list')); ?></h1>
                <div class="d-flex justify-content-end my-3">
                    <a href="<?php echo e(route('admin.user-management.roles.create')); ?>" class="btn btn-sm btn-primary btn-add">
                        <i class="la la-plus"></i> <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.role.title_singular')); ?>

                    </a>
                </div>
            </div>
        </div>
        <?php echo $__env->make('partial.admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableRole">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <?php echo e(trans('cruds.role.fields.title')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.role.fields.permissions')); ?>

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

<?php echo $__env->make('layouts.admin.panel_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/roles/index.blade.php ENDPATH**/ ?>