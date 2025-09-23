<?php $__env->startSection("content"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="title"><?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.role.title')); ?></h1>

                <a href="<?php echo e(route('admin.user-management.roles.index')); ?>"
                    class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
                    style="width: 40px; height: 40px; cursor: pointer;">
                    <i class="ri-arrow-left-line text-white"></i>
                </a>
            </div>
        </div>
        <div class="mb-2">
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover">
                        <tbody>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.role.fields.id')); ?>

                                </th>
                                <td>
                                    <?php echo e($role->id); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.role.fields.title')); ?>

                                </th>
                                <td>
                                    <?php echo e($role->title); ?>

                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo e(trans('cruds.role.fields.permissions')); ?>

                                </th>
                                <td>
                                    <?php echo '<span class="badge badge-info">' . implode('</span> <span class="badge badge-info">', $role->permissions->pluck('title')->toArray()) . '</span>'; ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/roles/show.blade.php ENDPATH**/ ?>