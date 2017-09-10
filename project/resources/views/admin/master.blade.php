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
        <link href="{{ asset('project/public/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('project/public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('project/public/css/sweetalert.css') }}" rel="stylesheet">
        <link href="{{url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.css')}}" rel="stylesheet">

    </head>
    <body>


        @include('admin.header')
        @yield('content')


        <!-- Scripts -->
        <script src="{{ asset('project/public/js/app.js') }}"></script>
        <script src="{{ asset('project/public/js/sweetalert.min.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.js') }}"></script>
        @yield('footer')
    </body>
</html>
