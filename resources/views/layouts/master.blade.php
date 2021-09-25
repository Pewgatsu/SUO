<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('scripts')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('head')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
    $(document).ready(function () {
    $('#searchpagecomponents_table').DataTable({
    "processing":true,
    "serverSide":true,
    });
    });
    $(document).ready(function () {
    $('#searchpagestore_table').DataTable();
    });
    </script>
</head>
<body>
<!-- navbar -->




<div id="app" >
    <main class="bg-light">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </main>
</div>

@stack('datepicker')



</body>
</html>
