<?php if (! $__env->hasRenderedOnce('6a2ac9f2-4429-4188-b381-7e7e94770e4b')): $__env->markAsRenderedOnce('6a2ac9f2-4429-4188-b381-7e7e94770e4b');
$__env->startPush('styles'); ?>
<style>
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d2e4d1e1-a6b5-4cd2-be9f-3814e7061de2')): $__env->markAsRenderedOnce('d2e4d1e1-a6b5-4cd2-be9f-3814e7061de2');
$__env->startPush('scripts'); ?>
<script type="text/javascript">

    function sendStatusData(id) {
        $("#paymentID").val(id);
        $("#comments").val('');
    }

    $(function () {

        let columns, sortColumn = 0;

        <?php if($section->value == \App\Models\PaymentHistory::RELEASE_PAYMENT): ?>
            columns = [
                { data: 'created_at', name: 'created_at' },
                { data: 'url', name: 'url' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'payment_details', name: 'payment_details' },
                { data: 'payment_option', name: 'payment_option' },
                { data: 'amount', name: 'amount' },
                { data: 'amount_to_pay', name: 'amount_to_pay' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "10%" },
            ];
        <?php else: ?>
            columns =[
                { data: 'created_at', name: 'created_at' },
                { data: 'paid_date', name: 'paid_date' },
                { data: 'url', name: 'url' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'payment_details', name: 'payment_details' },
                { data: 'payment_option', name: 'payment_option' },
                { data: 'amount', name: 'amount' },
                { data: 'amount_to_pay', name: 'amount_to_pay' },
                { data: 'action', name: 'action', orderable: false, searchable: false, width: "10%" },
            ];
            sortColumn = 1;
        <?php endif; ?>

        $('#datatableTransaction').dataTable({
            order: [[sortColumn, 'desc']],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: true,
            deferRender: true,
            sScrollXInner: "120%",
            ajax: {
                url: `<?php echo e(route("admin.payment-management.index", ["section" => $section->value])); ?>`,
                data: function (d) {
                    d.publisher = $('#publisher').val();
                }
            },
            columns: columns,
            buttons: [],
            columnDefs: [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }]
        });

        $('#publisher').change(() => {
            $('#datatableTransaction').DataTable().draw();
        });

    });
</script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <h1 class="title"><?php echo e($title); ?> <?php echo e(trans('global.list')); ?></h1>
                    <div class="d-flex justify-content-end mb-4">
                        <div class="col-lg-2">
                            <div class="breadcrumb-main p-0">
                                <a href="<?php echo e(route("admin.payment-management.releasePaymentExport")); ?>"
                                    class="btn btn-sm btn-primary">Export XSLX</a>
                            </div>
                        </div>
                    </div>
                    <div class="horizontal-filters">
                        <div class="filter-header">
                            <h5 class="mb-0"><i class="ri-filter-3-line"></i> Filters</h5>
                        </div>

                        <div class="filter-grid">
                            <div class="filter-card col-lg-4">
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
                                        <?php echo e(trans('cruds.paymentManagement.fields.created_at')); ?>

                                    </th>
                                    <?php if($section->value == \App\Models\PaymentHistory::PAYMENT_HISTORY): ?>
                                        <th>
                                            Paid Date
                                        </th>
                                    <?php endif; ?>
                                    <th>
                                        <?php echo e(trans('cruds.paymentManagement.fields.publisher_domain')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.paymentManagement.fields.payment_method')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.paymentManagement.fields.payment_details')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.paymentManagement.fields.payment_option')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.paymentManagement.fields.amount')); ?>

                                    </th>
                                    <th>
                                        <?php echo e(trans('cruds.paymentManagement.fields.amount_to_pay')); ?>

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

        <div class="modal-basic modal fade" id="modal-basic" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <form action="<?php echo e(route("admin.payment-management.statusUpdateReleasePayment")); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="paymentID" name="paymentID">

                    <div class="modal-content modal-bg-white ">
                        <div class="modal-header">
                            <h6 class="modal-title">Release Payment</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="converted_amount" class="font-weight-bold mt-1 text-black">Converted
                                    Amount:</label>
                                <input class="form-control" name="converted_amount" id="converted_amount" />
                            </div>
                            <div class="form-group">
                                <label for="transaction_id" class="font-weight-bold mt-1 text-black">Transaction ID:</label>
                                <input class="form-control" name="transaction_id" id="transaction_id" />
                            </div>
                            <div class="form-group">
                                <label for="comments" class="font-weight-bold mt-1 text-black">Add Comments:</label>
                                <textarea class="form-control" rows="4" cols="4" name="comments" id="comments"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Release</button>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/payments/release.blade.php ENDPATH**/ ?>