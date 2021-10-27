<div>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container container-fluid px-5">

        @guest
        <a class="navbar-brand" href="{{route('home')}}">
            System Unit Optimizer
        </a>
        @endguest

        @if(Auth::check())
            @if(auth()->user()->account_type == 'Admin')
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">
{{--                    <img src="#" alt="" width="30" height="30" class="d-inline-block align-text-top">--}}
                    System Unit Optimizer
                </a>
            @elseif(auth()->user()->account_type == 'Seller')
                    <a class="navbar-brand" href="{{route('myStore')}}">
{{--                        <img src="#" alt="" width="30" height="30" class="d-inline-block align-text-top">--}}
                        System Unit Optimizer
                    </a>
            @elseif(auth()->user()->account_type == 'Customer')
                    <a class="navbar-brand" href="{{route('builder')}}">
{{--                        <img src="#" alt="" width="30" height="30" class="d-inline-block align-text-top">--}}
                        System Unit Optimizer
                    </a>
            @endif
        @endif

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth
                <div class="collapse navbar-collapse" id="navmenu">
                    <li class="nav-item dropdown navbar-nav ms-auto">
                        <button class="btn fas fa-chevron-down text-decoration-none text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="box-shadow: none"
                        id="navbar_dropdown_menu">
                            <small class="me-1" style="font-family: Roboto">{{auth()->user()->firstname}}</small>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="navbar_dropdown_menu">
                            <li class="dropdown-header">Manage Account</li>
                            <li><a class="dropdown-item" href="{{route('user.profile')}}"><small>Profile</small></a></li>
                            @if(auth()->user()->account_type == 'Seller')
                                <li><a class="dropdown-item" href="{{route('seller.validate')}}"><small>Validate Account</small></a></li>
                            @endif
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('user.logout')}}"><small>Logout</small></a></li>
                        </ul>
                    </li>

                </div>

        @endauth

        @guest
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutus') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        @endguest
    </div>
</nav>

</div>


