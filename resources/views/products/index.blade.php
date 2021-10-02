@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
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
                @elseif(isset($cases_products))
                    <i class="fas fa-suitcase"></i>
                    <small> Computer Case</small>
                @endif
            </div>
        </div>
    </div>

    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if(isset($motherboard_products))
                        @if($motherboard_products->count())
                            <div class="table-responsive text-center">
                                <table id="motherboard_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Component Name</th>
                                        <th>CPU Socket</th>
                                        <th>Form Factor</th>
                                        <th>Chipset</th>
                                        <th>Price</th>
                                        <th>Owner</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($motherboard_products as $motherboard_product)
                                        <tr>
                                            <td>{{ $motherboard_product->component->image_path }}</td>
                                            <td>{{ $motherboard_product->component->name }}</td>
                                            <td>{{ $motherboard_product->component->motherboard->cpu_socket }}</td>
                                            <td>{{ $motherboard_product->component->motherboard->mobo_form_factor }}</td>
                                            <td>{{ $motherboard_product->component->motherboard->mobo_chipset }}</td>
                                            <td>{{ $motherboard_product->price }}</td>
                                            <td>
                                                <!-- Add Button -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $motherboard_products->links() }}
                                </div>
                                @else
                                    <p class="lead text-center">No Motherboards</p>
                                @endif
                                @elseif(isset($cpu_products))
                                    @if($cpu_products->count())
                                        <div class="table-responsive text-center">
                                            <table id="cpu_table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Component Name</th>
                                                    <th>CPU Socket</th>
                                                    <th>Microarchitecture</th>
                                                    <th>Base Clock</th>
                                                    <th>Price</th>
                                                    <th>Owner</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cpu_products as $cpu_product)
                                                    <tr>
                                                        <td>{{ $cpu_product->component->image_path }}</td>
                                                        <td>{{ $cpu_product->component->name }}</td>
                                                        <td>{{ $cpu_product->component->cpu->cpu_socket }}</td>
                                                        <td>{{ $cpu_product->component->cpu->microarchitecture }}</td>
                                                        <td>{{ $cpu_product->component->cpu->base_clock }}</td>
                                                        <td>{{ $cpu_product->price }}</td>
                                                        <td>
                                                            <!-- Owner -->
                                                        </td>
                                                        <td>
                                                            <!-- Add Button -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $cpu_products->links() }}
                                            </div>
                                        </div>
                                    @else
                                        <p class="lead text-center">No CPUS</p>
                                    @endif
                                @elseif(isset($cpu_cooler_products))
                                    @if($cpu_cooler_products->count())
                                        <div class="table-responsive text-center">
                                            <table id="cpu_cooler_table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Component Name</th>
                                                    <th>Fan Speed</th>
                                                    <th>Noise Level</th>
                                                    <th>Water Cooled Support</th>
                                                    <th>Price</th>
                                                    <th>Owner</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cpu_cooler_products as $cpu_cooler_product)
                                                    <tr>
                                                        <td>{{ $cpu_cooler_product->component->image_path }}</td>
                                                        <td>{{ $cpu_cooler_product->component->name }}</td>
                                                        <td>{{ $cpu_cooler_product->component->cpu_cooler->fan_speed }}</td>
                                                        <td>{{ $cpu_cooler_product->component->cpu_cooler->noise_level }}</td>
                                                        <td>{{ $cpu_cooler_product->component->cpu_cooler->water_cooled_support }}</td>
                                                        <td>
                                                            <!-- Owner -->
                                                        </td>
                                                        <td>
                                                            <!-- Add Button -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $cpu_cooler_products->links() }}
                                            </div>
                                        </div>
                                    @else
                                        <p class="lead text-center">No CPU Coolers</p>
                                    @endif
                                @elseif(isset($graphics_card_products))
                                    @if($graphics_card_products->count())
                                        <div class="table-responsive text-center">
                                            <table id="graphics_card_table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Component Name</th>
                                                    <th>Chipset</th>
                                                    <th>Base Clock</th>
                                                    <th>Interface</th>
                                                    <th>Price</th>
                                                    <th>Owner</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($graphics_card_products as $graphics_card_product)
                                                    <tr>
                                                        <td>{{ $graphics_card_product->component->image_path }}</td>
                                                        <td>{{ $graphics_card_product->component->name }}</td>
                                                        <td>{{ $graphics_card_product->component->graphics_card->gpu_chipset }}</td>
                                                        <td>{{ $graphics_card_product->component->graphics_card->base_clock }}</td>
                                                        <td>{{ $graphics_card_product->component->graphics_card->interface }}</td>
                                                        <td>
                                                            <!-- Owner -->
                                                        </td>
                                                        <td>
                                                            <!-- Add Button -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $graphics_card_products->links() }}
                                            </div>
                                        </div>
                                    @else
                                        <p class="lead text-center">No Graphics Cards</p>
                                    @endif
                                @elseif(isset($ram_products))
                                    @if($ram_products->count())
                                        <div class="table-responsive text-center">
                                            <table id="ram_table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Component Name</th>
                                                    <th>Type</th>
                                                    <th>Speed</th>
                                                    <th>Form Factor</th>
                                                    <th>Price</th>
                                                    <th>Owner</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($ram_products as $ram_product)
                                                    <tr>
                                                        <td>{{ $ram_product->component->image_path }}</td>
                                                        <td>{{ $ram_product->component->name }}</td>
                                                        <td>{{ $ram_product->component->ram->memory_type }}</td>
                                                        <td>{{ $ram_product->component->ram->memory_speed }}</td>
                                                        <td>{{ $ram_product->component->ram->memory_form_factor }}</td>
                                                        <td>
                                                            <!-- Owner -->
                                                        </td>
                                                        <td>
                                                            <!-- Add Button -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $ram_products->links() }}
                                            </div>
                                        </div>
                                    @else
                                        <p class="lead text-center">No RAMS</p>
                                    @endif
                                @elseif(isset($storage_products))
                                    @if($storage_products->count())
                                        <div class="table-responsive text-center">
                                            <table id="storage_table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Component ID</th>
                                                    <th>Component Name</th>
                                                    <th>Type</th>
                                                    <th>Interface</th>
                                                    <th>Form Factor</th>
                                                    <th>Price</th>
                                                    <th>Owner</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($storage_products as $storage_product)
                                                    <tr>
                                                        <td>{{ $storage_product->component->image_path }}</td>
                                                        <td>{{ $storage_product->component->name }}</td>
                                                        <td>{{ $storage_product->component->storage->storage_type }}</td>
                                                        <td>{{ $storage_product->component->storage->interface }}</td>
                                                        <td>{{ $storage_product->component->storage->storage_form_factor }}</td>
                                                        <td>
                                                            <!-- Owner -->
                                                        </td>
                                                        <td>
                                                            <!-- Add Button -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $storage_products->links() }}
                                            </div>
                                        </div>
                                    @else
                                        <p class="lead text-center">No Storages</p>
                                    @endif
                                @elseif(isset($psu_products))
                                    @if($psu_products->count())
                                        <div class="table-responsive text-center">
                                            <table id="psu_table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Component Name</th>
                                                    <th>Form Factor</th>
                                                    <th>Wattage</th>
                                                    <th>Efficiency Rating</th>
                                                    <th>Price</th>
                                                    <th>Owner</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($psu_products as $psu_product)
                                                    <tr>
                                                        <td>{{ $psu_product->component->image_path }}</td>
                                                        <td>{{ $psu_product->component->name }}</td>
                                                        <td>{{ $psu_product->component->psu->psu_form_factor }}</td>
                                                        <td>{{ $psu_product->component->psu->wattage }}</td>
                                                        <td>{{ $psu_product->component->psu->efficiency_rating }}</td>
                                                        <td>
                                                            <!-- Owner -->
                                                        </td>
                                                        <td>
                                                            <!-- Add Button -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $psu_products->links() }}
                                            </div>
                                        </div>
                                    @else
                                        <p class="lead text-center">No PSUS</p>
                                    @endif
                                @elseif(isset($case_products))
                                    @if($case_products->count())
                                        <div class="table-responsive text-center">
                                            <table id="computer_case_table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Component ID</th>
                                                    <th>Component Name</th>
                                                    <th>Type</th>
                                                    <th>Power Supply Shroud</th>
                                                    <th>Side Panel Window</th>
                                                    <th>Price</th>
                                                    <th>Owner</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($case_products as $case_product)
                                                    <tr>
                                                        <td>{{ $case_product->component->image_path }}</td>
                                                        <td>{{ $case_product->component->name }}</td>
                                                        <td>{{ $case_product->component->case->case_type }}</td>
                                                        <td>
                                                            @if($case_product->component->case->power_supply_shroud)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($case_product->component->case->side_panel_window)
                                                                Yes
                                                            @else
                                                                No
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <!-- Owner -->
                                                        </td>
                                                        <td>
                                                            <!-- Add Button -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center">
                                                {{ $case_products->links() }}
                                            </div>
                                        </div>
                                    @else
                                        <p class="lead text-center">No Computer Cases</p>
                                    @endif
                                @endif
                            </div>
                </div>
            </div>
        </div>
    </section>
@endsection
