<div class="form-group has-feedback row <?php echo e($errors->has('model') ? ' has-error ' : ''); ?>">
    <label for="model" class="col-12 control-label">
        <?php echo e(trans("laravelroles::laravelroles.forms.permissions-form.permission-model.label")); ?>

    </label>
    <div class="col-12">
        <select name="model" id="model">
            <option value=""><?php echo e(trans("laravelroles::laravelroles.forms.permissions-form.permission-model.placeholder")); ?></option>

            <?php $__currentLoopData = $permissionModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permissionModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if($permissionModel == $model): ?> selected <?php endif; ?> value="<?php echo e($permissionModel); ?>">
                    <?php echo e($permissionModel); ?>

                </option>}
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php if($errors->has('model')): ?>
        <div class="col-12">
            <span class="help-block">
                <strong><?php echo e($errors->first('model')); ?></strong>
            </span>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\laragon\www\2spiceart\vendor\jeremykenedy\laravel-roles\src/resources/views//laravelroles/forms/partials/permissions-model-select.blade.php ENDPATH**/ ?>