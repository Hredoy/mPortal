<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>{{config('app.name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/frontend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- player -->
    <link rel="stylesheet" href="{{asset('assets/frontend/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelementplayer.min.css')}}" />

    <!-- Theme CSS -->
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/font-circle-video.css')}}" rel="stylesheet">
    @stack('custom_css')

    <!-- font-family: 'Hind', sans-serif; -->
    <link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700|Hind+Guntur:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="@yield('class') light">
<!-- logo, menu, search, avatar -->
@include('frontend.partials.navbar')

@include('frontend.partials.mobile_menu')
<!-- /logo -->

<!-- goto -->
{{-- @yield('second_navbar') --}}
<!-- /goto -->

@yield('main_section')

<!-- footer -->
@include('frontend.partials.footer')
<!-- /footer -->



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script  src="{{asset('assets/frontend/js/vendor/player/johndyer-mediaelement-89793bc/build/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/custom.js')}}"></script>
@stack('custom_script')
</body>
</html>
