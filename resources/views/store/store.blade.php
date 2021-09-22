@section('head')

@endsection

@extends('layouts.master')
@section('content')
    <div class="container-xl mt-3">

        'featured_motherboards'
        'featured_cpus'
        'featured_cpu_coolers'
        'featured_graphics_cards'
        'featured_rams'
        'featured_storages'
        'featured_psus'
        'featured_computer_cases'

        <div class="bg-image" style="background-image: url({{asset( session('banner','/images/placeholder.jpg')) }}) ;
            height:50vh;" >

            <br><br><br><br><br><br><br>
            <span class="align-middle"> <h1 class="p-5 align-middle"> {{session('storeName','LOREM IPSUM DOLOR')}}</h1> </span>

            <form class="d-inline" method="get" action="{{route('editStore')}}">
                @csrf
                <button type="submit" name="editStore"  {{session('seller','style=display:none;')}} class="btn btn-info btn-block float-end">Edit Profile</button>
            </form>
        </div>

        <div class="container-xl mt-3 mb-3 p3">
            <div class="row">

                <div class="col-4 ">INFORMATION

                    <div class="map-responsive">
                        <iframe src="{{session('storeAddress','LOREM IPSUM DOLOR')}}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <table class="table table-hover align-middle">
                        <tr>
                            <td>Location</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{session('storeDescription','LOREM IPSUM DOLOR')}}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-8 ">FEATURED PRODUCTS

                    <div class="row">   <!--MOTHERBOARD -->
                        <div class="col mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                                </div>
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">MOTHERBOARD</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">Price</h3>
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
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">CPU</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">PRICE</h3>
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
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">CPU COOLER</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">PRICE</h3>
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
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">GRAPHICS CARD</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">PRICE</h3>
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
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">RAM</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">PRICE</h3>
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
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">STORAGES</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">PRICE</h3>
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
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">PSU</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">PRICE</h3>
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
                                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">COMPUTER CASE</a>
                                    </div>
                                    <h3 class="mb-0 font-weight-semibold">PRICE</h3>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
        <br>

    </div>

@endsection
