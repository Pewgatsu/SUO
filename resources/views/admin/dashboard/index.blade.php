@extends('layouts.master')

@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                <i class="bi bi-gear"></i>
                <small> Dashboard</small>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    Add Component
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_motherboard">Motherboard</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_cpu">CPU</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_cpu_cooler">CPU Cooler</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_graphics_card">Graphics Card</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_ram">RAM</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_storage">Storage</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_psu">PSU</a></li>
                    <li><a class="dropdown-item" type="button" data-bs-toggle="modal"
                           data-bs-target="#add_computer_case">Computer Case</a></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="mt-2" id="overview">
        <div class="container">
            <div class="row">

                <!-- Product Breakdown -->
                <div class="col-md-3">
                    <ul class="list-group">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center disabled">
                            Products
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Motherboard
                            <span class="badge bg-primary rounded-pill">{{ $motherboard_products_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            CPU
                            <span class="badge bg-primary rounded-pill">{{ $cpu_products_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            CPU Cooler
                            <span class="badge bg-primary rounded-pill">{{ $cpu_cooler_products_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Graphics Card
                            <span class="badge bg-primary rounded-pill">{{ $graphics_card_products_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            RAM
                            <span class="badge bg-primary rounded-pill">{{ $ram_products_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Storage
                            <span class="badge bg-primary rounded-pill">{{ $storage_products_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            PSU
                            <span class="badge bg-primary rounded-pill">{{ $psu_products_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Computer Case
                            <span class="badge bg-primary rounded-pill">{{ $computer_case_products_count }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Website Overview -->
                <div class="col-md-6 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title p-2 text-center">Website Overview</h4>
                            <div class="row text-center g-2 mb-2">
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="bi bi-shop"></i>
                                            <small>{{ $sellers_count }}</small>
                                        </div>
                                        Sellers
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="bi bi-people"></i>
                                            <small>{{ $accounts_count }}</small>
                                        </div>
                                        Users
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="bi bi-person"></i>
                                            <small>{{ $customers_count }}</small>
                                        </div>
                                        Customers
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center g-2 mb-2">
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="bi bi-box-seam"></i>
                                            <small>{{ $products_count }}</small>
                                        </div>
                                        Products
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="fab fa-connectdevelop"></i>
                                            <small>{{ $distances_count }}</small>
                                        </div>
                                        Distances
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="bi bi-cpu"></i>
                                            <small>{{ $components_count }}</small>
                                        </div>
                                        Components
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center g-2">
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <form action="{{ route('admin.dashboard.compute') }}" method="post">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Compute All Distances</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Component Breakdown -->
                <div class="col-md-3">
                    <ul class="list-group">
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center disabled">
                            Components
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Motherboard
                            <span class="badge bg-primary rounded-pill">{{ $motherboards_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            CPU
                            <span class="badge bg-primary rounded-pill">{{ $cpus_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            CPU Cooler
                            <span class="badge bg-primary rounded-pill">{{ $cpu_coolers_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Graphics Card
                            <span class="badge bg-primary rounded-pill">{{ $graphics_cards_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            RAM
                            <span class="badge bg-primary rounded-pill">{{ $rams_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Storage
                            <span class="badge bg-primary rounded-pill">{{ $storages_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            PSU
                            <span class="badge bg-primary rounded-pill">{{ $psus_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Computer Case
                            <span class="badge bg-primary rounded-pill">{{ $computer_cases_count }}</span>
                        </li>
                    </ul>
                </div>

                <!-- Latest Users -->
                <div class="col-md my-0 mt-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title p-2 text-center">Latest Users</h4>
                            @if($recent_accounts->count())
                                <div class="table-responsive text-center">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>Account Type</th>
                                            <th>Verified</th>
                                            <th>Date Joined</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recent_accounts as $account)
                                            <tr>
                                                <td>{{ $account->id }}</td>
                                                <td>{{ $account->username }}</td>
                                                <td>{{ $account->account_type }}</td>
                                                <td>
                                                    @if($account->is_verified)
                                                        Yes
                                                    @else
                                                        No
                                                    @endif
                                                </td>
                                                <td>{{ $account->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="lead text-center">No Users</p>
                            @endif

                        </div>
                    </div>
                </div>

                <!-- Latest Components -->
                <div class="col-md my-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title p-2 text-center">Latest Components</h4>
                            @if($recent_components->count())
                                <div class="table-responsive text-center">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Component ID</th>
                                            <th>Component Name</th>
                                            <th>Component Type</th>
                                            <th>Manufacturer</th>
                                            <th>Date Added</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recent_components as $component)
                                            <tr>
                                                <td>{{ $component->id }}</td>
                                                <td>{{ $component->name }}</td>
                                                <td>{{ $component->type }}</td>
                                                <td>{{ $component->manufacturer }}</td>
                                                <td>{{ $component->created_at->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="lead text-center">No Components</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modals -->
    @if(count($errors) > 0)
        <script>
            $(document).ready(function () {
                @if($errors->has('mobo_*'))
                $('#add_motherboard').modal('show');
                @elseif($errors->has('cpu_cooler_*'))
                $('#add_cpu_cooler').modal('show');
                @elseif($errors->has('cpu_*'))
                $('#add_cpu').modal('show');
                @elseif($errors->has('graphics_card_*'))
                $('#add_graphics_card').modal('show');
                @elseif($errors->has('ram_*'))
                $('#add_ram').modal('show');
                @elseif($errors->has('storage_*'))
                $('#add_storage').modal('show');
                @elseif($errors->has('psu_*'))
                $('#add_psu').modal('show');
                @elseif($errors->has('case_*'))
                $('#add_computer_case').modal('show');
                @endif
            });
        </script>
    @endif


    <!-- Add Motherboard Component -->
    <x-component.motherboard :memorySpeeds="$memory_speeds" mode="add" />

    <!-- Add CPU Component -->
    <x-component.cpu mode="add" />

    <!-- Add CPU Cooler Component -->
    <x-component.cpu-cooler :cpuSockets="$cpu_sockets" mode="add" />

    <!-- Add Graphics Card Component -->
    <x-component.graphics-card mode="add" />

    <!-- Add RAM Component -->
    <x-component.ram mode="add" />

    <!-- Add Storage Component -->
    <x-component.storage mode="add" />

    <!-- Add PSU Component -->
    <x-component.psu mode="add" />

    <!-- Add Computer Case Component -->
    <x-component.computer-case :moboFormFactors="$mobo_form_factors" mode="add" />

@endsection

@push('select2')
    <script>
        $(document).ready(function () {
            @stack('select2_modals')
        });
    </script>
@endpush
