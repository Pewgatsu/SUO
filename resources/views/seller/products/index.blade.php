@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            @if(isset($motherboard_components))
                <div class="h1">
                    <i class="fas fa-microchip"></i>
                    <small> Motherboard</small>
                </div>
            @elseif(isset($cpu_components))
                <div class="h1">
                    <i class="bi bi-cpu-fill"></i>
                    <small> CPU</small>
                </div>
            @elseif(isset($cpu_cooler_components))
                <div class="h1">
                    <i class="far fa-snowflake"></i>
                    <small> CPU Cooler</small>
                </div>
            @elseif(isset($graphics_card_components))
                <div class="h1">
                    <i class="fas fa-tv"></i>
                    <small> Graphics Card</small>
                </div>
            @elseif(isset($ram_components))
                <div class="h1">
                    <i class="fas fa-memory"></i>
                    <small> RAM</small>
                </div>
            @elseif(isset($storage_components))
                <div class="h1">
                    <i class="fas fa-hdd"></i>
                    <small> Storage</small>
                </div>
            @elseif(isset($psu_components))
                <div class="h1">
                    <i class="fas fa-plug"></i>
                    <small> PSU</small>
                </div>
            @elseif(isset($computer_case_components))
                <div class="h1">
                    <i class="fas fa-suitcase"></i>
                    <small> Computer Case</small>
                </div>
            @endif
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
                    @if(isset($motherboard_components))
                        @section('title','Motherboards')
                        @if($motherboard_components->count())
                            <div class="table-responsive text-center">
                                <table id="motherboard_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Motherboard Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($motherboard_components as $motherboard_component)
                                        <tr onclick="window.location='{{ route('seller.products.motherboards.order', $motherboard_component) }}'">
                                            <td>{{ $motherboard_component->name }}</td>
                                            <td>{{ $motherboard_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $motherboard_component->getProductsCount($store) }}</td>
                                            <td>{{ $motherboard_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($motherboard_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($motherboard_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_motherboard_products_{{ $motherboard_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($motherboard_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_motherboard_products_{{ $motherboard_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Motherboard Products -->
                                        <x-product.motherboard mode="edit"
                                                               :motherboardComponent="$motherboard_component"
                                                               :store="$store"/>

                                        <!-- Delete Motherboard Products-->
                                        <x-product.delete-product type="Motherboard" :component="$motherboard_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $motherboard_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Motherboard Products</p>
                        @endif
                    <!-- CPU Table -->
                    @elseif(isset($cpu_components))
                        @section('title','CPU')
                        @if($cpu_components->count())
                            <div class="table-responsive text-center">
                                <table id="cpu_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>CPU Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpu_components as $cpu_component)
                                        <tr onclick="window.location='{{ route('seller.products.cpus.order', $cpu_component) }}'">
                                            <td>{{ $cpu_component->name }}</td>
                                            <td>{{ $cpu_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $cpu_component->getProductsCount($store) }}</td>
                                            <td>{{ $cpu_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($cpu_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($cpu_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_cpu_products_{{ $cpu_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($cpu_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_cpu_products_{{ $cpu_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit CPU Products -->
                                        <x-product.cpu mode="edit" :cpuComponent="$cpu_component" :store="$store"/>

                                        <!-- Delete CPU Products-->
                                        <x-product.delete-product type="CPU" :component="$cpu_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $cpu_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No CPU Products</p>
                        @endif
                    <!-- CPU Cooler Table -->
                    @elseif(isset($cpu_cooler_components))
                        @section('title','CPU Coolers')
                        @if($cpu_cooler_components->count())
                            <div class="table-responsive text-center">
                                <table id="cpu_cooler_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>CPU Cooler Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpu_cooler_components as $cpu_cooler_component)
                                        <tr onclick="window.location='{{ route('seller.products.cpu_coolers.order', $cpu_cooler_component) }}'">
                                            <td>{{ $cpu_cooler_component->name }}</td>
                                            <td>{{ $cpu_cooler_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $cpu_cooler_component->getProductsCount($store) }}</td>
                                            <td>{{ $cpu_cooler_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($cpu_cooler_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($cpu_cooler_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_cpu_cooler_products_{{ $cpu_cooler_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($cpu_cooler_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_cpu_cooler_products_{{ $cpu_cooler_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit CPU Cooler Products -->
                                        <x-product.cpu-cooler mode="edit" :cpuCoolerComponent="$cpu_cooler_component"
                                                              :store="$store"/>

                                        <!-- Delete CPU Cooler Products-->
                                        <x-product.delete-product type="CPU Cooler" :component="$cpu_cooler_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $cpu_cooler_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No CPU Cooler Products</p>
                        @endif
                    <!-- Graphics Card Table -->
                    @elseif(isset($graphics_card_components))
                        @section('title','Graphics Card')
                        @if($graphics_card_components->count())
                            <div class="table-responsive text-center">
                                <table id="graphics_card_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>CPU Cooler Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($graphics_card_components as $graphics_card_component)
                                        <tr onclick="window.location='{{ route('seller.products.graphics_cards.order', $graphics_card_component) }}'">
                                            <td>{{ $graphics_card_component->name }}</td>
                                            <td>{{ $graphics_card_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $graphics_card_component->getProductsCount($store) }}</td>
                                            <td>{{ $graphics_card_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($graphics_card_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($graphics_card_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_graphics_card_products_{{ $graphics_card_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($graphics_card_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_graphics_card_products_{{ $graphics_card_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Graphics Card Products -->
                                        <x-product.graphics-card mode="edit"
                                                                 :graphicsCardComponent="$graphics_card_component"
                                                                 :store="$store"/>

                                        <!-- Delete Graphics Card Products-->
                                        <x-product.delete-product type="Graphics Card"
                                                                  :component="$graphics_card_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $graphics_card_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Graphics Card Products</p>
                        @endif
                    <!-- RAM Table -->
                    @elseif(isset($ram_components))
                        @section('title','RAM')
                        @if($ram_components->count())
                            <div class="table-responsive text-center">
                                <table id="ram_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>CPU Cooler Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ram_components as $ram_component)
                                        <tr onclick="window.location='{{ route('seller.products.rams.order', $ram_component) }}'">
                                            <td>{{ $ram_component->name }}</td>
                                            <td>{{ $ram_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $ram_component->getProductsCount($store) }}</td>
                                            <td>{{ $ram_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($ram_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($ram_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_ram_products_{{ $ram_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($ram_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_ram_products_{{ $ram_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit RAM Products -->
                                        <x-product.ram mode="edit" :ramComponent="$ram_component" :store="$store"/>

                                        <!-- Delete RAM Products-->
                                        <x-product.delete-product type="RAM" :component="$ram_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $ram_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No RAM Products</p>
                        @endif
                    <!-- Storage Table -->
                    @elseif(isset($storage_components))
                        @section('title','Storage')
                        @if($storage_components->count())
                            <div class="table-responsive text-center">
                                <table id="storage_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>CPU Cooler Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($storage_components as $storage_component)
                                        <tr onclick="window.location='{{ route('seller.products.storages.order', $storage_component) }}'">
                                            <td>{{ $storage_component->name }}</td>
                                            <td>{{ $storage_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $storage_component->getProductsCount($store) }}</td>
                                            <td>{{ $storage_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($storage_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($storage_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_storage_products_{{ $storage_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($storage_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_storage_products_{{ $storage_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Storage Products -->
                                        <x-product.storage mode="edit" :storageComponent="$storage_component"
                                                           :store="$store"/>

                                        <!-- Delete Storage Products-->
                                        <x-product.delete-product type="Storage" :component="$storage_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $storage_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Storage Products</p>
                        @endif
                    <!-- PSU Table -->
                    @elseif(isset($psu_components))
                        @section('title','Power Supply')
                        @if($psu_components->count())
                            <div class="table-responsive text-center">
                                <table id="psu_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>CPU Cooler Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($psu_components as $psu_component)
                                        <tr onclick="window.location='{{ route('seller.products.psus.order', $psu_component) }}'">
                                            <td>{{ $psu_component->name }}</td>
                                            <td>{{ $psu_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $psu_component->getProductsCount($store) }}</td>
                                            <td>{{ $psu_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($psu_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($psu_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_psu_products_{{ $psu_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($psu_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_psu_products_{{ $psu_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit PSU Products -->
                                        <x-product.psu mode="edit" :psuComponent="$psu_component" :store="$store"/>

                                        <!-- Delete PSU Products-->
                                        <x-product.delete-product type="PSU" :component="$psu_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $psu_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No PSU Products</p>
                        @endif
                    <!-- Computer Case Table -->
                    @elseif(isset($computer_case_components))
                        @section('title','Computer Case')
                        @if($computer_case_components->count())
                            <div class="table-responsive text-center">
                                <table id="computer_case_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>CPU Cooler Name</th>
                                        <th>Date Added</th>
                                        <th>Quantity</th>
                                        <th>Sold</th>
                                        <th>Unit Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($computer_case_components as $computer_case_component)
                                        <tr onclick="window.location='{{ route('seller.products.computer_cases.order', $computer_case_component) }}'">
                                            <td>{{ $computer_case_component->name }}</td>
                                            <td>{{ $computer_case_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $computer_case_component->getProductsCount($store) }}</td>
                                            <td>{{ $computer_case_component->getProductsSold($store) }}</td>
                                            <td>
                                                &#8369;{{ number_format($computer_case_component->getProductsPrice($store),2)  }}</td>
                                            <td onclick="event.stopPropagation();">
                                                <button
                                                    @if($computer_case_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_computer_case_products_{{ $computer_case_component->id }}">
                                                    Edit
                                                </button>
                                                <button
                                                    @if($computer_case_component->products->where('store_id',$store->id)->where('status','Available')->count() == 0) disabled
                                                    @endif
                                                    type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete_computer_case_products_{{ $computer_case_component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Edit Computer Case Products -->
                                        <x-product.computer-case mode="edit"
                                                                 :computerCaseComponent="$computer_case_component"
                                                                 :store="$store"/>

                                        <!-- Delete Computer Case Products-->
                                        <x-product.delete-product type="Computer Case"
                                                                  :component="$computer_case_component"
                                                                  :store="$store"/>

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $computer_case_components->links() }}
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
