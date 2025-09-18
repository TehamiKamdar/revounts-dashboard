<?php if (! $__env->hasRenderedOnce('94bd5770-76a3-4019-9886-b310ae7d3991')): $__env->markAsRenderedOnce('94bd5770-76a3-4019-9886-b310ae7d3991');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('81c95a5e-6a29-4b92-9d33-6544c5cd234c')): $__env->markAsRenderedOnce('81c95a5e-6a29-4b92-9d33-6544c5cd234c');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">
        $(function () {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.advertiser-management.advertisers.massDestroy')); ?>",
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
                            headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)

            $('#datatableAdvertiser').dataTable({
                order:          [[1, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: "<?php echo e(route('admin.advertiser-management.advertisers.index')); ?>",
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
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

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(trans('cruds.advertiser.title')); ?> <?php echo e(trans('global.list')); ?></h4>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <div class="action-btn">
                                        <a href="<?php echo e(route("admin.user-management.users.create")); ?>" class="btn btn-sm btn-primary btn-add">
                                            <i class="la la-plus"></i> <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.advertiser.title_singular')); ?>

                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableAdvertiser">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th>
                                                <?php echo e(trans('cruds.advertiser.fields.created_at')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.advertiser.fields.first_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.advertiser.fields.last_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.advertiser.fields.user_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.advertiser.fields.email')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.advertiser.fields.status')); ?>

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

<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\revdb\resources\views/template/admin/advertisers/index.blade.php ENDPATH**/ ?>