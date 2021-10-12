@section('head')
@endsection

@extends('layouts.master')
@section('content')
    @include('layouts.subheader')


    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            @if($product_infos->type == 'Motherboard')
                <div class="h1">
                    <i class="fas fa-microchip"></i>
                    <small> Motherboard</small>
                </div>
            @elseif($product_infos->type == 'CPU')
                <div class="h1">
                    <i class="bi bi-cpu-fill"></i>
                    <small> CPU</small>
                </div>
            @elseif($product_infos->type =='CPU Cooler' )
                <div class="h1">
                    <i class="far fa-snowflake"></i>
                    <small> CPU Cooler</small>
                </div>
            @elseif($product_infos->type =='Graphics Card' )
                <div class="h1">
                    <i class="fas fa-tv"></i>
                    <small> Graphics Card</small>
                </div>
            @elseif($product_infos->type =='RAM' )
                <div class="h1">
                    <i class="fas fa-memory"></i>
                    <small> RAM</small>
                </div>
            @elseif($product_infos->type =='Storage' )
                <div class="h1">
                    <i class="fas fa-hdd"></i>
                    <small> Storage</small>
                </div>
            @elseif($product_infos->type == 'PSU' )
                <div class="h1">
                    <i class="fas fa-plug"></i>
                    <small> PSU</small>
                </div>
            @elseif($product_infos->type == 'Computer Case' )
                <div class="h1">
                    <i class="fas fa-suitcase"></i>
                    <small> Computer Case</small>
                </div>
            @endif
        </div>
    </div>
<div class="container-xl mt-3">

{{--STORE INFORMATION    --}}
    <div class="card m-2" >
        <div class="bg-image" style="background-image: url({{asset(empty($product_infos->store->banner) ? '/images/placeholder.jpg': asset('/images/Store_Banner/'.$product_infos->store->banner) ) }}) ;
            height:50vh;" >


            <br><br><br><br><br><br>
            <span class="align-middle"> <h1 class="p-1 ps-4 align-middle bg-black text-white"
                                        @if (!empty($product_infos->store->id))
                                        onclick="window.location='{{ route('viewStore',$product_infos->store->id) }}'"
                                        @endif
                                       >

                    {{empty($product_infos->store->name) ? ' ':$product_infos->store->name}}</h1> </span>

            <br><br>

        </div>


    </div>


    <div class="container-xl mt-3 mb-3 p3">
        <div class="row ">
            <div class="col-5">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">GENERAL COMPONENT INFO</h6>

                        <div class="card-img-actions">
                            <img src="{{empty($product_infos->component->image_path)?
                                        asset('/images/Store_Placeholder/motherboard_placeholder.png') :
                                        asset($profile_path.$product_infos->component->image_path)}}"
                                 class="card-img img-fluid"  height="650" alt="">
                        </div>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td><h6>Name</h6></td>
                                    <td> <p class="float-end fw-bold"> {{$product_infos->component->name}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Price</h6></td>
                                    <td> <p class="float-end fw-bold">₱{{ number_format($product_infos->price,2) }}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Manufacturer</h6></td>
                                    <td> <p class="float-end"> {{empty($product_infos->component->manufacturer)?
                                                                 '--':$product_infos->component->manufacturer}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Series</h6></td>
                                    <td> <p class="float-end"> {{empty($product_infos->component->series)?
                                                                 '--':$product_infos->component->series}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Model</h6></td>
                                    <td> <p class="float-end"> {{empty($product_infos->component->model)?
                                                                 '--':$product_infos->component->model}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Color</h6></td>
                                    <td> <p class="float-end"> {{empty($product_infos->component->color)?
                                                                 '--':$product_infos->component->color}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Length</h6></td>
                                    <td> <p class="float-end"> {{empty($product_infos->component->length)?
                                                                 '--':$product_infos->component->length.'"' }}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Width</h6></td>
                                    <td> <p class="float-end"> {{empty($product_infos->component->width)?
                                                                 '--':$product_infos->component->width.'"'}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Height</h6></td>
                                    <td> <p class="float-end"> {{empty($product_infos->component->height)?
                                                                 '--':$product_infos->component->height.'"'}}</p></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

{{--SPECIFIC COMPONENT INFO--}}
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">SPECIFIC COMPONENT INFO</h6>
                        <table class="table table-hover">
                            <tbody>
                            @foreach($specific_details->getAttributes() as $key=>$product_info)
                                <tr>
                                    @if($key  == 'created_at' || $key == 'updated_at' ||$key =='component_id' )
                                    @else
                                        <td><h6>{{ucwords(str_replace('_',' ' ,$key))}}</h6></td>
                                        <td>
                                            @if($product_info == NULL || $product_info == 0)
                                                @if($key == 'raid_support' || $key == 'power_supply_shroud' ||
                                                      $key == 'ecc_support'
                                                  )
                                                    {{$product_info == 1? 'Yes':'No'}}
                                                @elseif($key == 'power_supply' || $key == 'integrated_graphics' ||
                                                        $key == 'water_cooled_support'
                                                        )
                                                    {{$product_info == 1? 'Supported':'None'}}
                                                @else
                                                    {{$product_info}}
                                                @endif
                                            @else
                                                {{$product_info}}
                                            @endif



                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection