<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo e($settings->favicon); ?>">

    <title><?php echo e($settings->app_name); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('assets/frontend/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- player -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css')); ?>" />

    <!-- Theme CSS -->
    <link href="<?php echo e(asset('assets/frontend/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/frontend/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/frontend/css/font-circle-video.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('custom_css'); ?>

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="<?php echo $__env->yieldContent('class'); ?> light">
<!-- logo, menu, search, avatar -->
<?php echo $__env->make('frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('frontend.partials.mobile_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /logo -->

<!-- goto -->

<!-- /goto -->

<?php echo $__env->yieldContent('main_section'); ?>

<!-- footer -->
<?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- /footer -->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo e(asset('assets/frontend/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script  src="<?php echo e(asset('assets/frontend/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelement-and-player.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/custom.js')); ?>"></script>
<?php echo $__env->yieldPushContent('custom_script'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\2spiceart\resources\views/frontend/layout/app.blade.php ENDPATH**/ ?>