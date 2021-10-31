@section('head')
@endsection

@extends('layouts.master')
@section('content')

    @auth()
        @include('layouts.subheader')
    @endauth

    <div class="container-xl mt-3">
    @if (session('seller'))

            <div class="d-sm-flex my-2 justify-content-between align-items-center">
                <div class="h1">
                    <i class="bi bi-shop"></i>
                    <small> My Store</small>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Add Products
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_motherboard_products">Motherboard</a></li>
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_cpu_products">CPU</a></li>
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_cpu_cooler_products">CPU Cooler</a></li>
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_graphics_card_products">Graphics Card</a></li>
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_ram_products">RAM</a></li>
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_storage_products">Storage</a></li>
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_psu_products">PSU</a></li>
                        <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                               data-bs-target="#add_computer_case_products">Computer Case</a></li>
                    </ul>
                </div>
            </div>

    @endif




        <!-- Background image or store banner -->

        <div class="card m-2" >
            <div class="bg-image"
                 style="background-image: url({{ empty(session('storeInfo.banner')) ? '"'.asset('/images/placeholder.jpg').'"'  : "'".session('storeInfo.banner')."'"  }});
                    height:50vh " >

                <br><br><br><br><br><br>
                <span class="align-middle"> <h1 class="p-1 ps-4 align-middle bg-black text-white">  {{empty(session('storeInfo.storeName')) ? ' ':session('storeInfo.storeName')}}</h1> </span>

                <br><br>
                <form class="d-inline" method="get" action="{{route('editStore')}}">
                    @csrf
                    <button type="submit" name="editStore"  {{session('seller','style=display:none;')}} class="btn custom-btn  float-end ">Edit Profile</button>
                </form>
            </div>
        </div>
        <div class="container-fluid">
            @if(session('storeInfo.is_validated') == 1)
                <div class="card m-2 bg-success" >
                    <h6 class="text-center">Store VALIDATED </h6>
                </div>
            @else
                <div class="card m-2 bg-secondary" >
                    <h6 class="text-center">Store not yet VALIDATED</h6>
                </div>
            @endif

        </div>
        <!-- Map and address and Featured components -->
        <div class="container-xl mt-3 mb-3 p3">
            <div class="row">
                <!-- Left Column-->
                <div class="col-4 ">
                    <div class="card">
                        <div class="card-body">

                             <h6 class="card-title">STORE INFORMATION</h6>
                            <!--Store Owner -->
                            <table class="table table-hover align-middle">
                                <tr>
                                    <td class="fw-bold">Store Owner:</td>
                                </tr>
                                <tr>
                                    <td class="text-center">{{empty(session('storeInfo.ownerFN')) ? ' ':session('storeInfo.ownerFN')}}
                                                            {{empty(session('storeInfo.ownerLN')) ? ' ':session('storeInfo.ownerLN')}}
                                    </td>
                                </tr>
                                <!--Store Description-->
                                <tr>
                                    <td class="fw-bold">Joined at:</td>
                                </tr>
                                <tr>
                                    <td  class="text-center" ><p>{{  empty(session('storeInfo.creation')) ? ' ':date('M d Y', strtotime(session('storeInfo.creation')))}}</p></td>
                                </tr>
                                <!-- address -->
                                <tr>
                                    <td class="fw-bold">Store Address:</td>
                                </tr>
                                <tr>

                                    <td class="text-center"><h5 class="card-title">{{empty(session('storeInfo.storeAddress')) ? ' ':session('storeInfo.storeAddress')}}</h5></td>
                                </tr>
                            </table>

                            <!--Store Description-->
                            <h6 class="fw-bold">Store Description:</h6>
                            <div class="card border-0">
                                <hr>
                                <div class="card-body">
                                    <p>{{empty(session('storeInfo.storeDescription')) ? ' ':session('storeInfo.storeDescription')}}</p>
                                </div>
                                <hr>
                            </div>
                             <!-- Map -->
                                <h6 class="fw-bold">Store Location:</h6>

                            @if(!Session::has('storeInfo.storeLocation') || empty(session('storeInfo.storeLocation')) )
                                <div class="d-flex justify-content-center">
                                    <img class="img-fluid" src="{{asset('/images/Store_Placeholder/no_location.png')}}" >
                                </div>
                            @else
                                <div class="map-responsive">
                                    <iframe src="{{ session('storeInfo.storeLocation') }}" width="370" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Featured components -->
                <div class="col-8 ">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">FEATURED PRODUCTS</h6>
                            <!--MOTHERBOARD -->
                            <div class="row">
                                <div class="col mt-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.motherboards.0.image_path')) ?
                                                            asset('/images/Store_Placeholder/motherboard_placeholder.png'):
                                                            asset('images/components/motherboards/'.session('productsArray.motherboards.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center" >
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2 ">
                                                    <a href="{{ empty(session('storeInfo.featured_motherboards')) ? '#' :route('product.motherboards.info', ['id' =>session('storeInfo.featured_motherboards') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.motherboards.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">MOTHERBOARD</a>

                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.motherboards.0.price')==0)
                                                    ---
                                                @else
                                                    ₱ {{ number_format(session('productsArray.motherboards.0.price'),2) }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <!--CPU -->
                                <div class="col mt-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.cpus.0.image_path')) ?
                                                            asset('/images/Store_Placeholder/cpu_placeholder.png'):
                                                            asset('images/components/cpus/'.session('productsArray.cpus.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2">
                                                    <a href="{{ empty(session('storeInfo.featured_cpus')) ? '#' :route('product.cpus.info', ['id' =>session('storeInfo.featured_cpus') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.cpus.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">CPU</a>
                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.cpus.0.price')==0)
                                                    ---
                                                @else
                                                    ₱ {{ number_format(session('productsArray.cpus.0.price'),2) }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-2"> <!--CPU COOLER -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.cpu_coolers.0.image_path')) ?
                                                        asset('/images/Store_Placeholder/cpu_cooler_placeholder.png'):
                                                        asset('images/components/cpu_coolers/'.session('productsArray.cpu_coolers.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2">
                                                    <a href="{{ empty(session('storeInfo.featured_cpu_coolers')) ? '#' :route('product.cpu_coolers.info', ['id' =>session('storeInfo.featured_cpu_coolers') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.cpu_coolers.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">CPU COOLER</a>
                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.cpu_coolers.0.price')==0)
                                                    ---
                                                @else
                                                    ₱ {{ number_format(session('productsArray.cpu_coolers.0.price'),2) }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-2"> <!--GRAPHICS CARD -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.graphics_cards.0.image_path')) ?
                                                    asset('/images/Store_Placeholder/graphics_card_placeholder.png'):
                                                    asset('images/components/graphics_cards/'.session('productsArray.graphics_cards.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                                </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2">
                                                    <a href="{{ empty(session('storeInfo.featured_graphics_cards')) ? '#' :route('product.graphics_cards.info', ['id' =>session('storeInfo.featured_graphics_cards') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.graphics_cards.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">GRAPHICS CARD</a>
                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.graphics_cards.0.price')==0)
                                                    ---
                                                @else
                                                    ₱ {{ number_format(session('productsArray.graphics_cards.0.price'),2) }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-2"> <!-- RAM -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.rams.0.image_path')) ?
                                                        asset('/images/Store_Placeholder/ram_placeholder.png'):
                                                        asset('images/components/rams/'.session('productsArray.rams.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2">
                                                    <a href="{{ empty(session('storeInfo.featured_rams')) ? '#' :route('product.rams.info', ['id' =>session('storeInfo.featured_rams') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.rams.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">RAM</a>
                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.rams.0.price')==0)
                                                    ---
                                                @else
                                                    ₱ {{ number_format(session('productsArray.rams.0.price'),2) }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-2">
                                    <div class="card"> <!--STORAGES -->
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.storages.0.image_path')) ?
                                                           asset('/images/Store_Placeholder/storage_placeholder.png'):
                                                           asset('images/components/storages/'.session('productsArray.storages.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2">
                                                    <a href="{{ empty(session('storeInfo.featured_storages')) ? '#' :route('product.storages.info', ['id' =>session('storeInfo.featured_storages') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.storages.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">STORAGES</a>
                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.storages.0.price')==0)
                                                    ---
                                                @else
                                                    ₱ {{ number_format(session('productsArray.storages.0.price'),2) }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-2">
                                    <div class="card"> <!--PSU -->
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.psus.0.image_path')) ?
                                                        asset('/images/Store_Placeholder/psu_placeholder.png'):
                                                        asset('images/components/psus/'.session('productsArray.psus.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2">
                                                    <a href="{{ empty(session('storeInfo.featured_psus')) ? '#' :route('product.psus.info', ['id' =>session('storeInfo.featured_psus') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.psus.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">PSU</a>
                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.psus.0.price')==0)
                                                    ---
                                                @else
                                                    ₱ {{ number_format(session('productsArray.psus.0.price'),2) }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-2">
                                    <div class="card"> <!-- COMPUTER CASE -->
                                        <div class="card-body">
                                            <div class="card-img-actions">
                                                <img src="{{empty(session('productsArray.computer_cases.0.image_path')) ?
                                                            asset('/images/Store_Placeholder/computer_case_placeholder.png'):
                                                            asset('images/components/computer_cases/'.session('productsArray.computer_cases.0.image_path'))}}"
                                                     class="card-img img-fluid" width="96" height="350" alt="">
                                            </div>
                                        </div>
                                        <div class="card-body bg-light text-center">
                                            <div class="mb-2">
                                                <h6 class="font-weight-semibold mb-2">
                                                    <a href="{{ empty(session('storeInfo.featured_computer_cases')) ? '#' :route('product.computer_cases.info', ['id' =>session('storeInfo.featured_computer_cases') ])}}" class="text-default mb-2" data-abc="true">{{session('productsArray.computer_cases.0.name')}}</a> </h6>
                                                    <a class="text-muted" data-abc="true">COMPUTER CASE</a>
                                            </div>
                                            <h4 class="mb-0 font-weight-semibold">
                                                @if(session('productsArray.computer_cases.0.price')==0)
                                                    ---
                                                @else
                                                    {{ number_format(session('productsArray.computer_cases.0.price'),2) }} ₱
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- contact us -->
        <div class="container-xl mt-3 mb-3 p3 bg-black text-white">
            <div class="row">
                <div class="col-md-2">
                    <br><br>
                    <h4 class="text-white align-middle">Contact us @:</h4>
                </div>
                <div class="col-md-8 align-middle">
                    <br><br>
                    <h3 class="text-white text-center">{{empty(session('storeInfo.contact')) ? '----':session('storeInfo.contact')}}</h3>
                                <h6 class="text-white text-center">or</h6>
                    <h3 class="text-white text-center"> {{empty(session('storeInfo.email')) ? '------':session('storeInfo.email')}}</h3>

                </div>
            </div>
            <br><br>
        </div>
        <br>

    </div>

    <!-- Modals -->
    @if(count($errors) > 0)
        <script>
            $(document).ready(function () {
                @if($errors->has('mobo_*'))
                $('#add_motherboard_products').modal('show');
                @elseif($errors->has('cpu_cooler_*'))
                $('#add_cpu_cooler_products').modal('show');
                @elseif($errors->has('cpu_*'))
                $('#add_cpu_products').modal('show');
                @elseif($errors->has('graphics_card_*'))
                $('#add_graphics_card_products').modal('show');
                @elseif($errors->has('ram_*'))
                $('#add_ram_products').modal('show');
                @elseif($errors->has('storage_*'))
                $('#add_storage_products').modal('show');
                @elseif($errors->has('psu_*'))
                $('#add_psu_products').modal('show');
                @elseif($errors->has('case_*'))
                $('#add_computer_case_products').modal('show');
                @endif
            });
        </script>
    @endif

    @if(session()->has('alert_message'))
        <script>

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-custom-pos",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
            };
            toastr.success("{{ \Illuminate\Support\Facades\Session::get('alert_message') }}")

        </script>
    @endif


    @if (session('seller'))
    <!-- Add Motherboard Product -->
    <x-product.motherboard mode="add" :motherboardComponents="$motherboard_components" />

    <!-- Add CPU Product -->
    <x-product.cpu mode="add" :cpuComponents="$cpu_components" />

    <!-- Add CPU Cooler Product -->
    <x-product.cpu-cooler mode="add" :cpuCoolerComponents="$cpu_cooler_components" />

    <!-- Add Graphics Card Product -->
    <x-product.graphics-card mode="add" :graphicsCardComponents="$graphics_card_components" />

    <!-- Add RAM Product -->
    <x-product.ram mode="add" :ramComponents="$ram_components" />

    <!-- Add Storage Product -->
    <x-product.storage mode="add" :storageComponents="$storage_components" />

    <!-- Add PSU Product -->
    <x-product.psu mode="add" :psuComponents="$psu_components" />

    <!-- Add Computer Case Product -->
    <x-product.computer-case mode="add" :computerCaseComponents="$computer_case_components" />
    @endif
@endsection
