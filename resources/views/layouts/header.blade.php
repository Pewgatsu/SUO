<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="{{route('home')}}">
            <img src="#" alt="" width="30" height="30" class="d-inline-block align-text-top">
            System Unit Optimizer
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#user_profile" class="nav-link">User Profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
        @endauth

        @guest
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
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
