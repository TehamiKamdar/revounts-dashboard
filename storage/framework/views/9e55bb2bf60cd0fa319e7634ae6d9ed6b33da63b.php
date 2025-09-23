<?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="email" class="font-weight-bold text-black font-size14">User Email</label>
            <input type="email" disabled class="form-control" id="email" name="email" placeholder="User Email" value="<?php echo e($user->email ?? null); ?>">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <a href="javascript:void(0)" data-toggle="modal" data-target="#changeEmailModal" class="btn text-white btn-primary btn-sm btn-default btn-squared text-capitalize">Change Email</a>
    </div>
</div>

<div class="changeEmailModal modal fade show" id="changeEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form action="<?php echo e(route("publisher.changes.email-update")); ?>" method="post" id="changeEmailForm">
            <?php echo method_field("PATCH"); ?>
            <?php echo csrf_field(); ?>
            <div class="modal-content modal-bg-white">
                <div class="modal-header">
                    <h6 class="modal-title" id="modelTitle"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span data-feather="x"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="font-weight-bold text-black font-size14">New Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email_confirmation" class="font-weight-bold text-black font-size14">Confirm Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_confirmation" name="email_confirmation" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="closeModal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/login_info/change_email.blade.php ENDPATH**/ ?>