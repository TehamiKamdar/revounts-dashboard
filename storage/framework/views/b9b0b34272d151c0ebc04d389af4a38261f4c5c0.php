<?php if (! $__env->hasRenderedOnce('4788866f-2bf6-4dcb-8de9-cdb0b9d7d705')): $__env->markAsRenderedOnce('4788866f-2bf6-4dcb-8de9-cdb0b9d7d705');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('0bfcfac8-a45b-40d0-939a-bab2110a4659')): $__env->markAsRenderedOnce('0bfcfac8-a45b-40d0-939a-bab2110a4659');
$__env->startPush('scripts'); ?>
<script type="text/javascript">

    function movePendingToPay(ids) {
        $.ajax({
            url: "<?php echo e(route('admin.transactions.missing.payment.store')); ?>",
            type: 'POST',
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            data: { transaction_ids: ids }
        }).done(function () { location.reload() });
    }
    $(function () {

        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);

        function statusChange(approveButtonTrans, color) {
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
                        movePendingToPay(ids)
                    }
                }
            }
            dtButtons.push(approveButton)
        }

        statusChange("Approve", "success")

        $('#datatableTransaction').dataTable({
            order: [[2, 'desc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "150%",
            ajax: {
                url: "<?php echo e(route('admin.transactions.missing.payment')); ?>",
                data: function (d) {
                    d.source = $('#source').val();
                    d.country = $('#country').val();
                    d.publisher_id = $('#publisher_id').val();
                    d.search_filter = $('#search_filter').val();
                    d.route_name = "<?php echo e(request()->route()->getName()); ?>";
                }
            },
            columns: [
                { data: 'transaction_id', name: 'transaction_id' },
                { data: 'advertiser_name', name: 'advertiser_name', orderable: false, searchable: false },
                { data: 'transaction_date', name: 'transaction_date' },
                { data: 'customer_country', name: 'customer_country' },
                { data: 'advertiser_country', name: 'advertiser_country' },
                { data: 'commission_status', name: 'commission_status' },
                { data: 'commission_amount', name: 'commission_amount' },
                { data: 'commission_amount_currency', name: 'commission_amount_currency' },
                { data: 'sale_amount', name: 'sale_amount' },
                { data: 'sale_amount_currency', name: 'sale_amount_currency' },
                { data: 'source', name: 'source' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
            ],
            columnDefs: [{
                orderable: false,
                className: '',
                targets: 0
            }, {
            }],
            buttons: dtButtons
        });

        $('#source').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        $('#publisher_id').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        $('#country').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        $('#search_filter').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        // Event to select or deselect row on any column click
        $('#datatableTransaction tbody').on('click', 'tr', function () {
            let table = $('#datatableTransaction').DataTable();
            if ($(this).hasClass('selected')) {
                $(this).removeClass('selected');
                table.row(this).deselect();
            } else {
                $(this).addClass('selected');
                table.row(this).select();
            }
        });


        $("#publisher").change(() => {
            $.ajax({
                url: '<?php echo e(route("get-websites-by-user")); ?>',
                type: 'POST',
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                data: { "publisher": $("#publisher").val() },
                success: function (response) {
                    $("#website")
                        .empty()
                        .append('<option disabled selected="selected">Please Select</option>')

                    if (Object.keys(response).length) {
                        for (key in response) {
                            $('#website').append(`
                                <option value="${key}">${response[key]}</option>
                            `);
                        }
                    } else {
                        $("#website")
                            .append('<option disabled selected="selected">No Data Found</option>');
                    }
                },
                error: function (response) {

                }
            });
        });

    });
</script>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h1 class="title"><?php echo e(trans('cruds.transaction_missing_payment.title')); ?>

                        <?php echo e(trans('global.list')); ?></h1>
                        <div class="horizontal-filters">
                        <div class="filter-header">
                            <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                        </div>

                        <div class="filter-grid">

                            <!-- Country Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Publisher</h6>
                                </div>
                                <select class="js-example-basic-single js-states form-control" id="publisher_id"
                                    name="publisher_id">
                                    <option value="" disabled selected>Select</option>
                                    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($publisher->id); ?>"><?php echo e(ucwords($publisher->user_name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Advertiser Type Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Source</h6>
                                </div>
                                <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                    <option value="" disabled selected>Select</option>
                                    <?php $__currentLoopData = \App\Helper\Static\Vars::OPTION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($list); ?>"><?php echo e(ucwords($list)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <!-- Category Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Country</h6>
                                </div>
                                <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                    <option value="" disabled selected>Select</option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country['iso2']); ?>"><?php echo e($country['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-borderless table-hover datatable" id="datatableTransaction">
                    <thead>
                        <tr class="userDatatable-header footable-header">
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.transaction_id')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.advertiser_name')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.transaction_date')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.customer_country')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.advertiser_country')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.commission_status')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.commission_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.commission_amount_currency')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.sale_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.sale_amount_currency')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('advertiser.api-advertiser.fields.source')); ?>

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
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/template/admin/transaction_missing_payment/index.blade.php ENDPATH**/ ?>