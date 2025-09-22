<div class="row">
    <div class="col-lg-12">
        <div class="form-group <?php echo e($errors->has('message') ? 'has-error' : ''); ?>">
            <label for="key" class="font-weight-bold text-black"><?php echo e(trans('cruds.notification.fields.message')); ?></label>
            <textarea id="message" name="message" class="form-control" rows="20" cols="5"><?php echo e($setting->value ?? null); ?></textarea>
            <?php if($errors->has('message')): ?>
                <em class="invalid-feedback">
                    <?php echo e($errors->first('message')); ?>

                </em>
            <?php endif; ?>
            <p class="helper-block">
                <?php echo e(trans('cruds.notification.fields.message_helper')); ?>

            </p>
        </div>
    </div>
</div>

<div>
    <input class="btn btn-danger" type="submit" value="<?php echo e(trans('global.save')); ?>">
</div>
<?php /**PATH C:\Users\lenovo\Desktop\revdb\resources\views/template/admin/settings/notification/form.blade.php ENDPATH**/ ?>