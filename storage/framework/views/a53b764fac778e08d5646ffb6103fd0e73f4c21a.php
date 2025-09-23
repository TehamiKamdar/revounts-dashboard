<div class="changelog__according">
    <div class="changelog__accordingWrapper">
        <div id="accordionWebsites">
            <?php $__currentLoopData = $publisher->websites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $website): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $url = $website->url ? "<a class='text-primary' href='{$website->url}'>{$website->url}</a>" : "N/A";
                    ?>
                <div class="card">
                    <div class="card-header bg-primary-dark w-100" id="websiteContent<?php echo e($website->id); ?>">
                        <div role="button" class="w-100 changelog__accordingCollapsed <?php echo e($key > 0 ? "collapsed" : null); ?>" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($website->id); ?>" aria-expanded="<?php echo e($key == 0); ?>" aria-controls="collapse<?php echo e($website->id); ?>">
                            <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                <div>Website Information <?php echo strtolower($url); ?></div>
                                <div class="changelog__accordingArrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="collapse<?php echo e($website->id); ?>" class="collapse <?php echo e($key == 0 ? "show" : null); ?>" aria-labelledby="websiteContent<?php echo e($website->id); ?>" data-parent="#accordionWebsites">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless table-social">

                                    <tbody>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.id')); ?>

                                        </th>
                                        <td>
                                            <?php echo e($website->id); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.id')); ?>

                                        </th>
                                        <td>
                                            <?php echo e($website->admitad_wid); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.category')); ?>

                                        </th>
                                        <td>
                                            <?php echo e(implode(', ', \App\Helper\PublisherData::getMixNames($website->categories))); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.partner_type')); ?>

                                        </th>
                                        <td>
                                            <?php echo e(implode(', ', \App\Helper\PublisherData::getMixNames($website->partner_types))); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.url')); ?>

                                        </th>
                                        <td>
                                            <?php echo $url; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.status')); ?>

                                        </th>
                                        <td>
                                                <?php
                                                $status = $website->status;
                                                $class = $status == "active" ? "badge-success" : (($status == "pending") ? "badge-warning" : (($status == "hold") ? "badge-info" :  "badge-danger"));
                                                $status = "<span class='badge {$class}'>".ucwords($status)."</span>";
                                                ?>
                                            <div class="float-left">
                                                <?php echo $status ?? "N/A"; ?>

                                            </div>
                                            <div class="float-right">
                                                <?php if($publisher->email_verified_at): ?>
                                                    <?php if($website->status != "active"): ?>
                                                        <a href="<?php echo e(route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "active"])); ?>" class="mr-2 btn btn-xs btn-success text-white float-left">Active</a>
                                                    <?php endif; ?>
                                                    <?php if($website->status != "hold"): ?>
                                                        <a href="<?php echo e(route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "hold"])); ?>" class="mr-2 btn btn-xs btn-info text-white float-left">Hold</a>
                                                    <?php endif; ?>
                                                    <?php if($website->status != "rejected"): ?>
                                                        <a href="<?php echo e(route("admin.publisher-management.publishers.statusUpdate", ["website" => $website->id, "status" => "rejected"])); ?>" class="btn btn-xs btn-danger text-white float-left">Rejected</a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <small class="float-right">
                                                        Email Not Verified
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                            <div class="clearfix"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.intro')); ?>

                                        </th>
                                        <td>
                                            <?php echo $website->intro ?? "N/A"; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.media_kit')); ?>

                                        </th>
                                        <td>
                                            <?php echo e($website->media_kit ?? "N/A"); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <?php echo e(trans('cruds.publisher.website.fields.website_logo')); ?>

                                        </th>
                                        <td>
                                            <?php echo $website->website_logo ? "<img class='w-25' src='{$website->website_logo}$' class='img-thumbnail img-responsive' />" : "N/A"; ?>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/publishers/websites.blade.php ENDPATH**/ ?>