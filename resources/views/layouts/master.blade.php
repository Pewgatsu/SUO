<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>



    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="{{ asset('js/app.js') }}"></script>


    <script>
        $(document).ready(function () {
            $('#componentstable').DataTable({

            });
        });
        $(document).ready(function () {
            $('#searchpagestore_table').DataTable();
        });

    </script>

    @yield('head')

</head>
<body>


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
