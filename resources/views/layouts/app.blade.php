<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="#">
            <img src="#" alt="" width="30" height="30" class="d-inline-block align-text-top">
            System Unit Optimizer
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#user_profile" class="nav-link">User Profile</a>
                </li>
                <li class="nav-item">
                    <a href="#logout" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<header>
    <div class="container my-1">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="{{ route('users') }}">Users</a>
            </li>
            <li class="nav-item dropdown" role="presentation">
                <button class="nav-link dropdown-toggle" id="profile-tab" data-bs-toggle="dropdown"
                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Components
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab"
                           data-bs-target="#motherboard">Motherboard</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#cpu">CPU</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#cpu_cooler">CPU
                            Cooler</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab"
                           data-bs-target="#graphics_card">Graphics Card</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#ram">RAM</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#storage">Storage</a>
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab" data-bs-target="#psu">PSU</a></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="tab"
                           data-bs-target="#computer_case">Computer Case</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<div id="app">
    <main class="">
        @yield('content')
    </main>
</div>

<footer class="text-center bg-dark text-light">
    <div class="d-flex justify-content-center align-items-center py-3">
        <p class="lead">Copyright System Unit Optimizer, &copy; 2021</p>
    </div>
</footer>

</body>
</html>
