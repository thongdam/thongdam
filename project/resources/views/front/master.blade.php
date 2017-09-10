<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <!-- Styles -->
        <link href="{{asset('/project/public/theme/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('/project/public/theme/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{asset('/project/public/theme/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{asset('/project/public/theme/css/price-range.css')}}" rel="stylesheet">
        <link href="{{asset('/project/public/theme/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('/project/public/theme/css/main.css')}}" rel="stylesheet">
        <link href="{{asset('/project/public/theme/css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('/project/public/jquerybxslider/jquery.bxslider.min.css')}}" rel="stylesheet">
        <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.css')}}" rel="stylesheet">
        @yield('header')
    </head>
    <body>
        @include('front.header')

        @yield('content')
        @include('front.footer')
        <script src="{{ asset('/project/public/theme/js/jquery.js') }}"></script>
        <script src="{{ asset('/project/public/jquerybxslider/jquery.bxslider.min.js') }}"></script>
        <script src="{{ asset('/project/public/theme/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/project/public/theme/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('/project/public/theme/js/price-range.js') }}"></script>
        <script src="{{ asset('/project/public/theme/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('/project/public/theme/js/main.js') }}"></script>
        <script src="{{ asset('/project/public/js/jquery.elevatezoom.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js') }}"></script>
        @yield('footer')
    </body>
</html>
