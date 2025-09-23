<table class="table table-bordered">
    <thead>
        <tr>
            <th class="font-size14">Name</th>
            <th class="font-size14">Type</th>
            <th class="font-size14">Category</th>
            <th class="text-center font-size12">Last Updated</th>
            <th class="text-center font-size12">Status</th>
            <th class="text-center font-size12">Action</th>
        </tr>
    </thead>
    <tbody id="websiteContent">
        <?php $__currentLoopData = $websites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $website): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="website-row-<?php echo e($website->id); ?>">
                <td>
                    <a href="<?php echo e(url($website->url)); ?>" target="_blank"><?php echo e($website->name); ?></a>
                </td>
                <td>
                    <?php echo e(implode(', ', \App\Helper\PublisherData::getMixNames($website->partner_types))); ?>

                </td>
                <td>
                    <?php echo e(implode(', ', \App\Helper\PublisherData::getMixNames($website->categories))); ?>

                </td>
                <td class="text-center">
                    <?php echo e(\Carbon\Carbon::parse($website->updated_at)->format("m/d/Y")); ?>

                </td>
                <td class="text-center" id="status-<?php echo e($website->id); ?>">
                    <?php
                        $class = $website->status == \App\Models\User::ACTIVE ? "badge-success" : (($website->status == \App\Models\User::PENDING) ? "badge-warning text-white" : "badge-danger");
                    ?>
                    <div class='badge <?php echo e($class); ?>'><?php echo e(ucwords($website->status)); ?></div>
                </td>
                <td class="text-center">
                    <?php if($website->status == \App\Models\Website::PENDING): ?>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#verify-modal" onclick="openVerifyModal('<?php echo e($website->id); ?>', '<?php echo e($website->url); ?>')">Verify</a> |
                    <?php endif; ?>
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#website-modal" onclick="openWebsiteModal(1, '<?php echo e($website->id); ?>')">Edit</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<div class="website-modal modal fade show" id="website-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form action="javascript:void(0)" id="websiteForm">
            <input type="hidden" id="website_id" name="website_id">
            <div class="modal-content modal-bg-white">
                <div class="modal-header">
                    <h6 class="modal-title text-black" id="modelTitle"></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span data-feather="x"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="website_name" class="font-weight-bold text-black font-size14">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="website_name" name="website_name" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="website_url" class="font-weight-bold text-black font-size14">URL<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="website_url" name="website_url" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="partner_types" class="font-weight-bold text-black font-size14">Partner Type (Max. 3)<span class="text-danger">*</span></label>
                                <div class="atbd-select ">
                                    <select name="partner_types[]" id="partner_types" class="form-control" multiple="multiple">
                                        <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($method['id']); ?>"><?php echo e($method['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="categories" class="font-weight-bold text-black font-size14">Category (Max. 4)<span class="text-danger">*</span></label>
                                <div class="atbd-select ">
                                    <select name="categories[]" id="categories" class="form-control " multiple="multiple">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monthly_traffic" class="font-weight-bold text-black font-size14">Monthly Traffic<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="monthly_traffic" name="monthly_traffic" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monthly_page_views" class="font-weight-bold text-black font-size14">Monthly Page Views<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="monthly_page_views" name="monthly_page_views" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" id="closeModal">Cancel</button>
                </div>
            </div>
        </form>
        <div class="loader-overlay display-hidden" id="showLoader">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>
</div>

<div class="verify-modal modal fade show" id="verify-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-bg-white">
            <div class="modal-header">
                <h6 class="modal-title text-black">Verify Ownership</h6>
                <button type="button" class="close" data-dismiss="modal" id="closeVerifyModal" aria-label="Close">
                    <span data-feather="x"></span>
                </button>
            </div>
            <div class="modal-body" id="verifyForm">

                <div class="row">
                    <div class="col-lg-12">
                        <label class="font-weight-bold text-black font-size14">HTML Tag</label>
                        <textarea class="form-control" rows="3" id="htmlTag"></textarea>
                        <a href="javascript:void(0)" id="copyHTMLTag" class="btn btn-default btn-squared btn-outline-light btn-sm mt-2 float-right">Copy</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="version-list mb-4">
                            <div class="version-list__single">
                                <ul class="version-info">
                                    <li>Step 1: Add the meta tag to the &lt;head&gt; section</li>
                                    <li>Step 2: Click Verify</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <a href="javascript:void(0)" id="websiteVerify" class="btn btn-primary btn-sm">Verify</a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/publisher/settings/websites/index.blade.php ENDPATH**/ ?>