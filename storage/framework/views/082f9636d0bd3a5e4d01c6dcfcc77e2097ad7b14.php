<!doctype html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title><?php echo e(config('app.name')); ?></title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="<?php echo e(asset('assets/backend/images/favicon.ico')); ?>" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap.min.css')); ?>">
   <!--datatable CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dataTables.bootstrap4.min.css')); ?>">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/typography.css')); ?>">
   <!-- Style CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/style.css')); ?>">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/responsive.css')); ?>">
   <?php echo $__env->yieldPushContent('custom-css'); ?>
</head>
<body>
   <!-- loader Start -->
   <div id="loading">
      <div id="loading-center">
      </div>
   </div>
   <!-- loader END -->
   <!-- Wrapper Start -->
   <div class="wrapper">
      <!-- Sidebar-->
      <?php echo $__env->make('backend.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- Sidebar END -->
      <!-- TOP Nav Bar -->
      <?php echo $__env->make('backend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      <?php echo $__env->yieldContent('main_section'); ?>
      <!-- Page Content END -->
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   <?php echo $__env->make('backend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="<?php echo e(asset('assets/backend/js/jquery.min.js')); ?>"></script>
   <script src="<?php echo e(asset('assets/backend/js/popper.min.js')); ?>"></script>
   <script src="<?php echo e(asset('assets/backend/js/bootstrap.min.js')); ?>"></script>
   <script src="<?php echo e(asset('assets/backend/js/jquery.dataTables.min.js')); ?>"></script>
   <script src="<?php echo e(asset('assets/backend/js/dataTables.bootstrap4.min.js')); ?>"></script>
   <!-- Appear JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/jquery.appear.js')); ?>"></script>
   <!-- Countdown JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/countdown.min.js')); ?>"></script>
   <!-- Select2 JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/select2.min.js')); ?>"></script>
   <!-- Counterup JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/waypoints.min.js')); ?>"></script>
   <script src="<?php echo e(asset('assets/backend/js/jquery.counterup.min.js')); ?>"></script>
   <!-- Wow JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/wow.min.js')); ?>"></script>
   <!-- Slick JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/slick.min.js')); ?>"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/owl.carousel.min.js')); ?>"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/jquery.magnific-popup.min.js')); ?>"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/smooth-scrollbar.js')); ?>"></script>
   <!-- apex Custom JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/apexcharts.js')); ?>"></script>
   <!-- Chart Custom JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/chart-custom.js')); ?>"></script>
   <!-- Custom JavaScript -->
   <script src="<?php echo e(asset('assets/backend/js/custom.js')); ?>"></script>
   <?php echo $__env->yieldPushContent('custom-script'); ?>
</body>
</html><?php /**PATH C:\laragon\www\2spiceart\resources\views/backend/layout/app.blade.php ENDPATH**/ ?>