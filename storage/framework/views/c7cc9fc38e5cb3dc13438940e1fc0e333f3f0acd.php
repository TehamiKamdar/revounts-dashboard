<?php if (! $__env->hasRenderedOnce('0dcf1a5c-8262-4755-85da-5a984fbe3b0e')): $__env->markAsRenderedOnce('0dcf1a5c-8262-4755-85da-5a984fbe3b0e');
$__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset('vendor_assets/css/select2.min.css')); ?>" />
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('01f6e9dc-71f8-4638-8ee2-1e8a80de78e7')): $__env->markAsRenderedOnce('01f6e9dc-71f8-4638-8ee2-1e8a80de78e7');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset('vendor_assets/js/select2.full.min.js')); ?>"></script>
    <script>
        $("#permissions").select2({
            placeholder: "Please Select",
            dropdownCssClass: "tag",
            allowClear: true,
        });
        $('.select-all').click(function() {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        });
        $('.deselect-all').click(function() {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h1 class="title"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.permission.title_singular')); ?></h1>
                            <a href="<?php echo e(route('admin.user-management.roles.index')); ?>"
                            class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3"
                            style="width: 40px; height: 40px; cursor: pointer;">
                            <i class="ri-arrow-left-line text-white"></i>
                        </a>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make('partial.admin.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <form action="<?php echo e(route('admin.user-management.roles.store')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo $__env->make('template.admin.roles.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.panel_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/template/admin/roles/create.blade.php ENDPATH**/ ?>