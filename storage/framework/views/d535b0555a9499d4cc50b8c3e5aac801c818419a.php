<?php echo e(csrf_field()); ?>

<div class="row">
    <div class="col-md-8">
        <?php echo $__env->make('laravelroles::laravelroles.forms.partials.permission-name-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('laravelroles::laravelroles.forms.partials.permission-slug-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('laravelroles::laravelroles.forms.partials.permission-desc-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-12 col-md-4">
        <?php echo $__env->make('laravelroles::laravelroles.forms.partials.permissions-model-select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH D:\laragon\www\2spiceart\vendor\jeremykenedy\laravel-roles\src/resources/views//laravelroles/forms/permission-form.blade.php ENDPATH**/ ?>