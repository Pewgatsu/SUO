@extends('layouts.master')
@section('title','Orders')
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

    <!-- Modals -->
    @if(count($errors) > 0)
        <script>
            $(document).ready(function () {
                $('#{{ session('modal_id') }}').modal('show');
            });
        </script>
    @endif

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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($motherboard_products as $motherboard_product)
                                        <tr @if($motherboard_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $motherboard_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($motherboard_product->status != 'Available')
                                                    {{$motherboard_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $motherboard_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($motherboard_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($motherboard_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($motherboard_product->status == 'Available')
                                                <!-- Edit Motherboard Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_motherboard_product_{{ $motherboard_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete Motherboard Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_motherboard_product_{{ $motherboard_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($motherboard_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_motherboard_product_{{ $motherboard_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_motherboard_product_{{ $motherboard_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($motherboard_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_motherboard_product_{{ $motherboard_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_motherboard_product_{{ $motherboard_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($motherboard_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($motherboard_product->status == 'Available')

                                            <!-- Edit Motherboard Product -->
                                            <x-order.edit-product type="Motherboard" :component="$component"
                                                                  :product="$motherboard_product"/>

                                            <!-- Delete Motherboard Product -->
                                            <x-order.delete-product type="Motherboard" :component="$component"
                                                                    :product="$motherboard_product"/>

                                        @elseif($motherboard_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="Motherboard" :component="$component"
                                                                  :product="$motherboard_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Motherboard" :component="$component"
                                                                  :product="$motherboard_product"/>

                                        @elseif($motherboard_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="Motherboard" :component="$component"
                                                                :product="$motherboard_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Motherboard" :component="$component"
                                                                  :product="$motherboard_product"/>

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $motherboard_products->links() }}
                                </div>
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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpu_products as $cpu_product)
                                        <tr @if($cpu_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $cpu_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($cpu_product->status != 'Available')
                                                    {{$cpu_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $cpu_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cpu_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($cpu_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($cpu_product->status == 'Available')
                                                <!-- Edit CPU Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_cpu_product_{{ $cpu_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete CPU Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_cpu_product_{{ $cpu_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($cpu_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_cpu_product_{{ $cpu_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_cpu_product_{{ $cpu_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($cpu_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_cpu_product_{{ $cpu_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_cpu_product_{{ $cpu_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($cpu_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($cpu_product->status == 'Available')

                                            <!-- Edit CPU Product -->
                                            <x-order.edit-product type="CPU" :component="$component"
                                                                  :product="$cpu_product"/>

                                            <!-- Delete CPU Product -->
                                            <x-order.delete-product type="CPU" :component="$component"
                                                                    :product="$cpu_product"/>

                                        @elseif($cpu_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="CPU" :component="$component"
                                                                  :product="$cpu_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="CPU" :component="$component"
                                                                  :product="$cpu_product"/>

                                        @elseif($cpu_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="CPU" :component="$component"
                                                                :product="$cpu_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="CPU" :component="$component"
                                                                  :product="$cpu_product"/>

                                        @elseif($cpu_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $cpu_products->links() }}
                                </div>
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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpu_cooler_products as $cpu_cooler_product)
                                        <tr @if($cpu_cooler_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $cpu_cooler_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($cpu_cooler_product->status != 'Available')
                                                    {{$cpu_cooler_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $cpu_cooler_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cpu_cooler_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($cpu_cooler_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($cpu_cooler_product->status == 'Available')
                                                <!-- Edit CPU Cooler Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_cpu_cooler_product_{{ $cpu_cooler_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete CPU Cooler Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_cpu_cooler_product_{{ $cpu_cooler_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($cpu_cooler_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_cpu_cooler_product_{{ $cpu_cooler_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_cpu_cooler_product_{{ $cpu_cooler_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($cpu_cooler_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_cpu_cooler_product_{{ $cpu_cooler_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_cpu_cooler_product_{{ $cpu_cooler_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($cpu_cooler_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($cpu_cooler_product->status == 'Available')

                                            <!-- Edit CPU Cooler Product -->
                                            <x-order.edit-product type="CPU Cooler" :component="$component"
                                                                  :product="$cpu_cooler_product"/>

                                            <!-- Delete CPU Cooler Product -->
                                            <x-order.delete-product type="CPU Cooler" :component="$component"
                                                                    :product="$cpu_cooler_product"/>

                                        @elseif($cpu_cooler_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="CPU Cooler" :component="$component"
                                                                  :product="$cpu_cooler_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="CPU Cooler" :component="$component"
                                                                  :product="$cpu_cooler_product"/>

                                        @elseif($cpu_cooler_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="CPU Cooler" :component="$component"
                                                                :product="$cpu_cooler_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="CPU Cooler" :component="$component"
                                                                  :product="$cpu_cooler_product"/>

                                        @elseif($cpu_cooler_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $cpu_cooler_products->links() }}
                                </div>
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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($graphics_card_products as $graphics_card_product)
                                        <tr @if($graphics_card_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $graphics_card_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($graphics_card_product->status != 'Available')
                                                    {{$graphics_card_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $graphics_card_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($graphics_card_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($graphics_card_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($graphics_card_product->status == 'Available')
                                                <!-- Edit Graphics Card Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_graphics_card_product_{{ $graphics_card_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete Graphics Card Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_graphics_card_product_{{ $graphics_card_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($graphics_card_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_graphics_card_product_{{ $graphics_card_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_graphics_card_product_{{ $graphics_card_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($graphics_card_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_graphics_card_product_{{ $graphics_card_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_graphics_card_product_{{ $graphics_card_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($graphics_card_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($graphics_card_product->status == 'Available')

                                            <!-- Edit Graphics Card Product -->
                                            <x-order.edit-product type="Graphics Card" :component="$component"
                                                                  :product="$graphics_card_product"/>

                                            <!-- Delete Graphics Card Product -->
                                            <x-order.delete-product type="Graphics Card" :component="$component"
                                                                    :product="$graphics_card_product"/>

                                        @elseif($graphics_card_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="Graphics Card" :component="$component"
                                                                  :product="$graphics_card_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Graphics Card" :component="$component"
                                                                  :product="$graphics_card_product"/>

                                        @elseif($graphics_card_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="Graphics Card" :component="$component"
                                                                :product="$graphics_card_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Graphics Card" :component="$component"
                                                                  :product="$graphics_card_product"/>

                                        @elseif($graphics_card_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $graphics_card_products->links() }}
                                </div>
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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ram_products as $ram_product)
                                        <tr @if($ram_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $ram_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($ram_product->status != 'Available')
                                                    {{$ram_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $ram_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ram_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($ram_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($ram_product->status == 'Available')
                                                <!-- Edit RAM Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_ram_product_{{ $ram_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete RAM Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_ram_product_{{ $ram_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($ram_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_ram_product_{{ $ram_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_ram_product_{{ $ram_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($ram_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_ram_product_{{ $ram_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_ram_product_{{ $ram_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($ram_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($ram_product->status == 'Available')

                                            <!-- Edit RAM Product -->
                                            <x-order.edit-product type="RAM" :component="$component"
                                                                  :product="$ram_product"/>

                                            <!-- Delete RAM Product -->
                                            <x-order.delete-product type="RAM" :component="$component"
                                                                    :product="$ram_product"/>

                                        @elseif($ram_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="RAM" :component="$component"
                                                                  :product="$ram_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="RAM" :component="$component"
                                                                  :product="$ram_product"/>

                                        @elseif($ram_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="RAM" :component="$component"
                                                                :product="$ram_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="RAM" :component="$component"
                                                                  :product="$ram_product"/>

                                        @elseif($ram_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $ram_products->links() }}
                                </div>
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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($storage_products as $storage_product)
                                        <tr @if($storage_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $storage_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($storage_product->status != 'Available')
                                                    {{$storage_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $storage_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($storage_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($storage_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($storage_product->status == 'Available')
                                                <!-- Edit Storage Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_storage_product_{{ $storage_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete Storage Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_storage_product_{{ $storage_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($storage_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_storage_product_{{ $storage_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_storage_product_{{ $storage_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($storage_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_storage_product_{{ $storage_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_storage_product_{{ $storage_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($storage_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($storage_product->status == 'Available')

                                            <!-- Edit Storage Product -->
                                            <x-order.edit-product type="Storage" :component="$component"
                                                                  :product="$storage_product"/>

                                            <!-- Delete Storage Product -->
                                            <x-order.delete-product type="Storage" :component="$component"
                                                                    :product="$storage_product"/>

                                        @elseif($storage_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="Storage" :component="$component"
                                                                  :product="$storage_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Storage" :component="$component"
                                                                  :product="$storage_product"/>

                                        @elseif($storage_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="Storage" :component="$component"
                                                                :product="$storage_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Storage" :component="$component"
                                                                  :product="$storage_product"/>

                                        @elseif($storage_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $storage_products->links() }}
                                </div>
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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($psu_products as $psu_product)
                                        <tr @if($psu_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $psu_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($psu_product->status != 'Available')
                                                    {{$psu_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $psu_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($psu_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($psu_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($psu_product->status == 'Available')
                                                <!-- Edit PSU Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_psu_product_{{ $psu_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete PSU Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_psu_product_{{ $psu_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($psu_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_psu_product_{{ $psu_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_psu_product_{{ $psu_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($psu_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_psu_product_{{ $psu_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_psu_product_{{ $psu_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($psu_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($psu_product->status == 'Available')

                                            <!-- Edit PSU Product -->
                                            <x-order.edit-product type="PSU" :component="$component"
                                                                  :product="$psu_product"/>

                                            <!-- Delete PSU Product -->
                                            <x-order.delete-product type="PSU" :component="$component"
                                                                    :product="$psu_product"/>

                                        @elseif($psu_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="PSU" :component="$component"
                                                                  :product="$psu_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="PSU" :component="$component"
                                                                  :product="$psu_product"/>

                                        @elseif($psu_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="PSU" :component="$component"
                                                                :product="$psu_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="PSU" :component="$component"
                                                                  :product="$psu_product"/>

                                        @elseif($psu_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $psu_products->links() }}
                                </div>
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
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($computer_case_products as $computer_case_product)
                                        <tr @if($computer_case_product->status != 'Available')
                                            onclick="window.location='{{ route('user.profile.search', $computer_case_product->getCustomer()) }}'"
                                            @endif>
                                            <td>
                                                @if($computer_case_product->status != 'Available')
                                                    {{$computer_case_product->getCustomerFullName()}}
                                                @endif
                                            </td>
                                            <td>{{ $computer_case_product->status }}</td>
                                            <td>{{ \Carbon\Carbon::parse($computer_case_product->status_date)->diffForHumans() }}</td>
                                            <td>&#8369;{{ number_format($computer_case_product->price,2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                            @if($computer_case_product->status == 'Available')
                                                <!-- Edit Computer Case Product -->
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#edit_computer_case_product_{{ $computer_case_product->id }}">
                                                        Edit
                                                    </button>
                                                    <!-- Delete Computer Case Product -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete_computer_case_product_{{ $computer_case_product->id }}">
                                                        Delete
                                                    </button>
                                            @elseif($computer_case_product->status == 'Ordered')
                                                <!-- Accept Order -->
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#accept_computer_case_product_{{ $computer_case_product->id }}">
                                                        Accept
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_computer_case_product_{{ $computer_case_product->id }}">
                                                        Cancel
                                                    </button>
                                            @elseif($computer_case_product->status == 'Confirmed')
                                                <!-- Done Order -->
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                            data-bs-target="#done_computer_case_product_{{ $computer_case_product->id }}">
                                                        Done
                                                    </button>
                                                    <!-- Cancel Order -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#cancel_computer_case_product_{{ $computer_case_product->id }}">
                                                        Cancel
                                                    </button>
                                                @elseif($computer_case_product->status == 'Sold Out')
                                                    <button disabled type="button" class="btn btn-success">Done</button>
                                                @endif
                                            </td>
                                        </tr>

                                        @if($computer_case_product->status == 'Available')

                                            <!-- Edit Computer Case Product -->
                                            <x-order.edit-product type="Computer Case" :component="$component"
                                                                  :product="$computer_case_product"/>

                                            <!-- Delete Computer Case Product -->
                                            <x-order.delete-product type="Computer Case" :component="$component"
                                                                    :product="$computer_case_product"/>

                                        @elseif($computer_case_product->status == 'Ordered')

                                            <!-- Accept Order -->
                                            <x-order.accept-order type="Computer Case" :component="$component"
                                                                  :product="$computer_case_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Computer Case" :component="$component"
                                                                  :product="$computer_case_product"/>

                                        @elseif($computer_case_product->status == 'Confirmed')

                                            <!-- Done Order -->
                                            <x-order.done-order type="Computer Case" :component="$component"
                                                                :product="$computer_case_product"/>

                                            <!-- Cancel Order -->
                                            <x-order.cancel-order type="Computer Case" :component="$component"
                                                                  :product="$computer_case_product"/>

                                        @elseif($computer_case_product->status == 'Sold Out')

                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $computer_case_products->links() }}
                                </div>
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
