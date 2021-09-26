@extends('landing.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">


    <body id="page-top">
    <!-- Header-->
    <header class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container px-5">
                <h1 class="masthead-heading mb-0">Insert Title</h1>
                <h2 class="masthead-subheading mb-0">Insert Phrase</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#about_section">Learn More</a>
            </div>
        </div>
        <div class="bg-circle-1 bg-circle"></div>
        <div class="bg-circle-2 bg-circle"></div>
        <div class="bg-circle-3 bg-circle"></div>
        <div class="bg-circle-4 bg-circle"></div>
</header>
<!-- Content section 1-->
    <section id="about_section">

            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/01.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="p-5">
                            <h2 class="display-4">Mission</h2>
                            <p>The developers aim to provide a platform for both consumers and seller/s, to build system units and sell components to consumers.</p>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Content section 2-->

            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/02.jpg" alt="..." /></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <h2 class="display-4">Vision</h2>
                            <p>To ease the process of building a system unit and increase the quality of purchases.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>

<!-- Content section 3-->
    <section id="contact_section">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5"><img class="img-fluid rounded-circle" src="assets/img/03.jpg" alt="..." /></div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Contact</h2>
                        <p>blank</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>



@endsection
