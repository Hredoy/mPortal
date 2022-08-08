<script type="text/javascript">
    var noConflictMode = jQuery.noConflict(true);
    (function ($) {
        $(document).ready(function () {
            $("#model").selectize({
                placeholder: ' <?php echo e(trans("laravelroles::laravelroles.forms.permissions-form.permission-model.placeholder")); ?> ',
                allowClear: true,
                create: true,
                highlight: true,
                diacritics: true
            });
        });
    }(noConflictMode));
</script>
<?php /**PATH D:\laragon\www\2spiceart\vendor\jeremykenedy\laravel-roles\src/resources/views//laravelroles/scripts/selectizePermission.blade.php ENDPATH**/ ?>