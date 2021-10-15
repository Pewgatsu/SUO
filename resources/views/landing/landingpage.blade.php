@extends('landing.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script src="{{asset('js/scripts.js')}}"></script>

    <body id="page-top">
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-2">System Unit Optimizer</h1>
                <h2 class="masthead-subheading mb-0">Building your dream pc is only a click away!</h2>
                <a class="btn btn-secondary btn-xl rounded-pill mt-5 text-white" href="#" onclick="$('#about_section').animatescroll()">Learn More</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>

    </header>

<!-- Content section 1-->


    <section id="about_section">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{asset('assets/img/landing/new.jpg')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Mission</h1>
                    <p class="lead">The developers aim to provide a platform for both consumers and seller/s, to build system units and sell components to consumers and to east the process
                        of building a system unit and increase the quality of purchases.</p>

                </div>
            </div>
        </div>
    </section>

    <section id="product_section">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{asset('assets/img/landing/new.jpg')}}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Mission</h1>
                    <p class="lead">The developers aim to provide a platform for both consumers and seller/s, to build system units and sell components to consumers and to east the process
                        of building a system unit and increase the quality of purchases.</p>

                </div>
            </div>
        </div>
    </section>






</body>



@endsection
