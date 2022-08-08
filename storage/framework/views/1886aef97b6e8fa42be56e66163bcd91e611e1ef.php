<div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
    <label for="name" class="col-12 control-label">
        <?php echo e(trans("laravelroles::laravelroles.forms.permissions-form.permission-name.label")); ?>

    </label>
    <div class="col-12">
        <input type="text" id="name" name="name" class="form-control" value="<?php echo e($name); ?>" placeholder="<?php echo e(trans('laravelroles::laravelroles.forms.permissions-form.permission-name.placeholder')); ?>">
    </div>
    <?php if($errors->has('name')): ?>
        <div class="col-12">
            <span class="help-block">
                <strong><?php echo e($errors->first('name')); ?></strong>
            </span>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\laragon\www\2spiceart\vendor\jeremykenedy\laravel-roles\src/resources/views//laravelroles/forms/partials/permission-name-input.blade.php ENDPATH**/ ?>