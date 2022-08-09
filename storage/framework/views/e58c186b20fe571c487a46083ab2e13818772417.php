<form action="<?php echo e(route('laravelroles::permissions.update', $id)); ?>" method="POST" accept-charset="utf-8" id="edit_permission_form" class="mb-0 needs-validation" enctype="multipart/form-data" role="form" >
    <?php echo e(method_field('PATCH')); ?>

    <div class="card-body">
        <input type="hidden" name="id" value="<?php echo e($id); ?>">
        <?php echo $__env->make('laravelroles::laravelroles.forms.permission-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="card-footer">
        <div class="row ">
            <div class="col-md-6">
                <span data-toggle="tooltip" title="<?php echo trans('laravelroles::laravelroles.tooltips.update-permission'); ?>">
                    <button type="submit" class="btn btn-success btn-lg btn-block" value="save" name="action">
                        <i class="fa fa-save fa-fw">
                            <span class="sr-only">
                                 <?php echo trans("laravelroles::laravelroles.forms.permissions-form.buttons.save-permission.sr-icon"); ?>

                            </span>
                        </i>
                        <?php echo trans("laravelroles::laravelroles.forms.permissions-form.buttons.update-permission.name"); ?>

                    </button>
                </span>
            </div>
        </div>
    </div>
</form>
<?php /**PATH D:\laragon\www\2spiceart\vendor\jeremykenedy\laravel-roles\src/resources/views//laravelroles/forms/edit-permission-form.blade.php ENDPATH**/ ?>