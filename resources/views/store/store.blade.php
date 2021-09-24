@section('head')

@endsection

@extends('layouts.master')
@section('content')
    <div class="container-xl mt-3">

        'Contact us'->number ->email
        'image upload'->editStore.blade
        'image display' -> store.blade components and banner
        'linking of the components'
        'old value or hint in the editStore.blade'->components
        <!-- Background image or store banner -->
        <div class="bg-image" style="background-image: url({{asset( session('banner','/images/placeholder.jpg')) }}) ;
            height:50vh;" >

            <br><br><br><br><br><br><br>
            <span class="align-middle"> <h1 class="p-5 align-middle"> {{session('storeName','LOREM IPSUM DOLOR')}}</h1> </span>

            <form class="d-inline" method="get" action="{{route('editStore')}}">
                @csrf
                <button type="submit" name="editStore"  {{session('seller','style=display:none;')}} class="btn btn-info btn-block float-end">Edit Profile</button>
            </form>
        </div>

        <!-- Map and address and Featured components -->
        <div class="container-xl mt-3 mb-3 p3">
            <div class="row">
                <!-- Left Column-->
                <div class="col-4 "><h6>STORE INFORMATIONS</h6>
                    <!-- Map -->
                    <div class="map-responsive">
                        <iframe src="{{session('storeLocation','LOREM IPSUM DOLOR')}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <!-- address -->
                    <table class="table table-hover align-middle">
                        <tr>
                            <td colspan="2" class="text-center"><h3>{{session('storeAddress','LOREM IPSUM DOLOR')}}</h3></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center" ><p>{{session('storeDescription','LOREM IPSUM DOLOR')}}</p></td>
                        </tr>
                    </table>
                </div>

                <!-- Featured components -->
                <div class="col-8 "><h6>FEATURED PRODUCTS</h6>

                    <div class="row">   <!--MOTHERBOARD -->
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-body"> <!-- dd(session('productsArray.motherboards.0.price') ); -->
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.motherboards.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">MOTHERBOARD</a>
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
                        <div class="col mt-2"> <!--CPU -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.cpus.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">CPU</a>
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
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.cpu_coolers.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">CPU COOLER</a>
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
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.graphics_cards.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">GRAPHICS CARD</a>
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
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.rams.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">RAM</a>
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
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.storages.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">STORAGES</a>
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
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.psus.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">PSU</a>
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
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">{{session('productsArray.computer_cases.0.name')}}</a> </h6> <a href="#" class="text-muted" data-abc="true">COMPUTER CASE</a>
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

        <div class="container-xl mt-3 mb-3 p3 bg-black">
            <h4 class="text-white">Contact us @:</h4>
            <br><br><br>
        </div>
        <br>

    </div>

@endsection
