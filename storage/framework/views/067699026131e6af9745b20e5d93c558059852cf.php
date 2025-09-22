<?php $__env->startSection("content"); ?>
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h1 class="title"><?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.advertiser_configuration.title_singular')); ?></h1>
                            <div class="breadcrumb-action justify-content-center flex-wrap">
                                <div class="action-btn">
                                    
                                        <a href="<?php echo e(route("admin.settings.advertiser-configs.index")); ?>" class="bg-secondary rounded-circle d-flex align-items-center justify-content-center text-decoration-none my-3" style="width: 40px; height: 40px; cursor: pointer;">
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

                                <form action="<?php echo e(route("admin.settings.advertiser-configs.store")); ?>" method="POST"
                                      enctype="multipart/form-data" id="advertiserConfigForm">
                                    <?php echo csrf_field(); ?>
                                    <?php echo $__env->make("template.admin.settings.advertiser_config.form", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('bd772c2d-c034-4a26-b62a-fafd7540bd54')): $__env->markAsRenderedOnce('bd772c2d-c034-4a26-b62a-fafd7540bd54');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('240e3507-98f3-41d5-9ccb-015d967493e5')): $__env->markAsRenderedOnce('240e3507-98f3-41d5-9ccb-015d967493e5');
$__env->startPush('scripts'); ?>
    <script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery.validate.min.js")); ?>"></script>
    <script>
        $(document).ready(function () {
            $("#advertiserConfigForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    key: {
                        required: true,
                    },
                    value: {
                        required: true,
                    },
                },
                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) { // un-hightlight error inputs
                    $(element)
                        .closest('.form-group').removeClass('has-error');
                },
                errorPlacement: function (error, element) {
                    error.insertAfter(element.closest('.input-modal-group'));
                }
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>


<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/settings/advertiser_config/create.blade.php ENDPATH**/ ?>