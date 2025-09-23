<?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<form action="<?php echo e(route("publisher.changes.username-update")); ?>" method="POST" id="userNameUpdateForm" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field("PATCH"); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="user_name" class="font-weight-bold text-black font-size14">User Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" value="<?php echo e($user->user_name ?? null); ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn text-white btn-primary btn-sm btn-default btn-squared text-capitalize">Update</button>
        </div>
    </div>
</form>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/login_info/username.blade.php ENDPATH**/ ?>