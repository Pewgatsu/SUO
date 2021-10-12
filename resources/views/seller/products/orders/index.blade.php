@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                @if(isset($motherboard_products))
                    <i class="fas fa-microchip"></i>
                @elseif(isset($cpu_products))
                    <i class="bi bi-cpu-fill"></i>
                @elseif(isset($cpu_cooler_products))
                    <i class="far fa-snowflake"></i>
                @elseif(isset($graphics_card_products))
                    <i class="fas fa-tv"></i>
                @elseif(isset($ram_products))
                    <i class="fas fa-memory"></i>
                @elseif(isset($storage_products))
                    <i class="fas fa-hdd"></i>
                @elseif(isset($psu_products))
                    <i class="fas fa-plug"></i>
                @elseif(isset($computer_case_products))
                    <i class="fas fa-suitcase"></i>
                @endif
                <small> {{ $component->name }}</small>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <!-- Motherboard Table -->
                    @if(isset($motherboard_products))
                        @if($motherboard_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($motherboard_products as $motherboard_product)
                                        <tr>
                                            <td>
                                                @if($motherboard_product->status != 'Available')
                                                    {{$motherboard_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $motherboard_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($motherboard_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($motherboard_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_motherboard_product_{{ $motherboard_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($motherboard_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($motherboard_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($motherboard_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($motherboard_product->status == 'Available')

                                            <!-- Delete Motherboard Product -->
                                            <x-order.delete-product type="Motherboard" :component="$component"
                                                                    :product="$motherboard_product"/>

                                        @elseif($motherboard_product->status == 'Ordered')

                                        @elseif($motherboard_product->status == 'Confirmed')

                                        @elseif($motherboard_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No Motherboard Products</p>
                        @endif
                    @elseif(isset($cpu_products))
                        @if($cpu_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpu_products as $cpu_product)
                                        <tr>
                                            <td>
                                                @if($cpu_product->status != 'Available')
                                                    {{$cpu_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $cpu_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cpu_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($cpu_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <!-- Delete CPU Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_cpu_product_{{ $cpu_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($cpu_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($cpu_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($cpu_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($cpu_product->status == 'Available')

                                            <!-- Delete CPU Product -->
                                            <x-order.delete-product type="CPU" :component="$component"
                                                                    :product="$cpu_product"/>

                                        @elseif($cpu_product->status == 'Ordered')

                                        @elseif($cpu_product->status == 'Confirmed')

                                        @elseif($cpu_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No CPU Products</p>
                        @endif
                    @elseif(isset($cpu_cooler_products))
                        @if($cpu_cooler_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpu_cooler_products as $cpu_cooler_product)
                                        <tr>
                                            <td>
                                                @if($cpu_cooler_product->status != 'Available')
                                                    {{$cpu_cooler_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $cpu_cooler_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cpu_cooler_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($cpu_cooler_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <!-- Delete CPU Cooler Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_cpu_cooler_product_{{ $cpu_cooler_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($cpu_cooler_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($cpu_cooler_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($cpu_cooler_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($cpu_cooler_product->status == 'Available')

                                            <!-- Delete CPU Cooler Product -->
                                            <x-order.delete-product type="CPU Cooler" :component="$component"
                                                                    :product="$cpu_cooler_product"/>

                                        @elseif($cpu_cooler_product->status == 'Ordered')

                                        @elseif($cpu_cooler_product->status == 'Confirmed')

                                        @elseif($cpu_cooler_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No CPU Cooler Products</p>
                        @endif
                    @elseif(isset($graphics_card_products))
                        @if($graphics_card_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($graphics_card_products as $graphics_card_product)
                                        <tr>
                                            <td>
                                                @if($graphics_card_product->status != 'Available')
                                                    {{$graphics_card_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $graphics_card_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($graphics_card_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($graphics_card_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <!-- Delete Graphics Card Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_graphics_card_product_{{ $graphics_card_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($graphics_card_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($graphics_card_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($graphics_card_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($graphics_card_product->status == 'Available')

                                            <!-- Delete Graphics Card Product -->
                                            <x-order.delete-product type="Graphics Card" :component="$component"
                                                                    :product="$graphics_card_product"/>

                                        @elseif($graphics_card_product->status == 'Ordered')

                                        @elseif($graphics_card_product->status == 'Confirmed')

                                        @elseif($graphics_card_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No Graphics Card Products</p>
                        @endif
                    @elseif(isset($ram_products))
                        @if($ram_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ram_products as $ram_product)
                                        <tr>
                                            <td>
                                                @if($ram_product->status != 'Available')
                                                    {{$ram_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $ram_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ram_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($ram_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <!-- Delete RAM Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_ram_product_{{ $ram_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($ram_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($ram_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($ram_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($ram_product->status == 'Available')

                                            <!-- Delete RAM Product -->
                                            <x-order.delete-product type="RAM" :component="$component"
                                                                    :product="$ram_product"/>

                                        @elseif($ram_product->status == 'Ordered')

                                        @elseif($ram_product->status == 'Confirmed')

                                        @elseif($ram_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No RAM Products</p>
                        @endif
                    @elseif(isset($storage_products))
                        @if($storage_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($storage_products as $storage_product)
                                        <tr>
                                            <td>
                                                @if($storage_product->status != 'Available')
                                                    {{$storage_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $storage_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($storage_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($storage_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <!-- Delete Storage Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_storage_product_{{ $storage_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($storage_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($storage_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($storage_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($storage_product->status == 'Available')

                                            <!-- Delete Storage Product -->
                                            <x-order.delete-product type="Storage" :component="$component"
                                                                    :product="$storage_product"/>

                                        @elseif($storage_product->status == 'Ordered')

                                        @elseif($storage_product->status == 'Confirmed')

                                        @elseif($storage_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No Storage Products</p>
                        @endif
                    @elseif(isset($psu_products))
                        @if($psu_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($psu_products as $psu_product)
                                        <tr>
                                            <td>
                                                @if($psu_product->status != 'Available')
                                                    {{$psu_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $psu_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($psu_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($psu_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <!-- Delete PSU Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_psu_product_{{ $psu_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($psu_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($psu_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($psu_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($psu_product->status == 'Available')

                                            <!-- Delete PSU Product -->
                                            <x-order.delete-product type="PSU" :component="$component"
                                                                    :product="$psu_product"/>

                                        @elseif($psu_product->status == 'Ordered')

                                        @elseif($psu_product->status == 'Confirmed')

                                        @elseif($psu_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No PSU Products</p>
                        @endif
                    @elseif(isset($computer_case_products))
                        @if($computer_case_products->count())
                            <div class="table-responsive text-center">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Product Status</th>
                                        <th>Status Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($computer_case_products as $computer_case_product)
                                        <tr>
                                            <td>
                                                @if($computer_case_product->status != 'Available')
                                                    {{$computer_case_product->getCustomer()}}
                                                @endif
                                            </td>
                                            <td>{{ $computer_case_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($computer_case_product->status_date)->diffForHumans() }}</td>
                                            <td>
                                                @if($computer_case_product->status == 'Available')
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <!-- Delete Computer Case Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_computer_case_product_{{ $computer_case_product->id }}">
                                                        Delete
                                                    </button>
                                                @elseif($computer_case_product->status == 'Ordered')
                                                    <button type="button" class="btn btn-secondary">Accept</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($computer_case_product->status == 'Confirmed')
                                                    <button type="button" class="btn btn-success">Done</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                @elseif($computer_case_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($computer_case_product->status == 'Available')

                                            <!-- Delete Computer Case Product -->
                                            <x-order.delete-product type="Computer Case" :component="$component"
                                                                    :product="$computer_case_product"/>

                                        @elseif($computer_case_product->status == 'Ordered')

                                        @elseif($computer_case_product->status == 'Confirmed')

                                        @elseif($computer_case_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="lead text-center">No Computer Case Products</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
