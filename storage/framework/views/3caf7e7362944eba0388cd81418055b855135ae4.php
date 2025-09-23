<div class="table-responsive">
    <table class="table table-borderless table-social">
        <tbody>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.intro')); ?>

                </th>
                <td>
                    <?php echo e($publisher->publisher->intro ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.address')); ?>

                </th>
                <td>
                    <?php echo e($publisher->publisher->location_address_1 ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.zip_code')); ?>

                </th>
                <td>
                    <?php echo e($publisher->publisher->zip_code ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.country')); ?>

                </th>
                <td>
                    <?php echo e(\App\Helper\Static\Methods::getCountryByID($publisher->publisher->location_country)->name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.state')); ?>

                </th>
                <td>
                    <?php echo e(\App\Helper\Static\Methods::getCityByID($publisher->publisher->location_state)->name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.city')); ?>

                </th>
                <td>
                    <?php echo e(\App\Helper\Static\Methods::getStateByID($publisher->publisher->location_city)->name ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.language')); ?>

                </th>
                <td>
                    <?php echo isset($publisher->publisher->language) ? "<ol><li>".implode("</li><li>", json_decode($publisher->publisher->language, true))."</li></ol>" : "-"; ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.customer_reach')); ?>

                </th>
                <td>
                    <?php echo isset($publisher->publisher->customer_reach) ? "<ol><li>".implode("</li><li>", json_decode($publisher->publisher->customer_reach, true))."</li></ol>" : "-"; ?>

                </td>
            </tr>

        </tbody>
    </table>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/publishers/intro_detail.blade.php ENDPATH**/ ?>