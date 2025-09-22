<?php if (! $__env->hasRenderedOnce('93d91bf6-5ac2-4091-bb21-6b76c71cfdce')): $__env->markAsRenderedOnce('93d91bf6-5ac2-4091-bb21-6b76c71cfdce');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6cccacab-0bee-4fb3-a3de-77305fbd3892')): $__env->markAsRenderedOnce('6cccacab-0bee-4fb3-a3de-77305fbd3892');
$__env->startPush('scripts'); ?>

<script type="text/javascript">
    $(function () {

        $('#datatableTransaction').dataTable({
            order: [[2, 'desc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "170%",
            ajax: {
                url: "<?php echo e(route('admin.transactions.index')); ?>",
                data: function (d) {
                    d.source = $('#source').val();
                    d.country = $('#country').val();
                    d.search_filter = $('#search_filter').val();
                    d.payment_id = "<?php echo e(request()->input('payment_id') ?? ''); ?>";
                    d.r_name = "<?php echo e(request()->input('r_name') ?? ''); ?>";
                }
            },
            columns: [
                { data: 'transaction_id', name: 'transaction_id' },
                { data: 'advertiser_name', name: 'advertiser_name', orderable: false, searchable: false },
                { data: 'transaction_date', name: 'transaction_date' },
                { data: 'customer_country', name: 'customer_country' },
                { data: 'advertiser_country', name: 'advertiser_country' },
                { data: 'paid_to_publisher', name: 'paid_to_publisher' },
                { data: 'commission_status', name: 'commission_status' },
                { data: 'payment_status', name: 'payment_status' },
                { data: 'commission_amount', name: 'commission_amount' },
                { data: 'commission_amount_currency', name: 'commission_amount_currency' },
                { data: 'sale_amount', name: 'sale_amount' },
                { data: 'received_commission_amount', name: 'received_commission_amount' },
                { data: 'received_sale_amount', name: 'received_sale_amount' },
                { data: 'sale_amount_currency', name: 'sale_amount_currency' },
                { data: 'received_commission_amount_currency', name: 'received_commission_amount_currency' },
                { data: 'source', name: 'source' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "0%" },
            ],
            columnDefs: [{
                orderable: false,
                className: '',
                targets: 0
            }, {
            }],
            buttons: [{}]
        });

        $('#source').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        $('#country').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

        $('#search_filter').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

    });
</script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main">
                    <h1 class="title"><?php echo e(trans('cruds.transaction.title')); ?>

                        <?php echo e(trans('global.list')); ?>

                    </h1>
                    <!-- Horizontal Filters -->
                    <div class="horizontal-filters">
                        <div class="filter-header">
                            <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                        </div>

                        <div class="filter-grid">

                            <!-- Country Filter -->
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

                            <!-- Advertiser Type Filter -->
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

                            <!-- Category Filter -->
                            <div class="filter-card">
                                <div class="filter-title">
                                    <h6>Search Filter</h6>
                                </div>
                                <select class="js-example-basic-single js-states form-control" id="search_filter"
                                    name="search_filter">
                                    <option value="" disabled selected>Select</option>
                                    <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($column); ?>"><?php echo e($column); ?></option>
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
                                <?php echo e(trans('cruds.transaction.fields.paid_to_publisher')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.commission_status')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.payment_status')); ?>

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
                                <?php echo e(trans('cruds.transaction.fields.received_commission_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.received_sale_amount')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('cruds.transaction.fields.sale_amount_currency')); ?>

                            </th>
                            <th>
                                <?php echo e(trans('advertiser.api-advertiser.fields.received_commission_amount_currency')); ?>

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
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/transactions/index.blade.php ENDPATH**/ ?>