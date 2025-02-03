<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dontpad | @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    @yield('content')
</body>
    @vite('resources/js/app.js')
</html>