<?php if (! $__env->hasRenderedOnce('9c1bd729-c6cb-43cd-8fc7-051c7c3b8557')): $__env->markAsRenderedOnce('9c1bd729-c6cb-43cd-8fc7-051c7c3b8557');
$__env->startPush('styles'); ?>
    <style>
        .disabled {
            pointer-events: none;
            cursor: pointer;
            opacity: 0.7;
        }
        .btn {
            display: inline-block !important;
        }
        .hide {
            display: none !important;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c90388e4-44de-49b2-aae7-4d32429d39b4')): $__env->markAsRenderedOnce('c90388e4-44de-49b2-aae7-4d32429d39b4');
$__env->startPush('scripts'); ?>
    <script>
        let GET_ADVERTISERS_BY_NETWORK_URL = '<?php echo e(route("admin.advertiser-management.api-advertisers.show_on_publisher.get-advertisers-by-network")); ?>';
        let GET_COUNTRIES_BY_NETWORK_URL = '<?php echo e(route("admin.advertiser-management.api-advertisers.show_on_publisher.get-countries-by-network")); ?>';
    </script>
    <script type="text/javascript" src="<?php echo e(\App\Helper\Static\Methods::staticAsset("js/admin/advertiser/show_on.js")); ?>"></script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>
    <div class="contents">
        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main mt-4">
                            <h4 class="text-capitalize breadcrumb-title mt-3"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.title_singular')); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <form action="<?php echo e(route("admin.advertiser-management.api-advertisers.show_on_publisher.store")); ?>" method="post" enctype="multipart/form-data" id="advertiserForm" class="p-5">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" id="page" name="page" value="<?php echo e(request()->page); ?>">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <a href="<?php echo e(route("admin.advertiser-management.api-advertisers.show_on_publisher.index")); ?>" class="btn btn-sm btn-danger <?php if(empty($request->search_by_network || $request->search_by_country)): ?> hide <?php endif; ?>" id="clearFilter">Clear Filter</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group <?php echo e($errors->has('network') ? 'has-error' : ''); ?>">
                                                <label for="SearchByNetwork" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.network')); ?></label>
                                                <select class="js-example-basic-single js-states form-control" id="SearchByNetwork" name="SearchByNetwork">
                                                    <option value="" disabled selected>Please Select</option>
                                                    <?php $__currentLoopData = $networks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $network): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($network); ?>" <?php if($network == request()->search_by_network): ?> selected <?php endif; ?>><?php echo e($network); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="manual">Manual Added Advertiser</option>
                                                </select>
                                                <?php if($errors->has('network')): ?>
                                                    <em class="invalid-feedback"><?php echo e($errors->first('network')); ?></em>
                                                <?php endif; ?>
                                                <p class="helper-block"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.network_helper')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
                                                <label for="SearchByCountry" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.country')); ?></label>
                                                <select class="js-example-basic-single js-states form-control" id="SearchByCountry" name="SearchByCountry">
                                                    <option value="" disabled selected>First Select Network</option>
                                                </select>
                                                <?php if($errors->has('country')): ?>
                                                    <em class="invalid-feedback"><?php echo e($errors->first('country')); ?></em>
                                                <?php endif; ?>
                                                <p class="helper-block"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.country_helper')); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group <?php echo e($errors->has('search') ? 'has-error' : ''); ?>">
                                                <label for="SearchByInput" class="font-weight-bold text-black"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.search')); ?></label>
                                                <input type="text" class="form-control" id="SearchByInput" name="SearchByInput" <?php if(empty($request->search_by_network || $request->search_by_country)): ?> disabled <?php endif; ?> value="<?php echo e($request->search_by_input); ?>" />
                                                <?php if($errors->has('search')): ?>
                                                    <em class="invalid-feedback"><?php echo e($errors->first('search')); ?></em>
                                                <?php endif; ?>
                                                <p class="helper-block"><?php echo e(trans('advertiser.api-advertiser.show_on_publisher.fields.search_helper')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <td colspan="4">
                                                        <label class="p-0 m-0 font-weight-bold text-black">Advertiser List</label>
                                                        <div class="float-right">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input disabled" id="selectAll" name="selectAll" disabled value="1"> Select All
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </td>
                                                </tr>
                                                </thead>
                                                <tbody id="advertiserContent">
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            <small>No Advertiser Exist</small>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td>
                                                        <button type="submit" class="btn btn-xs btn-primary disabled" id="updateBttn" disabled>Update</button>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/advertisers/show_on/advertiser.blade.php ENDPATH**/ ?>