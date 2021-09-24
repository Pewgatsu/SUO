@extends('layouts.master')

@section('content')
    @include('layouts.dashboardheader')
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

                <!-- Component Breakdown -->
                <div class="col-md-4">
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

                <!-- Website Overview -->
                <div class="col-md-8 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title p-2 text-center">Website Overview</h4>
                            <div class="row text-center g-2">
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="bi bi-person"></i>
                                            <small>{{ $accounts_count }}</small>
                                        </div>
                                        Users
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
                                <div class="col-md">
                                    <div class="card card-body bg-light">
                                        <div class="h3">
                                            <i class="bi bi-bar-chart"></i>
                                            <small>0</small>
                                        </div>
                                        Visitors
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <td>{{ $component->updated_at->diffForHumans() }}</td>
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


    <!-- Add Motherboard -->
    <x-component.motherboard :memorySpeeds="$memory_speeds" mode="add" />

    <!-- Add CPU -->
    <x-component.cpu mode="add" />

    <!-- Add CPU Cooler -->
    <div class="modal fade" id="add_cpu_cooler" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="add_cpu_cooler_label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.dashboard.add_cpu_cooler') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_cpu_cooler_label">CPU Cooler</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Component Attributes -->

                        <div class="mb-3">
                            <label for="cpu_cooler_image" class="form-label">Component Image</label>
                            <input class="form-control @error('cpu_cooler_image') is-invalid @enderror" type="file"
                                   id="cpu_cooler_image" name="cpu_cooler_image">
                            @error('cpu_cooler_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('cpu_cooler_name') is-invalid @enderror"
                                   id="cpu_cooler_name" name="cpu_cooler_name"
                                   placeholder="Component Name" value="{{ old('cpu_cooler_name') }}">
                            <label for="cpu_cooler_name">Component Name</label>
                            @error('cpu_cooler_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('cpu_cooler_manufacturer') is-invalid @enderror"
                                   id="cpu_cooler_manufacturer"
                                   name="cpu_cooler_manufacturer"
                                   placeholder="Manufacturer" value="{{ old('cpu_cooler_manufacturer') }}">
                            <label for="cpu_cooler_manufacturer">Manufacturer</label>
                            @error('cpu_cooler_manufacturer')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('cpu_cooler_series') is-invalid @enderror"
                                   id="cpu_cooler_series" name="cpu_cooler_series"
                                   placeholder="Series" value="{{ old('cpu_cooler_series') }}">
                            <label for="cpu_cooler_series">Series</label>
                            @error('cpu_cooler_series')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('cpu_cooler_model') is-invalid @enderror"
                                   id="cpu_cooler_model" name="cpu_cooler_model"
                                   placeholder="Model" value="{{ old('cpu_cooler_model') }}">
                            <label for="cpu_cooler_model">Model</label>
                            @error('cpu_cooler_model')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('cpu_cooler_color') is-invalid @enderror"
                                   id="cpu_cooler_color" name="cpu_cooler_color"
                                   placeholder="Color" value="{{ old('cpu_cooler_color') }}">
                            <label for="cpu_cooler_color">Color</label>
                            @error('cpu_cooler_color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('cpu_cooler_length') is-invalid @enderror"
                                           id="cpu_cooler_length"
                                           name="cpu_cooler_length"
                                           placeholder="Length (mm)" value="{{ old('cpu_cooler_length') }}">
                                    <label for="cpu_cooler_length">Length (mm)</label>
                                    @error('cpu_cooler_length')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('cpu_cooler_width') is-invalid @enderror"
                                           id="cpu_cooler_width"
                                           name="cpu_cooler_width"
                                           placeholder="Width (mm)" value="{{ old('cpu_cooler_width') }}">
                                    <label for="cpu_cooler_width">Width (mm)</label>
                                    @error('cpu_cooler_width')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('cpu_cooler_height') is-invalid @enderror"
                                           id="cpu_cooler_height"
                                           name="cpu_cooler_height"
                                           placeholder="Height (mm)" value="{{ old('cpu_cooler_height') }}">
                                    <label for="cpu_cooler_height">Height (mm)</label>
                                    @error('cpu_cooler_height')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- CPU Cooler Attributes -->
                        <div class="form-floating mb-3">
                            <select class="cpu_cooler_cpu_socket form-control" multiple="multiple" style="width: 100%"
                                    name="cpu_cooler_cpu_socket[]" id="cpu_cooler_cpu_socket">
                                @foreach($cpu_sockets as $cpu_socket)
                                    <option
                                        @if(old('cpu_cooler_cpu_socket') !== null && in_array($cpu_socket->id,old('cpu_cooler_cpu_socket'))) selected
                                        @endif value="{{ $cpu_socket->id }}">{{ $cpu_socket->name }}</option>
                                @endforeach
                            </select>
                            @error('cpu_cooler_cpu_socket')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @if(old('cpu_cooler_cpu_socket') !== null)
                                @foreach(old('cpu_cooler_cpu_socket') as $cpu_socket_name)
                                    @if(!filter_var($cpu_socket_name,FILTER_VALIDATE_INT))
                                        <option selected value="{{ $cpu_socket_name }}">{{ $cpu_socket_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('cpu_cooler_fan_speed') is-invalid @enderror"
                                   id="cpu_cooler_fan_speed"
                                   name="cpu_cooler_fan_speed"
                                   placeholder="Fan Speed (rpm)" value="{{ old('cpu_cooler_fan_speed') }}">
                            <label for="cpu_cooler_fan_speed">Fan Speed (rpm)</label>
                            @error('cpu_cooler_fan_speed')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('cpu_cooler_noise_level') is-invalid @enderror"
                                   id="cpu_cooler_noise_level"
                                   name="cpu_cooler_noise_level"
                                   placeholder="Noise Level (dB)" value="{{ old('cpu_cooler_noise_level') }}">
                            <label for="cpu_cooler_noise_level">Noise Level (dB)</label>
                            @error('cpu_cooler_noise_level')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('cpu_cooler_water_cooled') is-invalid @enderror"
                                   id="cpu_cooler_water_cooled"
                                   name="cpu_cooler_water_cooled"
                                   placeholder="Water Cooled Support" value="{{ old('cpu_cooler_water_cooled') }}">
                            <label for="cpu_cooler_water_cooled">Water Cooled Support</label>
                            @error('cpu_cooler_water_cooled')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Graphics Card -->
    <div class="modal fade" id="add_graphics_card" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="add_graphics_card_label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.dashboard.add_graphics_card') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_graphics_card_label">Graphics Card</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Component Attributes -->

                        <div class="mb-3">
                            <label for="graphics_card_image" class="form-label">Component Image</label>
                            <input class="form-control @error('graphics_card_image') is-invalid @enderror" type="file"
                                   id="graphics_card_image" name="graphics_card_image">
                            @error('graphics_card_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_name') is-invalid @enderror"
                                   id="graphics_card_name" name="graphics_card_name"
                                   placeholder="Component Name" value="{{ old('graphics_card_name') }}">
                            <label for="graphics_card_name">Component Name</label>
                            @error('graphics_card_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_manufacturer') is-invalid @enderror"
                                   id="graphics_card_manufacturer"
                                   name="graphics_card_manufacturer"
                                   placeholder="Manufacturer" value="{{ old('graphics_card_manufacturer') }}">
                            <label for="graphics_card_manufacturer">Manufacturer</label>
                            @error('graphics_card_manufacturer')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_series') is-invalid @enderror"
                                   id="graphics_card_series"
                                   name="graphics_card_series" placeholder="Series"
                                   value="{{ old('graphics_card_series') }}">
                            <label for="graphics_card_series">Series</label>
                            @error('graphics_card_series')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_model') is-invalid @enderror"
                                   id="graphics_card_model" name="graphics_card_model"
                                   placeholder="Model" value="{{ old('graphics_card_model') }}">
                            <label for="graphics_card_model">Model</label>
                            @error('graphics_card_model')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_color') is-invalid @enderror"
                                   id="graphics_card_color" name="graphics_card_color"
                                   placeholder="Color" value="{{ old('graphics_card_color') }}">
                            <label for="graphics_card_color">Color</label>
                            @error('graphics_card_color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('graphics_card_length') is-invalid @enderror"
                                           id="graphics_card_length"
                                           name="graphics_card_length"
                                           placeholder="Length (mm)" value="{{ old('graphics_card_length') }}">
                                    <label for="graphics_card_length">Length (mm)</label>
                                    @error('graphics_card_length')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('graphics_card_width') is-invalid @enderror"
                                           id="graphics_card_width"
                                           name="graphics_card_width"
                                           placeholder="Width (mm)" value="{{ old('graphics_card_width') }}">
                                    <label for="graphics_card_width">Width (mm)</label>
                                    @error('graphics_card_width')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('graphics_card_height') is-invalid @enderror"
                                           id="graphics_card_height"
                                           name="graphics_card_height"
                                           placeholder="Height (mm)" value="{{ old('graphics_card_height') }}">
                                    <label for="graphics_card_height">Height (mm)</label>
                                    @error('graphics_card_height')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Graphics Card Attributes -->

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_chipset') is-invalid @enderror"
                                   id="graphics_card_chipset"
                                   name="graphics_card_chipset"
                                   placeholder="GPU Chipset" value="{{ old('graphics_card_chipset') }}">
                            <label for="graphics_card_chipset">GPU Chipset</label>
                            @error('graphics_card_chipset')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_memory') is-invalid @enderror"
                                   id="graphics_card_memory"
                                   name="graphics_card_memory" placeholder="GPU Memory"
                                   value="{{ old('graphics_card_memory') }}">
                            <label for="graphics_card_memory">GPU Memory (GB)</label>
                            @error('graphics_card_memory')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_memory_type') is-invalid @enderror"
                                   id="graphics_card_memory_type"
                                   name="graphics_card_memory_type"
                                   placeholder="GPU Memory Type" value="{{ old('graphics_card_memory_type') }}">
                            <label for="graphics_card_memory_type">GPU Memory Type</label>
                            @error('graphics_card_memory_type')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_base_clock') is-invalid @enderror"
                                   id="graphics_card_base_clock"
                                   name="graphics_card_base_clock"
                                   placeholder="Base Clock (MHz)" value="{{ old('graphics_card_base_clock') }}">
                            <label for="graphics_card_base_clock">Base Clock (MHz)</label>
                            @error('graphics_card_base_clock')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_boost_clock') is-invalid @enderror"
                                   id="graphics_card_boost_clock"
                                   name="graphics_card_boost_clock"
                                   placeholder="Boost Clock (MHz)" value="{{ old('graphics_card_boost_clock') }}">
                            <label for="graphics_card_boost_clock">Boost Clock (MHz)</label>
                            @error('graphics_card_boost_clock')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_interface') is-invalid @enderror"
                                   id="graphics_card_interface"
                                   name="graphics_card_interface"
                                   placeholder="Interface" value="{{ old('graphics_card_interface') }}">
                            <label for="graphics_card_interface">Interface</label>
                            @error('graphics_card_interface')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_tdp') is-invalid @enderror"
                                   id="graphics_card_tdp" name="graphics_card_tdp"
                                   placeholder="TDP (W)" value="{{ old('graphics_card_tdp') }}">
                            <label for="graphics_card_tdp">TDP (W)</label>
                            @error('graphics_card_tdp')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_multigraphics_support') is-invalid @enderror"
                                   id="graphics_card_multigraphics_support"
                                   name="graphics_card_multigraphics_support"
                                   placeholder="Multigraphics Support"
                                   value="{{ old('graphics_card_multigraphics_support') }}">
                            <label for="graphics_card_multigraphics_support">Multigraphics Support</label>
                            @error('graphics_card_multigraphics_support')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_frame_sync') is-invalid @enderror"
                                   id="graphics_card_frame_sync"
                                   name="graphics_card_frame_sync"
                                   placeholder="Frame Sync" value="{{ old('graphics_card_frame_sync') }}">
                            <label for="graphics_card_frame_sync">Frame Sync</label>
                            @error('graphics_card_frame_sync')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('graphics_card_dvi_port') is-invalid @enderror"
                                   id="graphics_card_dvi_port"
                                   name="graphics_card_dvi_port" min="0"
                                   max="8"
                                   placeholder="DVI Port" value="{{ old('graphics_card_dvi_port') }}">
                            <label for="graphics_card_dvi_port">DVI Port</label>
                            @error('graphics_card_dvi_port')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('graphics_card_hdmi_port') is-invalid @enderror"
                                   id="graphics_card_hdmi_port"
                                   name="graphics_card_hdmi_port" min="0"
                                   max="8"
                                   placeholder="HDMI Port" value="{{ old('graphics_card_hdmi_port') }}">
                            <label for="graphics_card_hdmi_port">HDMI Port</label>
                            @error('graphics_card_hdmi_port')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('graphics_card_mini_hdmi_port') is-invalid @enderror"
                                   id="graphics_card_mini_hdmi_port"
                                   name="graphics_card_mini_hdmi_port" min="0"
                                   max="8"
                                   placeholder="Mini-HDMI Port" value="{{ old('graphics_card_mini_hdmi_port') }}">
                            <label for="graphics_card_mini_hdmi_port">Mini-HDMI Port</label>
                            @error('graphics_card_mini_hdmi_port')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('graphics_card_displayport_port') is-invalid @enderror"
                                   id="graphics_card_displayport_port"
                                   name="graphics_card_displayport_port" min="0"
                                   max="8"
                                   placeholder="DisplayPort Port" value="{{ old('graphics_card_displayport_port') }}">
                            <label for="graphics_card_displayport_port">DisplayPort Port</label>
                            @error('graphics_card_displayport_port')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('graphics_card_mini_displayport_port') is-invalid @enderror"
                                   id="graphics_card_mini_displayport_port"
                                   name="graphics_card_mini_displayport_port" min="0"
                                   max="8"
                                   placeholder="Mini-DisplayPort Port"
                                   value="{{ old('graphics_card_mini_displayport_port') }}">
                            <label for="graphics_card_mini_displayport_port">Mini-DisplayPort Port</label>
                            @error('graphics_card_mini_displayport_port')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('graphics_card_e_slot_width') is-invalid @enderror"
                                   id="graphics_card_e_slot_width"
                                   name="graphics_card_e_slot_width" min="0"
                                   max="8"
                                   placeholder="Expansion Slot Width" value="{{ old('graphics_card_e_slot_width') }}">
                            <label for="graphics_card_e_slot_width">Expansion Slot Width</label>
                            @error('graphics_card_e_slot_width')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('graphics_card_external_power') is-invalid @enderror"
                                   id="graphics_card_external_power"
                                   name="graphics_card_external_power"
                                   placeholder="External Power" value="{{ old('graphics_card_external_power') }}">
                            <label for="graphics_card_external_power">External Power</label>
                            @error('graphics_card_external_power')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('graphics_card_cooling') is-invalid @enderror"
                                   id="graphics_card_cooling"
                                   name="graphics_card_cooling" placeholder="Cooling"
                                   value="{{ old('graphics_card_cooling') }}">
                            <label for="graphics_card_cooling">Cooling</label>
                            @error('graphics_card_cooling')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add RAM -->
    <div class="modal fade" id="add_ram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="add_ram_label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.dashboard.add_ram') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_ram_label">RAM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Component Attributes -->

                        <div class="mb-3">
                            <label for="ram_image" class="form-label">Component Image</label>
                            <input class="form-control @error('ram_image') is-invalid @enderror" type="file"
                                   id="ram_image" name="ram_image">
                            @error('ram_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_name') is-invalid @enderror"
                                   id="ram_name" name="ram_name"
                                   placeholder="Component Name" value="{{ old('ram_name') }}">
                            <label for="ram_name">Component Name</label>
                            @error('ram_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_manufacturer') is-invalid @enderror"
                                   id="ram_manufacturer" name="ram_manufacturer"
                                   placeholder="Manufacturer" value="{{ old('ram_manufacturer') }}">
                            <label for="ram_manufacturer">Manufacturer</label>
                            @error('ram_manufacturer')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_series') is-invalid @enderror"
                                   id="ram_series" name="ram_series"
                                   placeholder="Series" value="{{ old('ram_series') }}">
                            <label for="ram_series">Series</label>
                            @error('ram_series')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_model') is-invalid @enderror"
                                   id="ram_model" name="ram_model" placeholder="Model" value="{{ old('ram_model') }}">
                            <label for="ram_model">Model</label>
                            @error('ram_model')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_color') is-invalid @enderror"
                                   id="ram_color" name="ram_color" placeholder="Color" value="{{ old('ram_color') }}">
                            <label for="ram_color">Color</label>
                            @error('ram_color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('ram_length') is-invalid @enderror"
                                           id="ram_length" name="ram_length"
                                           placeholder="Length (mm)" value="{{ old('ram_length') }}">
                                    <label for="ram_length">Length (mm)</label>
                                    @error('ram_length')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('ram_width') is-invalid @enderror"
                                           id="ram_width" name="ram_width"
                                           placeholder="Width (mm)" value="{{ old('ram_width') }}">
                                    <label for="ram_width">Width (mm)</label>
                                    @error('ram_width')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('ram_height') is-invalid @enderror"
                                           id="ram_height" name="ram_height"
                                           placeholder="Height (mm)" value="{{ old('ram_height') }}">
                                    <label for="ram_height">Height (mm)</label>
                                    @error('ram_height')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- RAM Attributes -->

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_memory_type') is-invalid @enderror"
                                   id="ram_memory_type" name="ram_memory_type"
                                   placeholder="Memory Type" value="{{ old('ram_memory_type') }}">
                            <label for="ram_memory_type">Memory Type</label>
                            @error('ram_memory_type')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_memory_speed') is-invalid @enderror"
                                   id="ram_memory_speed" name="ram_memory_speed"
                                   placeholder="Memory Speed (MHz)" value="{{ old('ram_memory_speed') }}">
                            <label for="ram_memory_speed">Memory Speed (MHz)</label>
                            @error('ram_memory_speed')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_memory_capacity') is-invalid @enderror"
                                   id="ram_memory_capacity" name="ram_memory_capacity"
                                   placeholder="Memory Capacity (GB))" value="{{ old('ram_memory_capacity') }}">
                            <label for="ram_memory_capacity">Memory Capacity (GB)</label>
                            @error('ram_memory_capacity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_form_factor') is-invalid @enderror"
                                   id="ram_form_factor" name="ram_form_factor"
                                   placeholder="Form Factor" value="{{ old('ram_form_factor') }}">
                            <label for="ram_form_factor">Form Factor</label>
                            @error('ram_form_factor')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_modules') is-invalid @enderror"
                                   id="ram_modules" name="ram_modules"
                                   placeholder="Modules" value="{{ old('ram_modules') }}">
                            <label for="ram_modules">Modules</label>
                            @error('ram_modules')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_voltage') is-invalid @enderror"
                                   id="ram_voltage" name="ram_voltage"
                                   placeholder="Voltage (V)" value="{{ old('ram_voltage') }}">
                            <label for="ram_voltage">Voltage (V)</label>
                            @error('ram_voltage')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('ram_timings') is-invalid @enderror"
                                   id="ram_timings" name="ram_timings"
                                   placeholder="Memory Timings" value="{{ old('ram_timings') }}">
                            <label for="ram_timings">Memory Timings</label>
                            @error('ram_timings')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="ram_ecc_memory" name="ram_ecc_memory">
                                <option value="0" @if (!old('ram_ecc_memory')) selected @endif>No</option>
                                <option value="1" @if (old('ram_ecc_memory')) selected @endif>Yes</option>
                            </select>
                            <label for="ram_ecc_memory">ECC Memory</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="ram_registered_memory" name="ram_registered_memory">
                                <option value="0" @if (!old('ram_registered_memory')) selected @endif>No</option>
                                <option value="1" @if (old('ram_registered_memory')) selected @endif>Yes</option>
                            </select>
                            <label for="ram_registered_memory">Registered Memory</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="ram_heat_spreader" name="ram_heat_spreader">
                                <option value="0" @if (!old('ram_heat_spreader')) selected @endif>No</option>
                                <option value="1" @if (old('ram_heat_spreader')) selected @endif>Yes</option>
                            </select>
                            <label for="ram_heat_spreader">Heat Spreader</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Storage -->
    <div class="modal fade" id="add_storage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="add_storage_label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.dashboard.add_storage') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_storage_label">Storage</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Component Attributes -->

                        <div class="mb-3">
                            <label for="storage_image" class="form-label">Component Image</label>
                            <input class="form-control @error('storage_image') is-invalid @enderror" type="file"
                                   id="storage_image" name="storage_image">
                            @error('storage_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_name') is-invalid @enderror"
                                   id="storage_name" name="storage_name"
                                   placeholder="Component Name" value="{{ old('storage_name') }}">
                            <label for="storage_name">Component Name</label>
                            @error('storage_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_manufacturer') is-invalid @enderror"
                                   id="storage_manufacturer"
                                   name="storage_manufacturer"
                                   placeholder="Manufacturer" value="{{ old('storage_manufacturer') }}">
                            <label for="storage_manufacturer">Manufacturer</label>
                            @error('storage_manufacturer')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_series') is-invalid @enderror"
                                   id="storage_series" name="storage_series"
                                   placeholder="Series" value="{{ old('storage_series') }}">
                            <label for="storage_series">Series</label>
                            @error('storage_series')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_model') is-invalid @enderror"
                                   id="storage_model" name="storage_model"
                                   placeholder="Model" value="{{ old('storage_model') }}">
                            <label for="storage_model">Model</label>
                            @error('storage_model')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_color') is-invalid @enderror"
                                   id="storage_color" name="storage_color"
                                   placeholder="Color" value="{{ old('storage_color') }}">
                            <label for="storage_color">Color</label>
                            @error('storage_color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('storage_length') is-invalid @enderror"
                                           id="storage_length" name="storage_length"
                                           placeholder="Length (mm)" value="{{ old('storage_length') }}">
                                    <label for="storage_length">Length (mm)</label>
                                    @error('storage_length')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('storage_width') is-invalid @enderror"
                                           id="storage_width" name="storage_width"
                                           placeholder="Width (mm)" value="{{ old('storage_width') }}">
                                    <label for="storage_width">Width (mm)</label>
                                    @error('storage_width')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text"
                                           class="form-control @error('storage_height') is-invalid @enderror"
                                           id="storage_height" name="storage_height"
                                           placeholder="Height (mm)" value="{{ old('storage_height') }}">
                                    <label for="storage_height">Height (mm)</label>
                                    @error('storage_height')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Storage Attributes -->

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_type') is-invalid @enderror"
                                   id="storage_type" name="storage_type"
                                   placeholder="Storage Type" value="{{ old('storage_type') }}">
                            <label for="storage_type">Storage Type</label>
                            @error('storage_type')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_capacity') is-invalid @enderror"
                                   id="storage_capacity" name="storage_capacity"
                                   placeholder="Storage Capacity (GB)" value="{{ old('storage_capacity') }}">
                            <label for="storage_capacity">Storage Capacity (GB)</label>
                            @error('storage_capacity')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_interface') is-invalid @enderror"
                                   id="storage_interface" name="storage_interface"
                                   placeholder="Interface" value="{{ old('storage_interface') }}">
                            <label for="storage_interface">Interface</label>
                            @error('storage_interface')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_form_factor') is-invalid @enderror"
                                   id="storage_form_factor" name="storage_form_factor"
                                   placeholder="Form Factor" value="{{ old('storage_form_factor') }}">
                            <label for="storage_form_factor">Form Factor</label>
                            @error('storage_form_factor')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('storage_cache') is-invalid @enderror"
                                   id="storage_cache" name="storage_cache"
                                   placeholder="Storage Cache (MB)" value="{{ old('storage_cache') }}">
                            <label for="storage_cache">Storage Cache (MB)</label>
                            @error('storage_cache')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="storage_nvme" name="storage_nvme">
                                <option value="0" @if (!old('storage_nvme')) selected @endif>No</option>
                                <option value="1" @if (old('storage_nvme')) selected @endif>Yes</option>
                            </select>
                            <label for="storage_nvme">NVMe</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add PSU -->
    <div class="modal fade" id="add_psu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="add_psu_label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.dashboard.add_psu') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_psu_label">PSU</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Component Attributes -->

                        <div class="mb-3">
                            <label for="psu_image" class="form-label">Component Image</label>
                            <input class="form-control @error('psu_image') is-invalid @enderror" type="file"
                                   id="psu_image" name="psu_image">
                            @error('psu_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_name') is-invalid @enderror"
                                   id="psu_name" name="psu_name"
                                   placeholder="Component Name" value="{{ old('psu_name') }}">
                            <label for="psu_name">Component Name</label>
                            @error('psu_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_manufacturer') is-invalid @enderror"
                                   id="psu_manufacturer" name="psu_manufacturer"
                                   placeholder="Manufacturer" value="{{ old('psu_manufacturer') }}">
                            <label for="psu_manufacturer">Manufacturer</label>
                            @error('psu_manufacturer')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_series') is-invalid @enderror"
                                   id="psu_series" name="psu_series"
                                   placeholder="Series" value="{{ old('psu_series') }}">
                            <label for="psu_series">Series</label>
                            @error('psu_series')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_model') is-invalid @enderror"
                                   id="psu_model" name="psu_model" placeholder="Model" value="{{ old('psu_model') }}">
                            <label for="psu_model">Model</label>
                            @error('psu_model')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_color') is-invalid @enderror"
                                   id="psu_color" name="psu_color" placeholder="Color" value="{{ old('psu_color') }}">
                            <label for="psu_color">Color</label>
                            @error('psu_color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('psu_length') is-invalid @enderror"
                                           id="psu_length" name="psu_length"
                                           placeholder="Length (mm)" value="{{ old('psu_length') }}">
                                    <label for="psu_length">Length (mm)</label>
                                    @error('psu_length')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('psu_width') is-invalid @enderror"
                                           id="psu_width" name="psu_width"
                                           placeholder="Width (mm)" value="{{ old('psu_width') }}">
                                    <label for="psu_width">Width (mm)</label>
                                    @error('psu_width')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('psu_height') is-invalid @enderror"
                                           id="psu_height" name="psu_height"
                                           placeholder="Height (mm)" value="{{ old('psu_height') }}">
                                    <label for="psu_height">Height (mm)</label>
                                    @error('psu_height')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- PSU Attributes -->

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_form_factor') is-invalid @enderror"
                                   id="psu_form_factor" name="psu_form_factor"
                                   placeholder="Form Factor" value="{{ old('psu_form_factor') }}">
                            <label for="psu_form_factor">Form Factor</label>
                            @error('psu_form_factor')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_wattage') is-invalid @enderror"
                                   id="psu_wattage" name="psu_wattage"
                                   placeholder="Wattage (W)" value="{{ old('psu_wattage') }}">
                            <label for="psu_wattage">Wattage (W)</label>
                            @error('psu_wattage')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('psu_efficiency_rating') is-invalid @enderror"
                                   id="psu_efficiency_rating"
                                   name="psu_efficiency_rating"
                                   placeholder="Efficiency Rating" value="{{ old('psu_efficiency_rating') }}">
                            <label for="psu_efficiency_rating">Efficiency Rating</label>
                            @error('psu_efficiency_rating')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="psu_modular" name="psu_modular">
                                <option value="None">Non-Modular</option>
                                <option value="Semi">Semi-Modular</option>
                                <option value="Full">Fully-Modular</option>
                            </select>
                            <label for="psu_modular">Modular</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('psu_atx_connector') is-invalid @enderror"
                                   id="psu_atx_connector" name="psu_atx_connector"
                                   min="0"
                                   max="16"
                                   placeholder="ATX Connector" value="{{ old('psu_atx_connector') }}">
                            <label for="psu_atx_connector">ATX Connector</label>
                            @error('psu_atx_connector')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('psu_eps_connector') is-invalid @enderror"
                                   id="psu_eps_connector" name="psu_eps_connector"
                                   min="0"
                                   max="16"
                                   placeholder="EPS Connector" value="{{ old('psu_eps_connector') }}">
                            <label for="psu_eps_connector">EPS Connector</label>
                            @error('psu_eps_connector')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('psu_sata_connector') is-invalid @enderror"
                                   id="psu_sata_connector" name="psu_sata_connector"
                                   min="0"
                                   max="16"
                                   placeholder="SATA Connector" value="{{ old('psu_sata_connector') }}">
                            <label for="psu_sata_connector">SATA Connector</label>
                            @error('psu_sata_connector')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('psu_molex_connector') is-invalid @enderror"
                                   id="psu_molex_connector"
                                   name="psu_molex_connector" min="0"
                                   max="16"
                                   placeholder="Molex 4-pin Connector" value="{{ old('psu_molex_connector') }}">
                            <label for="psu_molex_connector">Molex 4-pin Connector</label>
                            @error('psu_molex_connector')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('psu_pcie_8pin_connector') is-invalid @enderror"
                                   id="psu_pcie_8pin_connector"
                                   name="psu_pcie_8pin_connector" min="0"
                                   max="16"
                                   placeholder="PCIe 8-pin Connector" value="{{ old('psu_pcie_8pin_connector') }}">
                            <label for="psu_pcie_8pin_connector">PCIe 8-pin Connector</label>
                            @error('psu_pcie_8pin_connector')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('psu_pcie_62pin_connector') is-invalid @enderror"
                                   id="psu_pcie_62pin_connector"
                                   name="psu_pcie_62pin_connector" min="0"
                                   max="16"
                                   placeholder="PCIe 6+2-pin Connector" value="{{ old('psu_pcie_62pin_connector') }}">
                            <label for="psu_pcie_62pin_connector">PCIe 6+2-pin Connector</label>
                            @error('psu_pcie_62pin_connector')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('psu_pcie_6pin_connector') is-invalid @enderror"
                                   id="psu_pcie_6pin_connector"
                                   name="psu_pcie_6pin_connector" min="0"
                                   max="16"
                                   placeholder="PCIe 6-pin Connector" value="{{ old('psu_pcie_6pin_connector') }}">
                            <label for="psu_pcie_6pin_connector">PCIe 6-pin Connector</label>
                            @error('psu_pcie_6pin_connector')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Computer Case -->
    <div class="modal fade" id="add_computer_case" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="add_computer_case_label" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.dashboard.add_computer_case') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add_computer_case_label">Computer Case</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Component Attributes -->

                        <div class="mb-3">
                            <label for="case_image" class="form-label">Component Image</label>
                            <input class="form-control @error('case_image') is-invalid @enderror" type="file"
                                   id="case_image" name="case_image">
                            @error('case_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_name') is-invalid @enderror"
                                   id="case_name" name="case_name"
                                   placeholder="Component Name" value="{{ old('case_name') }}">
                            <label for="case_name">Component Name</label>
                            @error('case_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_manufacturer') is-invalid @enderror"
                                   id="case_manufacturer" name="case_manufacturer"
                                   placeholder="Manufacturer" value="{{ old('case_manufacturer') }}">
                            <label for="case_manufacturer">Manufacturer</label>
                            @error('case_manufacturer')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_series') is-invalid @enderror"
                                   id="case_series" name="case_series"
                                   placeholder="Series" value="{{ old('case_series') }}">
                            <label for="case_series">Series</label>
                            @error('case_series')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_model') is-invalid @enderror"
                                   id="case_model" name="case_model"
                                   placeholder="Model" value="{{ old('case_model') }}">
                            <label for="case_model">Model</label>
                            @error('case_model')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_color') is-invalid @enderror"
                                   id="case_color" name="case_color"
                                   placeholder="Color" value="{{ old('case_color') }}">
                            <label for="case_color">Color</label>
                            @error('case_color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('case_length') is-invalid @enderror"
                                           id="case_length" name="case_length"
                                           placeholder="Length (mm)" value="{{ old('case_length') }}">
                                    <label for="case_length">Length (mm)</label>
                                    @error('case_length')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('case_width') is-invalid @enderror"
                                           id="case_width" name="case_width"
                                           placeholder="Width (mm)" value="{{ old('case_width') }}">
                                    <label for="case_width">Width (mm)</label>
                                    @error('case_width')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('case_height') is-invalid @enderror"
                                           id="case_height" name="case_height"
                                           placeholder="Height (mm)" value="{{ old('case_height') }}">
                                    <label for="case_height">Height (mm)</label>
                                    @error('case_height')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Computer Case Attributes -->

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_type') is-invalid @enderror"
                                   id="case_type" name="case_type"
                                   placeholder="Computer Case Type" value="{{ old('case_type') }}">
                            <label for="case_type">Computer Case Type</label>
                            @error('case_type')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="case_mobo_form_factor form-control" multiple="multiple" style="width: 100%"
                                    name="case_mobo_form_factor[]" id="case_mobo_form_factor">
                                @foreach($mobo_form_factors as $mobo_form_factor)
                                    <option
                                        @if(old('case_mobo_form_factor') !== null && in_array($mobo_form_factor->id,old('case_mobo_form_factor'))) selected
                                        @endif value="{{ $mobo_form_factor->id }}">{{ $mobo_form_factor->name }}</option>
                                @endforeach
                                @if(old('case_mobo_form_factor') !== null)
                                    @foreach(old('case_mobo_form_factor') as $mobo_form_factor_name)
                                        @if(!filter_var($mobo_form_factor_name,FILTER_VALIDATE_INT))
                                            <option selected
                                                    value="{{ $mobo_form_factor_name }}">{{ $mobo_form_factor_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('case_mobo_form_factor')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_power_supply') is-invalid @enderror"
                                   id="case_power_supply" name="case_power_supply"
                                   placeholder="Power Supply" value="{{ old('case_power_supply') }}">
                            <label for="case_power_supply">Power Supply</label>
                            @error('case_power_supply')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="case_power_supply_shroud" name="case_power_supply_shroud">
                                <option value="0" @if (!old('case_power_supply_shroud')) selected @endif>No</option>
                                <option value="1" @if (old('case_power_supply_shroud')) selected @endif>Yes</option>
                            </select>
                            <label for="case_power_supply_shroud">Power Supply Shroud</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('case_side_panel_window') is-invalid @enderror"
                                   id="case_side_panel_window"
                                   name="case_side_panel_window"
                                   placeholder="Side Panel Window" value="{{ old('case_side_panel_window') }}">
                            <label for="case_side_panel_window">Side Panel Window</label>
                            @error('case_side_panel_window')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="case_water_cooled_support" name="case_water_cooled_support">
                                <option value="0" @if (!old('case_water_cooled_support')) selected @endif>No</option>
                                <option value="1" @if (old('case_water_cooled_support')) selected @endif>Yes</option>
                            </select>
                            <label for="case_water_cooled_support">Water Cooled Support</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_cooler_clearance') is-invalid @enderror"
                                   id="case_cooler_clearance"
                                   name="case_cooler_clearance"
                                   placeholder="Cooler Clearance (mm)" value="{{ old('case_cooler_clearance') }}">
                            <label for="case_cooler_clearance">Cooler Clearance (mm)</label>
                            @error('case_cooler_clearance')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                   class="form-control @error('case_graphics_clearance') is-invalid @enderror"
                                   id="case_graphics_clearance"
                                   name="case_graphics_clearance"
                                   placeholder="Graphics Card Clearance (mm)"
                                   value="{{ old('case_graphics_clearance') }}">
                            <label for="case_graphics_clearance">Graphics Card Clearance (mm)</label>
                            @error('case_graphics_clearance')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('case_psu_clearance') is-invalid @enderror"
                                   id="case_psu_clearance" name="case_psu_clearance"
                                   placeholder="PSU Clearance (mm)" value="{{ old('case_psu_clearance') }}">
                            <label for="case_psu_clearance">PSU Clearance (mm)</label>
                            @error('case_psu_clearance')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('case_full_height_e_slot') is-invalid @enderror"
                                   id="case_full_height_e_slot"
                                   name="case_full_height_e_slot"
                                   min="0"
                                   max="16"
                                   placeholder="Full-Height Expansion Slot"
                                   value="{{ old('case_full_height_e_slot') }}">
                            <label for="case_full_height_e_slot">Full-Height Expansion Slot</label>
                            @error('case_full_height_e_slot')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('case_half_height_e_slot') is-invalid @enderror"
                                   id="case_half_height_e_slot"
                                   name="case_half_height_e_slot"
                                   min="0"
                                   max="16"
                                   placeholder="Half-Height Expansion Slot"
                                   value="{{ old('case_half_height_e_slot') }}">
                            <label for="case_half_height_e_slot">Half-Height Expansion Slot</label>
                            @error('case_half_height_e_slot')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('case_external_525_bay') is-invalid @enderror"
                                   id="case_external_525_bay"
                                   name="case_external_525_bay"
                                   min="0"
                                   max="16"
                                   placeholder="External 5.25&quot; Bay" value="{{ old('case_external_525_bay') }}">
                            <label for="case_external_525_bay">External 5.25" Bay</label>
                            @error('case_external_525_bay')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('case_external_350_bay') is-invalid @enderror"
                                   id="case_external_350_bay"
                                   name="case_external_350_bay"
                                   min="0"
                                   max="16"
                                   placeholder="External 3.5&quot; Bay" value="{{ old('case_external_350_bay') }}">
                            <label for="case_external_350_bay">External 3.5" Bay</label>
                            @error('case_external_350_bay')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('case_internal_350_bay') is-invalid @enderror"
                                   id="case_internal_350_bay"
                                   name="case_internal_350_bay"
                                   min="0"
                                   max="16"
                                   placeholder="Internal 3.5&quot; Bay" value="{{ old('case_internal_350_bay') }}">
                            <label for="case_internal_350_bay">Internal 3.5" Bay</label>
                            @error('case_internal_350_bay')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number"
                                   class="form-control @error('case_internal_250_bay') is-invalid @enderror"
                                   id="case_internal_250_bay"
                                   name="case_internal_250_bay"
                                   min="0"
                                   max="16"
                                   placeholder="Internal 2.5&quot; Bay" value="{{ old('case_internal_250_bay') }}">
                            <label for="case_internal_250_bay">Internal 2.5" Bay</label>
                            @error('case_internal_250_bay')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('select2')
    <script>
        $(document).ready(function () {
            $('.cpu_cooler_cpu_socket').select2({
                dropdownParent: $('#add_cpu_cooler'),
                placeholder: "CPU Socket",
                allowClear: true,
                tags: true
            });
            $('.case_mobo_form_factor').select2({
                dropdownParent: $('#add_computer_case'),
                placeholder: "Motherboard Form Factor",
                allowClear: true,
                tags: true
            });
            @stack('select2_modals')
        });
    </script>
@endpush
