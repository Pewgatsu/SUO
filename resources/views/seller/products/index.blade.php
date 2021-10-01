@extends('layouts.master')
@section('content')
    @include('layouts.dashboardheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            @if(isset($motherboard_components))
                <div class="h1">
                    <i class="fas fa-microchip"></i>
                    <small> Motherboard Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_motherboard_product">
                    Add Motherboard Product
                </button>
            @elseif(isset($cpu_components))
                <div class="h1">
                    <i class="bi bi-cpu-fill"></i>
                    <small> CPU Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_cpu_product">
                    Add CPU Product
                </button>
            @elseif(isset($cpu_cooler_components))
                <div class="h1">
                    <i class="far fa-snowflake"></i>
                    <small> CPU Cooler Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_cpu_cooler_product">
                    Add CPU Cooler Product
                </button>
            @elseif(isset($graphics_card_components))
                <div class="h1">
                    <i class="fas fa-tv"></i>
                    <small> Graphics Card Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_graphics_card_product">
                    Add Graphics Card Product
                </button>
            @elseif(isset($ram_components))
                <div class="h1">
                    <i class="fas fa-memory"></i>
                    <small> RAM Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_ram_product">
                    Add RAM Product
                </button>
            @elseif(isset($storage_components))
                <div class="h1">
                    <i class="fas fa-hdd"></i>
                    <small> Storage Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_storage_product">
                    Add Storage Product
                </button>
            @elseif(isset($psu_components))
                <div class="h1">
                    <i class="fas fa-plug"></i>
                    <small> PSU Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_psu_product">
                    Add PSU Product
                </button>
            @elseif(isset($computer_case_components))
                <div class="h1">
                    <i class="fas fa-suitcase"></i>
                    <small> Computer Case Products</small>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add_computer_case_product">
                    Add Computer Case Product
                </button>
            @endif
        </div>
    </div>

    <!-- Motherboard Table -->
    <div class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if(isset($motherboard_components))
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
                                        <tr>
                                            <td>{{ $motherboard_component->name }}</td>
                                            <td>{{ $motherboard_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $motherboard_component->getProductsCount($store) }}</td>
                                            <td>{{ $motherboard_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($motherboard_component->getProductsPrice($store),2)  }}</td>
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
                                <div class="d-flex justify-content-center">
                                    {{ $motherboard_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Motherboard Products</p>
                        @endif
                    @elseif(isset($cpu_components))
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
                                        <tr>
                                            <td>{{ $cpu_component->name }}</td>
                                            <td>{{ $cpu_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $cpu_component->getProductsCount($store) }}</td>
                                            <td>{{ $cpu_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($cpu_component->getProductsPrice($store),2)  }}</td>
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
                                <div class="d-flex justify-content-center">
                                    {{ $cpu_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No CPU Products</p>
                        @endif
                    @elseif(isset($cpu_cooler_components))
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
                                        <tr>
                                            <td>{{ $cpu_cooler_component->name }}</td>
                                            <td>{{ $cpu_cooler_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $cpu_cooler_component->getProductsCount($store) }}</td>
                                            <td>{{ $cpu_cooler_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($cpu_cooler_component->getProductsPrice($store),2)  }}</td>
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
                                <div class="d-flex justify-content-center">
                                    {{ $cpu_cooler_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No CPU Cooler Products</p>
                        @endif
                    @elseif(isset($graphics_card_components))
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
                                        <tr>
                                            <td>{{ $graphics_card_component->name }}</td>
                                            <td>{{ $graphics_card_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $graphics_card_component->getProductsCount($store) }}</td>
                                            <td>{{ $graphics_card_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($graphics_card_component->getProductsPrice($store),2)  }}</td>
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
                                <div class="d-flex justify-content-center">
                                    {{ $graphics_card_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Graphics Card Products</p>
                        @endif
                    @elseif(isset($ram_components))
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
                                        <tr>
                                            <td>{{ $ram_component->name }}</td>
                                            <td>{{ $ram_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $ram_component->getProductsCount($store) }}</td>
                                            <td>{{ $ram_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($ram_component->getProductsPrice($store),2)  }}</td>
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
                                <div class="d-flex justify-content-center">
                                    {{ $ram_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No RAM Products</p>
                        @endif
                    @elseif(isset($storage_components))
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
                                        <tr>
                                            <td>{{ $storage_component->name }}</td>
                                            <td>{{ $storage_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $storage_component->getProductsCount($store) }}</td>
                                            <td>{{ $storage_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($storage_component->getProductsPrice($store),2)  }}</td>
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
                                <div class="d-flex justify-content-center">
                                    {{ $storage_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Storage Products</p>
                        @endif
                    @elseif(isset($psu_components))
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
                                        <tr>
                                            <td>{{ $psu_component->name }}</td>
                                            <td>{{ $psu_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $psu_component->getProductsCount($store) }}</td>
                                            <td>{{ $psu_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($psu_component->getProductsPrice($store),2)  }}</td>
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
                                <div class="d-flex justify-content-center">
                                    {{ $psu_components->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No PSU Products</p>
                        @endif
                    @elseif(isset($computer_case_components))
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
                                        <tr>
                                            <td>{{ $computer_case_component->name }}</td>
                                            <td>{{ $computer_case_component->getProductsDateAdded($store)->diffForHumans() }}</td>
                                            <td>{{ $computer_case_component->getProductsCount($store) }}</td>
                                            <td>{{ $computer_case_component->getProductsSold($store) }}</td>
                                            <td>&#8369;{{ number_format($computer_case_component->getProductsPrice($store),2)  }}</td>
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

    @if(count($errors) > 0)
        <script>
            $(document).ready(function () {
                @if($errors->has('mobo_*'))
                $('#add_motherboard_product').modal('show');
                @elseif($errors->has('cpu_cooler_*'))
                $('#add_cpu_cooler_product').modal('show');
                @elseif($errors->has('cpu_*'))
                $('#add_cpu_product').modal('show');
                @elseif($errors->has('graphics_card_*'))
                $('#add_graphics_card_product').modal('show');
                @elseif($errors->has('ram_*'))
                $('#add_ram_product').modal('show');
                @elseif($errors->has('storage_*'))
                $('#add_storage_product').modal('show');
                @elseif($errors->has('psu_*'))
                $('#add_psu_product').modal('show');
                @elseif($errors->has('case_*'))
                $('#add_computer_case_product').modal('show');
                @endif
            });
        </script>
    @endif

@endsection
