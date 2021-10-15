@section('head')
@endsection

@extends('layouts.master')
@section('content')
    @include('layouts.subheader')


    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            @if($component_infos->type == 'Motherboard')
                <div class="h1">
                    <i class="fas fa-microchip"></i>
                    <small> Motherboard</small>
                </div>
            @elseif($component_infos->type == 'CPU')
                <div class="h1">
                    <i class="bi bi-cpu-fill"></i>
                    <small> CPU</small>
                </div>
            @elseif($component_infos->type =='CPU Cooler' )
                <div class="h1">
                    <i class="far fa-snowflake"></i>
                    <small> CPU Cooler</small>
                </div>
            @elseif($component_infos->type =='Graphics Card' )
                <div class="h1">
                    <i class="fas fa-tv"></i>
                    <small> Graphics Card</small>
                </div>
            @elseif($component_infos->type =='RAM' )
                <div class="h1">
                    <i class="fas fa-memory"></i>
                    <small> RAM</small>
                </div>
            @elseif($component_infos->type =='Storage' )
                <div class="h1">
                    <i class="fas fa-hdd"></i>
                    <small> Storage</small>
                </div>
            @elseif($component_infos->type == 'PSU' )
                <div class="h1">
                    <i class="fas fa-plug"></i>
                    <small> PSU</small>
                </div>
            @elseif($component_infos->type == 'Computer Case' )
                <div class="h1">
                    <i class="fas fa-suitcase"></i>
                    <small> Computer Case</small>
                </div>
            @endif
        </div>
    </div>

    <div class="container-xl mt-3">
        <div class="container-xl mt-3 mb-3 p3">
            <div class="row ">
                <div class="col-5">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">GENERAL COMPONENT INFO</h6>

                            <div class="card-img-actions">
                                <img src="{{empty($component_infos->image_path)?
                                        asset('/images/Store_Placeholder/motherboard_placeholder.png') :
                                        asset($profile_path.$component_infos->image_path)}}"
                                     class="card-img img-fluid"  height="650" alt="">
                            </div>
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td><h6>Name</h6></td>
                                    <td> <p class="float-end fw-bold"> {{$component_infos->name}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Manufacturer</h6></td>
                                    <td> <p class="float-end"> {{empty($component_infos->manufacturer)?
                                                                 '--':$component_infos->manufacturer}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Series</h6></td>
                                    <td> <p class="float-end"> {{empty($component_infos->series)?
                                                                 '--':$component_infos->series}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Model</h6></td>
                                    <td> <p class="float-end"> {{empty($component_infos->model)?
                                                                 '--':$component_infos->model}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Color</h6></td>
                                    <td> <p class="float-end"> {{empty($component_infos->color)?
                                                                 '--':$component_infos->color}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Length</h6></td>
                                    <td> <p class="float-end"> {{empty($component_infos->length)?
                                                                 '--':$component_infos->length.' mm' }}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Width</h6></td>
                                    <td> <p class="float-end"> {{empty($component_infos->width)?
                                                                 '--':$component_infos->width.' mm'}}</p></td>
                                </tr>
                                <tr>
                                    <td><h6>Height</h6></td>
                                    <td> <p class="float-end"> {{empty($component_infos->height)?
                                                                 '--':$component_infos->height.' mm'}}</p></td>
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
                                                @if($product_info == 0 || $product_info == 1)
                                                    @if($key == 'raid_support' || $key == 'power_supply_shroud' ||
                                                          $key == 'ecc_support' || $key == 'wireless_support'   ||
                                                           $key == 'smt_support' || $key == 'ecc' ||
                                                           $key == 'registered' || $key == 'heat_spreader' )
                                                        {{$product_info == 1? 'Yes':'No'}}
                                                    @elseif($key == 'power_supply' || $key == 'integrated_graphics' ||
                                                            $key == 'water_cooled_support'
                                                            )
                                                        {{$product_info == 1? 'Supported':'None'}}
                                                    @else
                                                        {{$product_info}}
                                                    @endif
                                                @else
                                                    @if($key == 'max_mem_support' || $key == 'gpu_memory' ||
                                                            $key == 'memory_capacity' || $key == 'storage_capacity')
                                                        {{$product_info." GB"}}
                                                    @elseif($key == 'base_clock' ||$key == 'boost_clock' || $key == 'memory_speed' )
                                                        {{$component_infos->type == 'CPU'? $product_info." GHz" : $product_info." MHz" }}
                                                    @elseif($key == 'tdp' || $key == 'wattage')
                                                        {{$product_info." w"}}
                                                    @elseif($key == 'cooler_clearance' || $key == 'graphics_clearance'||
                                                            $key == 'psu_clearance')
                                                        {{$product_info." mm"}}
                                                    @elseif($key == 'fan_speed' )
                                                        {{$product_info." rpm"}}
                                                    @elseif($key == 'noise_level' )
                                                        {{$product_info." db"}}
                                                    @elseif($key == 'memory_voltage' )
                                                        {{$product_info." V"}}
                                                    @elseif($key == 'storage_cache' )
                                                        {{$product_info." MB"}}
                                                    @else
                                                        {{$product_info}}
                                                    @endif
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
