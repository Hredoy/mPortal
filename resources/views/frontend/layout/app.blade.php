<!doctype html>
<html lang="en-US">
   <head>
      <!-- Required meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Streamit - Responsive Bootstrap 4 Template</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('assets/frontend/images/favicon.ico')}}" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}" />
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/typography.css')}}">
      <!-- Style -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
      <!-- Responsive -->
      <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}" />
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Header -->
      @include('frontend.partials.header')
      <!-- Header End -->
      <!-- MainContent -->
      @yield('main_section')
      <!-- MainContent End-->
      <!-- Footer -->
      @include('frontend.partials.footer')
      <!-- Footer End -->
      <!-- back-to-top -->
      <div id="back-to-top">
         <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
      </div>
      <!-- back-to-top End -->
      <!-- jQuery, Popper JS -->
      <script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
      <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
      <!-- Bootstrap JS -->
      <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
      <!-- Slick JS -->
      <script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
      <!-- owl carousel Js -->
      <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
      <!-- select2 Js -->
      <script src="{{asset('assets/frontend/js/select2.min.js')}}"></script>
      <!-- Magnific Popup-->
      <script src="{{asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
      <!-- Slick Animation-->
      <script src="{{asset('assets/frontend/js/slick-animation.min.js')}}"></script>
      <!-- Custom JS-->
      <script src="{{asset('assets/frontend/js/custom.js')}}"></script>
   </body>
</html>