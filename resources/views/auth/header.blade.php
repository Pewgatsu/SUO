<!-- Navigation-->
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="stylesheet" href="{{asset('css/login_nav.css')}}">
<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">

        <div class="container col-1">
            <a href="{{route('home')}}"class="text-decoration-none text-white"><i class="fas fa-chevron-left"></i></a>
        </div>

        <div class="container justify-content-center">
            <a class="navbar-brand nav_title" href="{{route('home')}}" onclick="$('#page-top').animatescroll()">System Unit Optimizer</a>
        </div>

</nav>

