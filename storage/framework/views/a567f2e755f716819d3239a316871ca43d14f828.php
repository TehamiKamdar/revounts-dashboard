<div class="table-responsive">
    <table class="table table-borderless table-social">
        
        <tbody>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.payment_frequency')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->payment_frequency ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.payment_threshold')); ?>

                </th>
                <td>
                    $<?php echo e($publisher->payment_setting->payment_threshold ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.payment_method')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->payment_method ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.bank_location')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->fetchBankLocation->name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.account_holder_name')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->account_holder_name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.bank_account_number')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->bank_account_number ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.bank_code')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->bank_code ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.account_type')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->account_type ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.paypal_country')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->fetchCountry->name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.paypal_holder_name')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->paypal_holder_name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.paypal_email')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->paypal_email ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.payoneer_holder_name')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->payoneer_holder_name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.payment_settings.fields.payoneer_email')); ?>

                </th>
                <td>
                    <?php echo e($publisher->payment_setting->payoneer_email ?? "-"); ?>

                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/publishers/payment-settings.blade.php ENDPATH**/ ?>