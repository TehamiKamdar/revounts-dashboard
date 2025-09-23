<?php if (! $__env->hasRenderedOnce('24c4a3a8-9954-44da-b03f-67f2ec992404')): $__env->markAsRenderedOnce('24c4a3a8-9954-44da-b03f-67f2ec992404');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/select2.min.css")); ?>"/>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('43700762-6df9-47c9-9892-b51c9052bcf7')): $__env->markAsRenderedOnce('43700762-6df9-47c9-9892-b51c9052bcf7');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/select2.full.min.js")); ?>"></script>
    <script>
        $("#permissions").select2({
            placeholder: "Permissions",
            dropdownCssClass: "tag",
            allowClear: true,
        });
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        });
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h1 class="title"><?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.role.title_singular')); ?></h1>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    <a href="<?php echo e(route('admin.user-management.roles.index')); ?>" class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3" style="width: 40px; height: 40px; cursor: pointer;">
                                        <i class="ri-arrow-left-line text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <form action="<?php echo e(route("admin.user-management.roles.update", [$role->id])); ?>" method="POST"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <?php echo $__env->make("template.admin.roles.form", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/roles/edit.blade.php ENDPATH**/ ?>