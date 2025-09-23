<?php $__env->startSection("content"); ?>
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(trans('global.show')); ?> <?php echo e(trans('cruds.permission.title')); ?></h4>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="<?php echo e(route("admin.user-management.permissions.index")); ?>" class="btn btn-sm btn-gray btn-add">
                                        <i class="la la-undo"></i> <?php echo e(trans('global.back_to_list')); ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2">
                                    <table class="table table-bordered table-striped">
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

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/permissions/show.blade.php ENDPATH**/ ?>