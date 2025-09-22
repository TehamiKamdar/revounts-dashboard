<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title"><?php echo e(trans('cruds.role.fields.title')); ?>*</label>
    <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($role) ? $role->title : '')); ?>" required>
    <?php if($errors->has('title')): ?>
        <em class="invalid-feedback">
            <?php echo e($errors->first('title')); ?>

        </em>
    <?php endif; ?>
    <p class="helper-block">
        <?php echo e(trans('cruds.role.fields.title_helper')); ?>

    </p>
</div>
<div class="form-group <?php echo e($errors->has('permissions') ? 'has-error' : ''); ?>">
    <label for="permissions"><?php echo e(trans('cruds.role.fields.permissions')); ?>*
        <span class="btn btn-info btn-xs select-all"><?php echo e(trans('global.select_all')); ?></span>
        <span class="btn btn-info btn-xs deselect-all"><?php echo e(trans('global.deselect_all')); ?></span>
    </label>
    <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple" required>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : ''); ?>><?php echo e($permissions); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php if($errors->has('permissions')): ?>
        <em class="invalid-feedback">
            <?php echo e($errors->first('permissions')); ?>

        </em>
    <?php endif; ?>
    <p class="helper-block">
        <?php echo e(trans('cruds.role.fields.permissions_helper')); ?>

    </p>
</div>
<div>
    <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
</div>
<?php /**PATH C:\Users\Tehami\Desktop\revounts-dashboard\resources\views/template/admin/roles/form.blade.php ENDPATH**/ ?>