<!doctype html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>{{config('app.name')}}</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="{{asset('assets/backend/images/favicon.ico')}}" />
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}">
   <!--datatable CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/css/dataTables.bootstrap4.min.css')}}">
   <!-- Typography CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/css/typography.css')}}">
   <!-- Style CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="{{asset('assets/backend/css/responsive.css')}}">
   @stack('custom-css')
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
      @include('backend.partials.sidebar')
      <!-- Sidebar END -->
      <!-- TOP Nav Bar -->
      @include('backend.partials.navbar')
      <!-- TOP Nav Bar END -->
      <!-- Page Content  -->
      @yield('main_section')
      <!-- Page Content END -->
   </div>
   <!-- Wrapper END -->
   <!-- Footer -->
   @include('backend.partials.footer')
   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="{{asset('assets/backend/js/jquery.min.js')}}"></script>
   <script src="{{asset('assets/backend/js/popper.min.js')}}"></script>
   <script src="{{asset('assets/backend/js/bootstrap.min.js')}}"></script>
   <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('assets/backend/js/dataTables.bootstrap4.min.js')}}"></script>
   <!-- Appear JavaScript -->
   <script src="{{asset('assets/backend/js/jquery.appear.js')}}"></script>
   <!-- Countdown JavaScript -->
   <script src="{{asset('assets/backend/js/countdown.min.js')}}"></script>
   <!-- Select2 JavaScript -->
   <script src="{{asset('assets/backend/js/select2.min.js')}}"></script>
   <!-- Counterup JavaScript -->
   <script src="{{asset('assets/backend/js/waypoints.min.js')}}"></script>
   <script src="{{asset('assets/backend/js/jquery.counterup.min.js')}}"></script>
   <!-- Wow JavaScript -->
   <script src="{{asset('assets/backend/js/wow.min.js')}}"></script>
   <!-- Slick JavaScript -->
   <script src="{{asset('assets/backend/js/slick.min.js')}}"></script>
   <!-- Owl Carousel JavaScript -->
   <script src="{{asset('assets/backend/js/owl.carousel.min.js')}}"></script>
   <!-- Magnific Popup JavaScript -->
   <script src="{{asset('assets/backend/js/jquery.magnific-popup.min.js')}}"></script>
   <!-- Smooth Scrollbar JavaScript -->
   <script src="{{asset('assets/backend/js/smooth-scrollbar.js')}}"></script>
   <!-- apex Custom JavaScript -->
   <script src="{{asset('assets/backend/js/apexcharts.js')}}"></script>
   <!-- Chart Custom JavaScript -->
   <script src="{{asset('assets/backend/js/chart-custom.js')}}"></script>
   <!-- Custom JavaScript -->
   <script src="{{asset('assets/backend/js/custom.js')}}"></script>
   @stack('custom-script')
</body>
</html>