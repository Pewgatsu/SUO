<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Motherboard</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($motherboard) && isset($motherboard->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{ asset('images/motherboards/' . $motherboard->component->image_path) }}" alt="">
                        @endif
                        <label for="mobo_image" class="form-label">Component Image</label>
                        <input class="form-control @error('mobo_image') is-invalid @enderror" type="file"
                               id="mobo_image" name="mobo_image">
                        @error('mobo_image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_name') is-invalid @enderror"
                               id="mobo_name" name="mobo_name"
                               placeholder="Component Name" value="{{ old('mobo_name') ?? $oldField('mobo_name') }}">
                        <label for="mobo_name">Component Name</label>
                        @error('mobo_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_manufacturer') is-invalid @enderror"
                               id="mobo_manufacturer" name="mobo_manufacturer"
                               placeholder="Manufacturer"
                               value="{{ old('mobo_manufacturer') ?? $oldField('mobo_manufacturer') }}">
                        <label for="mobo_manufacturer">Manufacturer</label>
                        @error('mobo_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_series') is-invalid @enderror"
                               id="mobo_series" name="mobo_series"
                               placeholder="Series" value="{{ old('mobo_series') ?? $oldField('mobo_series') }}">
                        <label for="mobo_series">Series</label>
                        @error('mobo_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_model') is-invalid @enderror"
                               id="mobo_model" name="mobo_model"
                               placeholder="Model" value="{{ old('mobo_model') ?? $oldField('mobo_model') }}">
                        <label for="mobo_model">Model</label>
                        @error('mobo_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_color') is-invalid @enderror"
                               id="mobo_color" name="mobo_color"
                               placeholder="Color" value="{{ old('mobo_color') ?? $oldField('mobo_color') }}">
                        <label for="mobo_color">Color</label>
                        @error('mobo_color')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('mobo_length') is-invalid @enderror"
                                       id="mobo_length" name="mobo_length"
                                       placeholder="Length (mm)"
                                       value="{{ old('mobo_length') ?? $oldField('mobo_length') }}">
                                <label for="mobo_length">Length (mm)</label>
                                @error('mobo_length')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('mobo_width') is-invalid @enderror"
                                       id="mobo_width" name="mobo_width"
                                       placeholder="Width (mm)"
                                       value="{{ old('mobo_width') ?? $oldField('mobo_width') }}">
                                <label for="mobo_width">Width (mm)</label>
                                @error('mobo_width')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('mobo_height') is-invalid @enderror"
                                       id="mobo_height" name="mobo_height"
                                       placeholder="Height (mm)"
                                       value="{{ old('mobo_height') ?? $oldField('mobo_height') }}">
                                <label for="mobo_height">Height (mm)</label>
                                @error('mobo_height')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Motherboard Attributes -->

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_cpu_socket') is-invalid @enderror"
                               id="mobo_cpu_socket" name="mobo_cpu_socket"
                               placeholder="CPU Socket"
                               value="{{ old('mobo_cpu_socket') ?? $oldField('mobo_cpu_socket') }}">
                        <label for="mobo_cpu_socket">CPU Socket</label>
                        @error('mobo_cpu_socket')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_form_factor') is-invalid @enderror"
                               id="mobo_form_factor" name="mobo_form_factor"
                               placeholder="Form Factor"
                               value="{{ old('mobo_form_factor') ?? $oldField('mobo_form_factor') }}">
                        <label for="mobo_form_factor">Form Factor</label>
                        @error('mobo_form_factor')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_chipset') is-invalid @enderror"
                               id="mobo_chipset" name="mobo_chipset"
                               placeholder="Chipset" value="{{ old('mobo_chipset') ?? $oldField('mobo_chipset') }}">
                        <label for="mobo_chipset">Chipset</label>
                        @error('mobo_chipset')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_memory_slot') is-invalid @enderror"
                               id="mobo_memory_slot" name="mobo_memory_slot"
                               min="0" max="16"
                               placeholder="Memory Slot"
                               value="{{ old('mobo_memory_slot') ?? $oldField('mobo_memory_slot') }}">
                        <label for="mobo_memory_slot">Memory Slot</label>
                        @error('mobo_memory_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_memory_type') is-invalid @enderror"
                               id="mobo_memory_type" name="mobo_memory_type"
                               placeholder="Memory Type"
                               value="{{ old('mobo_memory_type') ?? $oldField('mobo_memory_type') }}">
                        <label for="mobo_memory_type">Memory Type</label>
                        @error('mobo_memory_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_max_mem_support') is-invalid @enderror"
                               id="mobo_max_mem_support"
                               name="mobo_max_mem_support"
                               placeholder="Maximum Memory Support (GB)"
                               value="{{ old('mobo_max_mem_support') ?? $oldField('mobo_max_mem_support') }}">
                        <label for="mobo_max_mem_support">Maximum Memory Support (GB)</label>
                        @error('mobo_max_mem_support')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="{{ $setMemorySpeedID() }} form-control @error($setMemorySpeedID()) is-invalid @enderror" multiple="multiple" style="width: 100%"
                                name="{{ $setMemorySpeedID() }}[]" id="{{ $setMemorySpeedID() }}">
                            @foreach($memorySpeeds as $memory_speed)
                                <option
                                    @if((old($setMemorySpeedID()) !== null && in_array($memory_speed->id,old($setMemorySpeedID()))) ||
                                    ($oldMemorySpeedField() !== null && in_array($memory_speed->id,$oldMemorySpeedField()))) selected
                                    @endif value="{{ $memory_speed->id }}">{{ $memory_speed->name }}</option>
                            @endforeach
                            @if(old($setMemorySpeedID()) !== null)
                                @foreach(old($setMemorySpeedID()) as $memory_speed_name)
                                    @if(!filter_var($memory_speed_name,FILTER_VALIDATE_INT))
                                        <option selected
                                                value="{{ $memory_speed_name }}">{{ $memory_speed_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @error($setMemorySpeedID())
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_pcie_x16_slot') is-invalid @enderror"
                               id="mobo_pcie_x16_slot" name="mobo_pcie_x16_slot"
                               min="0" max="16"
                               placeholder="PCIe x16 Slot"
                               value="{{ old('mobo_pcie_x16_slot') ?? $oldField('mobo_pcie_x16_slot') }}">
                        <label for="mobo_pcie_x16_slot">PCIe x16 Slot</label>
                        @error('mobo_pcie_x16_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_pcie_x8_slot') is-invalid @enderror"
                               id="mobo_pcie_x8_slot" name="mobo_pcie_x8_slot"
                               min="0" max="16"
                               placeholder="PCIe x8 Slot"
                               value="{{ old('mobo_pcie_x8_slot') ?? $oldField('mobo_pcie_x8_slot') }}">
                        <label for="mobo_pcie_x8_slot">PCIe x8 Slot</label>
                        @error('mobo_pcie_x8_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_pcie_x4_slot') is-invalid @enderror"
                               id="mobo_pcie_x4_slot" name="mobo_pcie_x4_slot"
                               min="0" max="16"
                               placeholder="PCIe x4 Slot"
                               value="{{ old('mobo_pcie_x4_slot') ?? $oldField('mobo_pcie_x4_slot') }}">
                        <label for="mobo_pcie_x4_slot">PCIe x4 Slot</label>
                        @error('mobo_pcie_x4_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_pcie_x1_slot') is-invalid @enderror"
                               id="mobo_pcie_x1_slot" name="mobo_pcie_x1_slot"
                               min="0" max="16"
                               placeholder="PCIe x1 Slot"
                               value="{{ old('mobo_pcie_x1_slot') ?? $oldField('mobo_pcie_x1_slot') }}">
                        <label for="mobo_pcie_x1_slot">PCIe x1 Slot</label>
                        @error('mobo_pcie_x1_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_pci_slot') is-invalid @enderror"
                               id="mobo_pci_slot" name="mobo_pci_slot" min="0"
                               max="16"
                               placeholder="PCI Slot" value="{{ old('mobo_pci_slot') ?? $oldField('mobo_pci_slot') }}">
                        <label for="mobo_pci_slot">PCI Slot</label>
                        @error('mobo_pci_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_m2_slot') is-invalid @enderror"
                               id="mobo_m2_slot" name="mobo_m2_slot" min="0"
                               max="16"
                               placeholder="M.2 Slot" value="{{ old('mobo_m2_slot') ?? $oldField('mobo_m2_slot') }}">
                        <label for="mobo_m2_slot">M.2 Slot</label>
                        @error('mobo_m2_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_sata_6gb_slot') is-invalid @enderror"
                               id="mobo_sata_6gb_slot" name="mobo_sata_6gb_slot"
                               min="0" max="16"
                               placeholder="SATA 6 Gb/s Slot"
                               value="{{ old('mobo_sata_6gb_slot') ?? $oldField('mobo_sata_6gb_slot') }}">
                        <label for="mobo_sata_6gb_slot">SATA 6 Gb/s Slot</label>
                        @error('mobo_sata_6gb_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_sata_3gb_slot') is-invalid @enderror"
                               id="mobo_sata_3gb_slot" name="mobo_sata_3gb_slot"
                               min="0" max="16"
                               placeholder="SATA 3 Gb/s Slot"
                               value="{{ old('mobo_sata_3gb_slot') ?? $oldField('mobo_sata_3gb_slot') }}">
                        <label for="mobo_sata_3gb_slot">SATA 3 Gb/s Slot</label>
                        @error('mobo_sata_3gb_slot')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('mobo_multigraphics_support') is-invalid @enderror"
                               id="mobo_multigraphics_support"
                               name="mobo_multigraphics_support"
                               placeholder="Multigraphics Support"
                               value="{{ old('mobo_multigraphics_support') ?? $oldField('mobo_multigraphics_support') }}">
                        <label for="mobo_multigraphics_support">Multigraphics Support</label>
                        @error('mobo_multigraphics_support')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_ecc_support" name="mobo_ecc_support">
                            <option value="0"
                                    @if (!(old('mobo_ecc_support') ?? $oldField('mobo_ecc_support'))) selected @endif>No
                            </option>
                            <option value="1"
                                    @if (old('mobo_ecc_support') ?? $oldField('mobo_ecc_support')) selected @endif>Yes
                            </option>
                        </select>
                        <label for="mobo_ecc_support">ECC Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_raid_support" name="mobo_raid_support">
                            <option value="0"
                                    @if (!(old('mobo_raid_support') ?? $oldField('mobo_raid_support'))) selected @endif>
                                No
                            </option>
                            <option value="1"
                                    @if (old('mobo_raid_support') ?? $oldField('mobo_raid_support')) selected @endif>Yes
                            </option>
                        </select>
                        <label for="mobo_raid_support">RAID Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('mobo_wireless_support') is-invalid @enderror"
                               id="mobo_wireless_support"
                               name="mobo_wireless_support"
                               placeholder="Wireless Support"
                               value="{{ old('mobo_wireless_support') ?? $oldField('mobo_wireless_support') }}">
                        <label for="mobo_wireless_support">Wireless Support</label>
                        @error('mobo_wireless_support')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">{{ $setTitle() }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    @push('select2_modals')
    $('#{{ $setMemorySpeedID() }}').select2({
        dropdownParent: $('#{{ $setID() }}'),
        placeholder: "Motherboard Speed Support",
        allowClear: true,
        tags: true
    });
    @endpush
</script>
