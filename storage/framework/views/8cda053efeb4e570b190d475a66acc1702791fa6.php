<div class="table-responsive">
    <table class="table table-borderless table-social">
        
        <tbody>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.id')); ?>

                </th>
                <td>
                    <?php echo e($publisher->id); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.sid')); ?>

                </th>
                <td>
                    <?php echo e($publisher->sid); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.first_name')); ?>

                </th>
                <td>
                    <?php echo e($publisher->first_name); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.last_name')); ?>

                </th>
                <td>
                    <?php echo e($publisher->last_name); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.user_name')); ?>

                </th>
                <td>
                    <?php echo e($publisher->user_name); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.email')); ?>

                </th>
                <td>
                    <?php echo e($publisher->email); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.gender')); ?>

                </th>
                <td>
                    <?php echo e($publisher->publisher->gender ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.dob')); ?>

                </th>
                <td>
                    <?php echo e($publisher->publisher->dob ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.email_verified_at')); ?>

                </th>
                <td>
                    <?php echo e($publisher->email_verified_at ?? "-"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.remember_token')); ?>

                </th>
                <td>
                    <?php echo e($publisher->remember_token ? "YES" : "NO"); ?>

                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.status')); ?>

                </th>
                <td>
                    <?php
                    $status = $publisher->status;
                    $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : "badge-danger");
                    ?>
                    <div class="float-left">
                        <?php echo "<span class='badge {$class}'>".ucwords($status)."</span>"; ?>

                    </div>
                    <?php if($publisher->email_verified_at): ?>
                        <div class="float-right">
                            <?php if($publisher->status != "active"): ?>
                                <a href="<?php echo e(route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "active"])); ?>" class="mr-2 btn btn-xs btn-success text-white float-left">Active</a>
                            <?php endif; ?>
                            <?php if($publisher->status != "hold"): ?>
                                <a href="<?php echo e(route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "hold"])); ?>" class="mr-2 btn btn-xs btn-info text-white float-left">Hold</a>
                            <?php endif; ?>
                            <?php if($publisher->status != "rejected"): ?>
                                <a href="<?php echo e(route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "rejected"])); ?>" class="btn btn-xs btn-danger text-white float-left">Rejected</a>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <small class="float-right">
                            Email Not Verified
                            <?php if($publisher->status != "rejected"): ?>
                                <a href="<?php echo e(route("admin.user-management.users.statusUpdate", ["user" => $publisher->id, "status" => "rejected"])); ?>" class="mr-3 btn btn-xs btn-danger text-white float-left">Rejected</a>
                            <?php endif; ?>
                        </small>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                </td>
            </tr>
            <tr>
                <th>
                    <?php echo e(trans('cruds.publisher.fields.api_key')); ?>

                </th>
                <td>
                    <?php echo e($publisher->api_token ?? "-"); ?>

                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/publishers/intro.blade.php ENDPATH**/ ?>