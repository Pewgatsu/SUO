@extends('layouts.master')
@section('content')
    @include('layouts.dashboardheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                @if(isset($motherboard_products))
                    <i class="fas fa-microchip"></i>
                    <small> Motherboard</small>
                @elseif(isset($cpu_products))
                    <i class="bi bi-cpu-fill"></i>
                    <small> CPU</small>
                @elseif(isset($cpu_cooler_products))
                    <i class="far fa-snowflake"></i>
                    <small> CPU Cooler</small>
                @elseif(isset($graphics_card_products))
                    <i class="fas fa-tv"></i>
                    <small> Graphics Card</small>
                @elseif(isset($ram_products))
                    <i class="fas fa-memory"></i>
                    <small> RAM</small>
                @elseif(isset($storage_products))
                    <i class="fas fa-hdd"></i>
                    <small> Storage</small>
                @elseif(isset($psu_products))
                    <i class="fas fa-plug"></i>
                    <small> PSU</small>
                @elseif(isset($computer_case_products))
                    <i class="fas fa-suitcase"></i>
                    <small> Computer Case</small>
                @endif
            </div>
        </div>
    </div>

    <!-- Motherboard Table -->
    <div class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if(isset($motherboard_products))
                        @if($motherboard_products->count())
                            <div class="table-responsive text-center">
                                <table id="motherboard_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($motherboard_table as $motherboard_item)
                                        <tr>
                                            <td>{{ $motherboard_item['name'] }}</td>
                                            <td>{{ $motherboard_item['date_added']->diffForHumans() }}</td>
                                            <td>{{ $motherboard_item['quantity'] }}</td>
                                            <td>{{ $motherboard_item['sold'] }}</td>
                                            <td>&#8369; {{ $motherboard_item['unit_price'] }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No Motherboard Products</p>
                        @endif
                    @elseif(isset($cpu_products))
                        @if($cpu_products->count())
                        @else
                            <p class="lead text-center">No CPU Products</p>
                        @endif
                    @elseif(isset($cpu_cooler_products))
                        @if($cpu_cooler_products->count())
                        @else
                            <p class="lead text-center">No CPU Cooler Products</p>
                        @endif
                    @elseif(isset($graphics_card_products))
                        @if($graphics_card_products->count())
                        @else
                            <p class="lead text-center">No Graphics Card Products</p>
                        @endif
                    @elseif(isset($ram_products))
                        @if($ram_products->count())
                        @else
                            <p class="lead text-center">No RAM Products</p>
                        @endif
                    @elseif(isset($storage_products))
                        @if($storage_products->count())
                        @else
                            <p class="lead text-center">No Storage Products</p>
                        @endif
                    @elseif(isset($psu_products))
                        @if($psu_products->count())
                        @else
                            <p class="lead text-center">No PSU Products</p>
                        @endif
                    @elseif(isset($computer_case_products))
                        @if($computer_case_products->count())
                        @else
                            <p class="lead text-center">No Computer Case Products</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
