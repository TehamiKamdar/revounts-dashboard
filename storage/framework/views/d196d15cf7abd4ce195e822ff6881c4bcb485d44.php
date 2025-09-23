<div class="table-responsive">
    <table class="table table-borderless table-social">
        <tbody>
            <tr>
                <th>
                    <?php echo e(trans('cruds.billing_info.fields.billing_name')); ?>

                </th>
                <td>
                    <?php echo e($publisher->billing->name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.billing_info.fields.phone_number')); ?>

                </th>
                <td>
                    <?php echo e($publisher->billing->phone ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.billing_info.fields.address')); ?>

                </th>
                <td>
                    <?php echo e($publisher->billing->address ?? ""); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.billing_info.fields.zip_code')); ?>

                </th>
                <td>
                    <?php echo e($publisher->billing->zip_code ?? ""); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.billing_info.fields.location')); ?>

                </th>
                <td>
                    <?php echo e($publisher->billing->fetchCity->name ?? ""); ?>

                    <?php echo e($publisher->billing->fetchState->name ??  ""); ?>

                    <?php echo e($publisher->billing->fetchCountry->name ?? ""); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.billing_info.fields.registration_no')); ?>

                </th>
                <td>
                    <?php echo e($publisher->billing->company_registration_no ?? ""); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.billing_info.fields.tex')); ?>

                </th>
                <td>
                    <?php echo e($publisher->billing->tax_vat_no ?? 0); ?>

                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/publishers/billing-info.blade.php ENDPATH**/ ?>