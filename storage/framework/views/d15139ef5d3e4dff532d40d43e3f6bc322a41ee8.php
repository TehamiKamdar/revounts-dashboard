<?php if (! $__env->hasRenderedOnce('976c7c9e-163f-4ac4-85c0-934c89a203f1')): $__env->markAsRenderedOnce('976c7c9e-163f-4ac4-85c0-934c89a203f1');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('f949945a-8f8e-4e70-a84e-ca1d6b981976')): $__env->markAsRenderedOnce('f949945a-8f8e-4e70-a84e-ca1d6b981976');
$__env->startPush('scripts'); ?>
<script type="text/javascript">
    function deleteRecord(id) {
        if (confirm('Are you sure?'))
            document.getElementById(`deleteRow${id}`).submit();
    }
    function deleteFormSubmit() {
        return confirm("<?php echo e(trans('global.areYouSure')); ?>");
    }
    $(function () {

        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "<?php echo e(route('admin.settings.advertiser-configs.massDestroy')); ?>",
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

        $('#datatableAdvertiserConfig').dataTable({
            order: [[1, 'desc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "99.5%",
            ajax: "<?php echo e(route('admin.settings.advertiser-configs.index')); ?>",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'key', name: 'key' },
                { data: 'value', name: 'value' },
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
                    <h1 class="title"><?php echo e(trans('cruds.advertiser_configuration.title')); ?> <?php echo e(trans('global.list')); ?></h1>

                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="my-3 d-flex justify-content-end">
                            <a href="<?php echo e(route("admin.settings.advertiser-configs.create")); ?>"
                                class="btn btn-sm btn-primary btn-add">
                                <i class="ri-add-line"></i> <?php echo e(trans('global.add')); ?>

                                <?php echo e(trans('cruds.advertiser_configuration.title_singular')); ?>

                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableAdvertiserConfig">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                <?php echo e(trans('cruds.advertiser_configuration.fields.name')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.advertiser_configuration.fields.key')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.advertiser_configuration.fields.value')); ?>

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
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/settings/advertiser_config/index.blade.php ENDPATH**/ ?>