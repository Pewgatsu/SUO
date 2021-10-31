<!-- Navigation-->

<nav class="navbar navbar-custom navbar-expand-lg  fixed-top">
    <div class="container px-5">
        <a class="navbar-brand" href="{{route('home')}}" onclick="$('#page-top').animatescroll()">System Unit Optimizer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        @auth
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">User Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Log Out</a></li>

                </ul>
            </div>
        @endauth

        @guest
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('register')}}">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Log In</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="$('#about_section').animatescroll()">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" onclick="$('#contact_section').animatescroll()">Contact</a></li>
                </ul>
            </div>
        @endguest

    </div>



</nav>
