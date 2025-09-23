<div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
    <label for="title"><?php echo e(trans('cruds.permission.fields.title')); ?> *</label>
    <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title', isset($permission) ? $permission->title : '')); ?>" required>
    <?php if($errors->has('title')): ?>
        <em class="invalid-feedback">
            <?php echo e($errors->first('title')); ?>

        </em>
    <?php endif; ?>
    <p class="helper-block">
        <?php echo e(trans('cruds.permission.fields.title_helper')); ?>

    </p>
</div>
<div>
    <input class="btn btn-primary btn-default btn-sm" type="submit" value="<?php echo e(trans('global.save')); ?>">
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/permissions/form.blade.php ENDPATH**/ ?>