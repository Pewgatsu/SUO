<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>
    @yield('head')


    <script src="{{ asset('js/app.js') }}"></script>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{asset('js/scripts.js')}}"></script>




</head>
<body>
<!-- navbar -->


<div id="app" >
    <main class="flex-fill">
        @include('landing.navbar')
        @yield('content')
        @include('layouts.footer')
    </main>
</div>





</body>
</html>


