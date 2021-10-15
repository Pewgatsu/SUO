<!doctype html>
<html lang="{{ str_replace('', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>


    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    @livewireStyles

</head>
<body style="background: #2d2d2d">


@include('auth.header')
@livewire('auth.login')

@livewireScripts

</body>

</html>
