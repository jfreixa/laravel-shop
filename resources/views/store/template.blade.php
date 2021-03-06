<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    <title>@yield('title', 'Shop')</title>
</head>
<body>
@if (\Session::has('message'))
    @include('store.partials.message')
@endif
@include ('store.partials.nav')
@yield('content')
@include('store.partials.footer')
<script src="{{asset("js/app.js")}}"></script>
@yield('javascript')
</body>
</html>