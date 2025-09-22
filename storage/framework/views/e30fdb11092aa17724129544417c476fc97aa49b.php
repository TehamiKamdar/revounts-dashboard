<div class="row">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
            <label for="name" class="font-weight-bold text-black"><?php echo e(trans('cruds.advertiser_configuration.fields.name')); ?></label>
            <select name="name" id="name" class="form-control" required>
                <option value="" selected disabled>Please Select</option>
                <?php $__currentLoopData = $networks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $network): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($network); ?>" <?php echo e((old('name') == $network || isset($advertiserConfig->name) && $advertiserConfig->name == $network) ? 'selected' : ''); ?>><?php echo e($network); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php if($errors->has('name')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('name')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('cruds.advertiser_configuration.fields.name_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('key') ? 'has-error' : ''); ?>">
            <label for="key" class="font-weight-bold text-black"><?php echo e(trans('cruds.advertiser_configuration.fields.key')); ?></label>
            <input type="text" id="key" name="key" class="form-control" value="<?php echo e(old('key', isset($advertiserConfig) ? $advertiserConfig->key : '')); ?>" required>
            <?php if($errors->has('key')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('key')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('cruds.advertiser_configuration.fields.key_helper')); ?>

            </p>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group <?php echo e($errors->has('value') ? 'has-error' : ''); ?>">
            <label for="value" class="font-weight-bold text-black"><?php echo e(trans('cruds.advertiser_configuration.fields.value')); ?></label>
            <input type="text" id="value" name="value" class="form-control" value="<?php echo e(old('value', isset($advertiserConfig) ? $advertiserConfig->value : '')); ?>" required>
            <?php if($errors->has('value')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('value')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('cruds.advertiser_configuration.fields.value_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/settings/advertiser_config/form.blade.php ENDPATH**/ ?>