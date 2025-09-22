<?php if(count($publisher->mediakits)): ?>
    <div class="changelog__according">
        <div class="changelog__accordingWrapper">
            <div id="accordionKits">
                <?php $__currentLoopData = $publisher->mediakits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $kit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <div class="card-header w-100" id="mediaKitContent<?php echo e($kit->id); ?>">
                            <div role="button" class="w-100 changelog__accordingCollapsed <?php echo e($key > 0 ? "collapsed" : null); ?>" data-toggle="collapse" data-target="#mediaKitcollapse<?php echo e($kit->id); ?>" aria-expanded="<?php echo e($key == 0); ?>" aria-controls="mediaKitcollapse<?php echo e($kit->id); ?>">
                                <div class="changelog__accordingTitle d-flex justify-content-between w-100">
                                    <div class="v-num">Media Kit #<?php echo e($key + 1); ?></div>
                                    <div class="changelog__accordingArrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="mediaKitcollapse<?php echo e($kit->id); ?>" class="collapse <?php echo e($key == 0 ? "show" : null); ?>" aria-labelledby="mediaKitcollapse<?php echo e($kit->id); ?>" data-parent="#accordionKits">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-social">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 15%">Field</th>
                                                <th scope="col">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>
                                                    <?php echo e(trans('cruds.publisher.media_kit.fields.id')); ?>

                                                </th>
                                                <td>
                                                    <?php echo e($kit->id); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <?php echo e(trans('cruds.publisher.media_kit.fields.name')); ?>

                                                </th>
                                                <td>
                                                    <?php echo e($kit->name); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <?php echo e(trans('cruds.publisher.media_kit.fields.image')); ?>

                                                </th>
                                                <td>
                                                    <?php echo e($kit->image); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <?php echo e(trans('cruds.publisher.media_kit.fields.size')); ?>

                                                </th>
                                                <td>
                                                    <?php echo e($kit->size); ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <?php echo e(trans('cruds.publisher.media_kit.fields.created_at')); ?>

                                                </th>
                                                <td>
                                                    <?php echo e($kit->created_at); ?>

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
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-bordered table-social">
            <thead>
            <tr>
                <th scope="col" style="width: 15%">Field</th>
                <th scope="col">Value</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" class="text-center">
                        <div class="atbd-empty text-center mt-5">
                            <div class="atbd-empty__image">
                                <img src="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/folders/1.svg")); ?>" alt="Admin Empty">
                            </div>
                            <div class="atbd-empty__text">
                                <p class="">No Data</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/publishers/kits.blade.php ENDPATH**/ ?>