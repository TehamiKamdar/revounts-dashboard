<?php if (! $__env->hasRenderedOnce('ed1e5e4f-f61c-4c6e-8dd9-d4617463c6a2')): $__env->markAsRenderedOnce('ed1e5e4f-f61c-4c6e-8dd9-d4617463c6a2');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('a686b9da-4471-48b0-99cf-7f037dc30944')): $__env->markAsRenderedOnce('a686b9da-4471-48b0-99cf-7f037dc30944');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(function() {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.user-management.users.massDestroy')); ?>",
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

            $('#datatableUser').dataTable({
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
                ajax: "<?php echo e(route('admin.user-management.users.index')); ?>",
                columns: [{
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: "0%"
                    },
                ],
                buttons: dtButtons,
                columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': false
                    }
                }],
            });

        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="title"><?php echo e(trans('cruds.user.title')); ?> <?php echo e(trans('global.list')); ?></h1>
        <div class="d-flex justify-content-end my-3">
            <a href="<?php echo e(route('admin.user-management.users.create')); ?>" class="btn btn-sm btn-primary btn-add">
                <i class="ri-add-line"></i> <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.user.title_singular')); ?>

            </a>
        </div>
        <?php echo $__env->make('partial.admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableUser">
            <thead>
                <tr>
                    <th>
                        <?php echo e(trans('cruds.user.fields.created_at')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.user.fields.first_name')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.user.fields.last_name')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.user.fields.user_name')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.user.fields.email')); ?>

                    </th>
                    <th>
                        <?php echo e(trans('cruds.user.fields.status')); ?>

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

<?php echo $__env->make('layouts.admin.panel_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/users/index.blade.php ENDPATH**/ ?>