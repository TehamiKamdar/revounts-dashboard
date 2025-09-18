

    <!-- Start Table Responsive -->
    <div class="table-responsive">
        <table class="table mb-0 table-hover table-borderless border-0">
            <thead>
                <tr>
                    <th>
                        Invoice#
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Payment ID
                    </th>
                    <th>
                        Domain
                    </th>
                    <th>
                        Method
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                        LC Revshare
                    </th>
                    <th>
                        Paid Amount
                    </th>
                    <th>
                        Paid Date
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($payments)): ?>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            <td>
                                    <?php echo e($payment->invoice_id); ?>

                            </td>
                            <td>
                                    <?php echo e(\Carbon\Carbon::parse($payment->created_at)->format("d-m-Y")); ?>

                            </td>
                            <td>
                                    <?php echo e($payment->payment_id); ?>

                            </td>
                            <td>
                                    <?php
                                    $website = App\Models\Website::find($payment->website_id)
                                    ?>
                                    <?php if($website): ?>
                                    <?php echo e($website->name); ?>

                                    <?php endif; ?>
                            </td>
                            <td>
                                    <?php echo e(ucwords($payment->payment_method->payment_method ?? "-")); ?>

                            </td>
                            <td>
                                    $<?php echo e(number_format($payment->commission_amount, 2) ?? 0); ?>

                            </td>
                            <td>
                                    $<?php echo e(number_format($payment->commission_amount - $payment->lc_commission_amount, 2) ?? 0); ?>

                            </td>
                            <td>
                                    <?php
                                        if($payment->is_new_invoice == \App\Models\PaymentHistory::INVOICE_NEW)
                                        {
                                            $cappedAmount = 30;
                                            if($payment->payment_method->payment_method == \App\Helper\Static\Vars::PAYONEER) {
                                                $cappedAmount = 20;
                                            }
                                            $processingFees = $payment->lc_commission_amount * 0.02;
                                            $processingFees = $processingFees > $cappedAmount ? round($cappedAmount, 1) : round($processingFees, 1);
                                            $amount = "$".number_format($payment->lc_commission_amount - $processingFees, 2);
                                        }
                                        else
                                        {
                                            $amount = "$".number_format($payment->lc_commission_amount, 2);
                                        }

                                    ?>
                                    <?php echo e($amount ?? 0); ?>

                            </td>
                            <td>
                                    <?php echo e($payment->paid_date ?? "-"); ?>

                            </td>
                            <td>
                                <?php if($payment->status == \App\Models\PaymentHistory::PENDING): ?>
                                    <div class="orderDatatable-status d-inline-block">
                                        pacity-warning  text-warning rounded-pill active">Pending
                                    </div>
                                <?php elseif($payment->status == \App\Models\PaymentHistory::PAID): ?>
                                    <div class="orderDatatable-status d-inline-block">
                                        pacity-primary  text-primary rounded-pill active">Paid
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group atbd-button-group btn-group-normal" role="group ">
                                    <?php
                                        $status = $payment->status == \App\Models\Transaction::STATUS_PAID ? "paid" : "pending";
                                    ?>
                                    <a href="<?php echo e(route("publisher.reports.transactions.list")); ?>?payment_id=<?php echo e($payment->id); ?>&r_name=<?php echo e($status); ?>" type="button" class="btn  btn-xs btn-outline-dark">Transactions</a>
                                    <?php if($payment->status == \App\Models\PaymentHistory::PAID): ?>
                                        <a href="<?php echo e(route("publisher.payments.invoice", ['payment_history' => $payment->id])); ?>" type="button" class="btn btn-xs btn-outline-dark">Invoice</a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <!-- End: tr -->

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11">
                            <h6 class="text-center mt-2">Payments Data Not Exist</h6>
                        </td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
    <!-- Table Responsive End -->

    <?php echo $__env->make("template.publisher.widgets.loader", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(count($payments) && $payments instanceof \Illuminate\Pagination\LengthAwarePaginator ): ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-sm-end justify-content-star mt-1 mb-30">

                <?php echo e($payments->withQueryString()->links()); ?>


            </div>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/payments/list_view.blade.php ENDPATH**/ ?>