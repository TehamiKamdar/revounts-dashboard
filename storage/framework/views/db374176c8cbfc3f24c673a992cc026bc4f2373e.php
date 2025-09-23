<?php $__env->startSection("content"); ?>

    <div class="container-fluid">

        <h1 class="title"><?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.permission.title')); ?></h1>
        <a href="<?php echo e(route("admin.user-management.permissions.index")); ?>"
            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
            style="width: 40px; height: 40px; cursor: pointer;">
            <i class="ri-arrow-left-line text-white"></i>
        </a>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-2">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-social">
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <?php echo e(trans('cruds.permission.fields.id')); ?>

                                                </th>
                                                <td>
                                                    <?php echo e($permission->id); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <?php echo e(trans('cruds.permission.fields.title')); ?>

                                                </th>
                                                <td>
                                                    <?php echo e($permission->title); ?>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/permissions/show.blade.php ENDPATH**/ ?>