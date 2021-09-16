@section('head')

@endsection

@extends('layouts.master')
@section('content')
    <div class="container-xl mt-3">

        <div class="bg-image" style="background-image: url({{asset("/images/placeholder.jpg")}});
            height:50vh;" >

            <br><br><br><br><br><br><br>
            <span class="align-middle"> <h1 class="p-5 align-middle"> FEU INSTITUTE OF TECHNOLOGY</h1> </span>

            <form class="d-inline">
                <button type="submit" name="editStore" {{session('seller','style=display:none;')}} class="btn btn-info btn-block float-end">Edit Profile</button>
            </form>
        </div>

        <div class="container-xl mt-3 mb-3 p3">
            <div class="row">

                <div class="col-4 ">INFORMATION
                    <div class="map-responsive">

                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.9114666827854!2d120.9864360146647!3d14.60411898980019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9f8b14eb259%3A0xad4d12caac9a068e!2sFEU%20Institute%20of%20Technology!5e0!3m2!1sen!2sph!4v1631811317034!5m2!1sen!2sph" width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

                    </div>
                    <table class="table table-hover align-middle">
                        <tr>
                            <td>Location</td>
                            <td>This is the Location</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>This is the Description</td>
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
