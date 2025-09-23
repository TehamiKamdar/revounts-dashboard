<?php if (! $__env->hasRenderedOnce('bd5db541-20c7-4e61-a64f-7fa2abe7b6e9')): $__env->markAsRenderedOnce('bd5db541-20c7-4e61-a64f-7fa2abe7b6e9');
$__env->startPush("styles"); ?>

<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <h1 class="title">Default Commission</h1>
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="#" method="POST"
                        enctype="multipart/form-data" id="userForm">
                        <?php echo csrf_field(); ?>
                        <label for="name">Enter Default
                            Commission</label>

                        <input type="text" placeholder="" class="form-control" name="default_commission"
                            value="80">
                        <div style="margin-top:20px;">
                            <input class="btn btn-danger" type="submit" value="Save">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/settings/default_commission.blade.php ENDPATH**/ ?>