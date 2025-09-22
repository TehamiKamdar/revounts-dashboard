<?php if (! $__env->hasRenderedOnce('64ef2ae2-52a3-4612-bcee-380bc81bb8f3')): $__env->markAsRenderedOnce('64ef2ae2-52a3-4612-bcee-380bc81bb8f3');
$__env->startPush('styles'); ?>
<style>
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('04ce7a79-4711-4af3-8f1a-d228c5c3b363')): $__env->markAsRenderedOnce('04ce7a79-4711-4af3-8f1a-d228c5c3b363');
$__env->startPush('scripts'); ?>
<script type="text/javascript">

    function sendStatusData(ids, status) {
        $.ajax({
            url: "<?php echo e(route('admin.payment-management.statusUpdate')); ?>",
            type: 'POST',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data: { transaction_ids: ids, status: status }
        }).done(function () { location.reload() });
    }

    $(function () {

        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        function statusChange(status, approveButtonTrans, color) {
            let approveButton = {
                text: approveButtonTrans,
                className: `btn-${color} btn-xs ml-3`,
                action: function (e, dt, node, config) {
                    let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).attr("id");
                    });
                    if (ids.length === 0) {
                        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')
                        return
                    }
                    if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                        sendStatusData(ids, status)
                    }
                }
            }
            dtButtons.push(approveButton)
        }

        <?php if($section->value == \App\Models\PaymentHistory::PENDING_TO_PAY): ?>

            statusChange("confirm", "Confirm", "success")
            statusChange("reject", "Reject", "danger")

        <?php elseif($section->value == \App\Models\PaymentHistory::PAID_TO_PUBLISHER): ?>

            statusChange("release", "Release", "success")
            // statusChange("view", "View", "info")

        <?php endif; ?>

        $('#datatableTransaction').dataTable({
            order: [[1, 'desc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "99.5%",
            ajax: {
                url: `<?php echo e(route("admin.payment-management.index", ["section" => $section->value])); ?>`,
                data: function (d) {
                    d.source = $('#source').val();
                    d.publisher = $('#publisher').val();

                    <?php if(count($columns)): ?>
                        d.search_filter = $('#search_filter').val();
                    <?php endif; ?>
                    }
            },
            columns: [
                { data: 'id', name: 'id', orderable: false, searchable: false, width: "0%" },
                { data: 'transaction_date', name: 'transaction_date' },
                { data: 'transaction_id', name: 'transaction_id' },
                { data: 'advertiser_name', name: 'advertiser_name', orderable: false, searchable: false },
                { data: 'sale_amount', name: 'sale_amount' },
                { data: 'commission_amount', name: 'commission_amount' },
                { data: 'name', name: 'name' },
                { data: 'source', name: 'source' },
                { data: 'payment_status', name: 'payment_status' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
            ],
            buttons: dtButtons
        });

        $('#source').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        $('#publisher').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        <?php if(count($columns)): ?>

            $('#search_filter').change(() => {
                $('#datatableTransaction').DataTable().draw();
            });

        <?php endif; ?>

        });
</script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="container-fluid">
        <div class="social-dash-wrap">
            <h1 class="title"><?php echo e($title); ?> <?php echo e(trans('global.list')); ?></h1>
            <div class="horizontal-filters">
                <div class="filter-header">
                    <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                </div>

                <div class="filter-grid">

                    <!-- Country Filter -->
                    <div class="filter-card">
                        <div class="filter-title">
                            <h6>Network</h6>
                        </div>
                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                            <option value="" disabled selected>Select Network</option>
                            <?php $__currentLoopData = \App\Helper\Static\Vars::OPTION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($list); ?>"><?php echo e(ucwords($list)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Advertiser Type Filter -->
                    <div class="filter-card">
                        <div class="filter-title">
                            <h6>Publisher</h6>
                        </div>
                        <select class="js-example-basic-single js-states form-control" id="publisher" name="publisher">
                            <option value="" disabled selected>Select Publisher</option>
                            <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($publisher['id']); ?>"><?php echo e($publisher['name']); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <?php if(count($columns)): ?>
                        <!-- Category Filter -->
                        <div class="filter-card">
                            <div class="filter-title">
                                <h6>Country</h6>
                            </div>
                            <select class="js-example-basic-single js-states form-control" id="search_filter" name="search_filter">
                                <option value="" disabled selected>Search Filter</option>
                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($column); ?>"><?php echo e($column); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableTransaction">
                    <thead>
                        <tr class="userDatatable-header footable-header">
                            <th></th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.transaction_date')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.transaction_id')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.advertiser_name')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.sale_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.commission_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.publisher_domain')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.network')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.paymentManagement.fields.status')); ?>

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
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/payments/index.blade.php ENDPATH**/ ?>