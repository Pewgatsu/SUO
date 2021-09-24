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


    <!-- Add Motherboard -->
    <x-component.motherboard :memorySpeeds="$memory_speeds" mode="add" />

    <!-- Add CPU -->
    <x-component.cpu mode="add" />

    <!-- Add CPU Cooler -->
    <x-component.cpu-cooler :cpuSockets="$cpu_sockets" mode="add" />

    <!-- Add Graphics Card -->
    <x-component.graphics-card mode="add" />

    <!-- Add RAM -->
    <x-component.ram mode="add" />

    <!-- Add Storage -->
    <x-component.storage mode="add" />

    <!-- Add PSU -->
    <x-component.psu mode="add" />

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
