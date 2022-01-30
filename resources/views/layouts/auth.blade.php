<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta-description', config('app.description'))">
    <meta name="keywords" content="@yield('meta-keywords', config('app.keywords'))">
    <meta name="author" content="@yield('meta-author', config('app.name'))">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{config('app.name')}} - @yield('title-page', Route::currentRouteName())</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{asset('assets/css/connect.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dark_theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="auth-page sign-in">

<div class='loader'>
    <div class='spinner-grow text-primary' role='status'>
        <span class='sr-only'>Loading...</span>
    </div>
</div>
<div class="connect-container align-content-stretch d-flex flex-wrap">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>

<!-- Javascripts -->
<script src="{{asset('assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/connect.min.js')}}"></script>
</body>
</html>
