<?php $__env->startSection("content"); ?>

    <div class="container-fluid">
        <h1 class="title"><?php echo e(trans('global.add')); ?>

            <?php echo e(trans('cruds.permission.title_singular')); ?></h1>
                <a href="<?php echo e(route("admin.user-management.permissions.index")); ?>"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <form action="<?php echo e(route("admin.user-management.permissions.store")); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make("template.admin.permissions.form", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/permissions/create.blade.php ENDPATH**/ ?>