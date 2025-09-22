<?php $__env->startSection("content"); ?>
    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main mt-4">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(trans('cruds.notification.title_singular')); ?></h4>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <form action="<?php echo e(route("admin.settings.notification.store")); ?>" method="POST"
                                      enctype="multipart/form-data" id="advertiserConfigForm">
                                    <?php echo csrf_field(); ?>
                                    <?php echo $__env->make("template.admin.settings.notification.form", compact('setting'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php if (! $__env->hasRenderedOnce('6674f9e2-5205-48be-a297-0d3da40df3ad')): $__env->markAsRenderedOnce('6674f9e2-5205-48be-a297-0d3da40df3ad');
$__env->startPush('styles'); ?>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('090c37af-abf8-467f-acac-87f3db331e02')): $__env->markAsRenderedOnce('090c37af-abf8-467f-acac-87f3db331e02');
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


<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/settings/notification/create.blade.php ENDPATH**/ ?>