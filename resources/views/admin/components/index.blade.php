@extends('layouts.master')
@section('content')
    @include('layouts.subheader')
    <div class="container">
        <div class="d-sm-flex my-2 justify-content-between align-items-center">
            <div class="h1">
                @if(isset($motherboards))
                    <i class="fas fa-microchip"></i>
                    <small> Motherboard</small>
                @elseif(isset($cpus))
                    <i class="bi bi-cpu-fill"></i>
                    <small> CPU</small>
                @elseif(isset($cpu_coolers))
                    <i class="far fa-snowflake"></i>
                    <small> CPU Cooler</small>
                @elseif(isset($graphics_cards))
                    <i class="fas fa-tv"></i>
                    <small> Graphics Card</small>
                @elseif(isset($rams))
                    <i class="fas fa-memory"></i>
                    <small> RAM</small>
                @elseif(isset($storages))
                    <i class="fas fa-hdd"></i>
                    <small> Storage</small>
                @elseif(isset($psus))
                    <i class="fas fa-plug"></i>
                    <small> PSU</small>
                @elseif(isset($computer_cases))
                    <i class="fas fa-suitcase"></i>
                    <small> Computer Case</small>
                @endif
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

    <!-- Motherboard Table -->
    <section class="mb-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    @if(isset($motherboards))
                        @if($motherboards->count())
                            <div class="table-responsive text-center">
                                <table id="motherboard_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>CPU Socket</th>
                                        <th>Form Factor</th>
                                        <th>Chipset</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($motherboards as $motherboard)
                                        <tr onclick="window.location='{{ route('component.motherboards.info',$motherboard) }}'">
                                            <td>{{ $motherboard->component->id }}</td>
                                            <td class="text-start">{{ $motherboard->component->name }}</td>
                                            <td>{{ $motherboard->cpu_socket }}</td>
                                            <td>{{ $motherboard->mobo_form_factor }}</td>
                                            <td>{{ $motherboard->mobo_chipset }}</td>
                                            @if(!isset($is_info))
                                            <td onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_motherboard_{{ $motherboard->component->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_motherboard_{{ $motherboard->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit Motherboard -->
                                        <x-component.motherboard :memorySpeeds="$memory_speeds" mode="edit"
                                                                 :motherboard="$motherboard"/>

                                        <!-- Delete Motherboard -->
                                        <div class="modal fade"
                                             id="delete_motherboard_{{ $motherboard->component->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_motherboard_{{ $motherboard->component->id }}_label">
                                                            Delete Motherboard</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $motherboard->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.motherboards.delete',$motherboard->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $motherboards->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Motherboards</p>
                        @endif
                    @elseif(isset($cpus))
                        @if($cpus->count())
                            <div class="table-responsive text-center">
                                <table id="cpu_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>CPU Socket</th>
                                        <th>Microarchitecture</th>
                                        <th>Base Clock</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpus as $cpu)
                                        <tr onclick="window.location='{{ route('component.cpus.info',$cpu) }}'">
                                            <td>{{ $cpu->component->id }}</td>
                                            <td class="text-start">{{ $cpu->component->name }}</td>
                                            <td>{{ $cpu->cpu_socket }}</td>
                                            <td>{{ $cpu->microarchitecture }}</td>
                                            <td>{{ $cpu->base_clock }} GHz</td>
                                            @if(!isset($is_info))
                                            <td  onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_cpu_{{ $cpu->component->id }}">Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_cpu_{{ $cpu->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit CPU -->
                                        <x-component.cpu mode="edit" :cpu="$cpu"/>

                                        <!-- Delete CPU -->
                                        <div class="modal fade"
                                             id="delete_cpu_{{ $cpu->component->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_cpu_{{ $cpu->component->id }}_label">
                                                            Delete CPU</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $cpu->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.cpus.delete',$cpu->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $cpus->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No CPUS</p>
                        @endif
                    @elseif(isset($cpu_coolers))
                        @if($cpu_coolers->count())
                            <div class="table-responsive text-center">
                                <table id="cpu_cooler_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>Fan Speed</th>
                                        <th>Noise Level</th>
                                        <th>Water Cooled Support</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cpu_coolers as $cpu_cooler)
                                        <tr onclick="window.location='{{ route('component.cpu_coolers.info',$cpu_cooler) }}'">
                                            <td>{{ $cpu_cooler->component->id }}</td>
                                            <td class="text-start">{{ $cpu_cooler->component->name }}</td>
                                            <td>{{ $cpu_cooler->fan_speed }} rpm</td>
                                            <td>{{ $cpu_cooler->noise_level }} dB</td>
                                            <td>{{ $cpu_cooler->water_cooled_support }}</td>
                                            @if(!isset($is_info))
                                            <td onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_cpu_cooler_{{ $cpu_cooler->component->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_cpu_cooler_{{ $cpu_cooler->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit CPU Cooler -->
                                        <x-component.cpu-cooler :cpuSockets="$cpu_sockets" mode="edit"
                                                                :cpuCooler="$cpu_cooler"/>

                                        <!-- Delete CPU Cooler -->
                                        <div class="modal fade"
                                             id="delete_cpu_cooler_{{ $cpu_cooler->component->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_cpu_cooler_{{ $cpu_cooler->component->id }}_label">
                                                            Delete CPU Cooler</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $cpu_cooler->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.cpu_coolers.delete',$cpu_cooler->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $cpu_coolers->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No CPU Coolers</p>
                        @endif
                    @elseif(isset($graphics_cards))
                        @if($graphics_cards->count())
                            <div class="table-responsive text-center">
                                <table id="graphics_card_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>Chipset</th>
                                        <th>Base Clock</th>
                                        <th>Interface</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($graphics_cards as $graphics_card)
                                        <tr onclick="window.location='{{ route('component.graphics_cards.info',$graphics_card) }}'">
                                            <td>{{ $graphics_card->component->id }}</td>
                                            <td class="text-start">{{ $graphics_card->component->name }}</td>
                                            <td>{{ $graphics_card->gpu_chipset }}</td>
                                            <td>{{ $graphics_card->base_clock }} MHz</td>
                                            <td>{{ $graphics_card->interface }}</td>
                                            @if(!isset($is_info))
                                            <td onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_graphics_card_{{ $graphics_card->component->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_graphics_card_{{ $graphics_card->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit Graphics Card -->
                                        <x-component.graphics-card mode="edit" :graphicsCard="$graphics_card"/>

                                        <!-- Delete Graphics Card -->
                                        <div class="modal fade"
                                             id="delete_graphics_card_{{ $graphics_card->component->id }}"
                                             tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_graphics_card_{{ $graphics_card->component->id }}_label">
                                                            Delete Graphics Card</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $graphics_card->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.graphics_cards.delete',$graphics_card->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $graphics_cards->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Graphics Cards</p>
                        @endif
                    @elseif(isset($rams))
                        @if($rams->count())
                            <div class="table-responsive text-center">
                                <table id="ram_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>Type</th>
                                        <th>Speed</th>
                                        <th>Form Factor</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rams as $ram)
                                        <tr onclick="window.location='{{ route('component.rams.info',$ram) }}'">
                                            <td>{{ $ram->component->id }}</td>
                                            <td class="text-start">{{ $ram->component->name }}</td>
                                            <td>{{ $ram->memory_type }}</td>
                                            <td>{{ $ram->memory_speed }} MHz</td>
                                            <td>{{ $ram->memory_form_factor }}</td>
                                            @if(!isset($is_info))
                                            <td onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_ram_{{ $ram->component->id }}">Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_ram_{{ $ram->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit RAM -->
                                        <x-component.ram mode="edit" :ram="$ram"/>

                                        <!-- Delete RAM -->
                                        <div class="modal fade"
                                             id="delete_ram_{{ $ram->component->id }}"
                                             tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_ram_{{ $ram->component->id }}_label">
                                                            Delete RAM</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $ram->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.rams.delete',$ram->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $rams->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No RAMS</p>
                        @endif
                    @elseif(isset($storages))
                        @if($storages->count())
                            <div class="table-responsive text-center">
                                <table id="storage_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>Type</th>
                                        <th>Interface</th>
                                        <th>Form Factor</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($storages as $storage)
                                        <tr onclick="window.location='{{ route('component.storages.info',$storage) }}'">
                                            <td>{{ $storage->component->id }}</td>
                                            <td class="text-start">{{ $storage->component->name }}</td>
                                            <td>{{ $storage->storage_type }}</td>
                                            <td>{{ $storage->interface }}</td>
                                            <td>{{ $storage->storage_form_factor }}</td>
                                            @if(!isset($is_info))
                                            <td onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_storage_{{ $storage->component->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_storage_{{ $storage->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit Storage -->
                                        <x-component.storage mode="edit" :storage="$storage"/>

                                        <!-- Delete Storage -->
                                        <div class="modal fade"
                                             id="delete_storage_{{ $storage->component->id }}"
                                             tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_storage_{{ $storage->component->id }}_label">
                                                            Delete Storage</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $storage->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.storages.delete',$storage->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $storages->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Storages</p>
                        @endif
                    @elseif(isset($psus))
                        @if($psus->count())
                            <div class="table-responsive text-center">
                                <table id="psu_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>Form Factor</th>
                                        <th>Wattage</th>
                                        <th>Efficiency Rating</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($psus as $psu)
                                        <tr onclick="window.location='{{ route('component.psus.info',$psu) }}'">
                                            <td>{{ $psu->component->id }}</td>
                                            <td class="text-start">{{ $psu->component->name }}</td>
                                            <td>{{ $psu->psu_form_factor }}</td>
                                            <td>{{ $psu->wattage }} W</td>
                                            <td>{{ $psu->efficiency_rating }}</td>
                                            @if(!isset($is_info))
                                            <td onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_psu_{{ $psu->component->id }}">Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_psu_{{ $psu->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit PSU -->
                                        <x-component.psu mode="edit" :psu="$psu"/>

                                        <!-- Delete PSU -->
                                        <div class="modal fade"
                                             id="delete_psu_{{ $psu->component->id }}"
                                             tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_psu_{{ $psu->component->id }}_label">
                                                            Delete PSU</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $psu->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.psus.delete',$psu->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $psus->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No PSUS</p>
                        @endif
                    @elseif(isset($computer_cases))
                        @if($computer_cases->count())
                            <div class="table-responsive text-center">
                                <table id="computer_case_table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Component ID</th>
                                        <th>Component Name</th>
                                        <th>Type</th>
                                        <th>Power Supply Shroud</th>
                                        <th>Side Panel Window</th>
                                        @if(!isset($is_info))<th>Action</th>@endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($computer_cases as $computer_case)
                                        <tr onclick="window.location='{{ route('component.computer_cases.info',$computer_case) }}'">
                                            <td>{{ $computer_case->component->id }}</td>
                                            <td class="text-start">{{ $computer_case->component->name }}</td>
                                            <td>{{ $computer_case->case_type }}</td>
                                            <td>
                                                @if($computer_case->power_supply_shroud)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            <td>
                                                @if($computer_case->side_panel_window)
                                                    Yes
                                                @else
                                                    No
                                                @endif
                                            </td>
                                            @if(!isset($is_info))
                                            <td onclick="event.stopPropagation();">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#edit_computer_case_{{ $computer_case->component->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#delete_computer_case_{{ $computer_case->component->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                            @endif
                                        </tr>

                                        @if(!isset($is_info))
                                        <!-- Edit Computer Case -->
                                        <x-component.computer-case :moboFormFactors="$mobo_form_factors" mode="edit"
                                                                   :computerCase="$computer_case"/>

                                        <!-- Delete Computer Case -->
                                        <div class="modal fade"
                                             id="delete_computer_case_{{ $computer_case->component->id }}"
                                             tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="delete_computer_case_{{ $computer_case->component->id }}_label">
                                                            Delete Computer Case</h5>
                                                        <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        Do you want to delete {{ $computer_case->component->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>
                                                        <form
                                                            action="{{ route('admin.components.computer_cases.delete',$computer_case->component) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-primary">Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $computer_cases->links() }}
                                </div>
                            </div>
                        @else
                            <p class="lead text-center">No Computer Cases</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>



@endsection

@push('select2')
    <script>
        $(document).ready(function () {
            @stack('select2_modals')
        });
    </script>
@endpush
