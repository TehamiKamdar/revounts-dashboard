<?php if (! $__env->hasRenderedOnce('ca048151-7c26-459f-b41a-8570a5d2ebd6')): $__env->markAsRenderedOnce('ca048151-7c26-459f-b41a-8570a5d2ebd6');
$__env->startPush('styles'); ?>

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('3a0ae2a7-165f-4387-ba44-6213ed5371ee')): $__env->markAsRenderedOnce('3a0ae2a7-165f-4387-ba44-6213ed5371ee');
$__env->startPush('scripts'); ?>
    <script>
        function clickToCopy()
        {
            copyToClipboard(document.getElementById("api_token"))
            normalMsg({"message": "API Token Successfully Copied.", "success": true});
        }
        function regenerateTokenRequest()
        {
            $.ajax({
                url: '<?php echo e(route("publisher.tools.api-info.regenerate-token")); ?>',
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    $("#api_token").val(response.token);
                },
                error: function (response) {
                    showErrors(response);
                }
            });
        }
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container">

            <div class="card m-bottom-50 m-top-50">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-xxl-6 col-lg-6 col-sm-12">
                            <div class="files-area d-flex justify-content-between align-items-center">
                                <div class="files-area__left d-flex align-items-center">
                                    <div class="files-area__title">
                                        <h3 class="mb-10 fw-500 color-dark text-capitalize">API Token <small>(This will be used for API documentation.)</small></h3>
                                        <input type="text" class="form-control <?php $__errorArgs = ['api_token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="api_token" name="api_token" placeholder="" value="<?php echo e(auth()->user()->api_token); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-lg-6 col-sm-12 m-top-40">
                            <a href="javascript:void(0)" onclick="clickToCopy()" id="copyToken" class="btn btn-sm btn-outline-info float-left mr-3">Copy</a>
                            <a href="javascript:void(0)" onclick="regenerateTokenRequest()" class="btn btn-sm btn-outline-danger float-left  mr-3">Regenerate Token</a>
                            <a href="<?php echo e(env("DOC_APP_URL") . "/api/documentation"); ?>" class="btn btn-sm btn-outline-warning float-left" target="_blank">View Documentation</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.publisher.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/tools/api/view.blade.php ENDPATH**/ ?>