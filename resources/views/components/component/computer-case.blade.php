<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Computer Case</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($computerCase) && isset($computerCase->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{ asset('images/computer_cases/' . $computerCase->component->image_path) }}" alt="">
                        @endif
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
                               placeholder="Component Name" value="{{ old('case_name') ?? $oldField('case_name') }}">
                        <label for="case_name">Component Name</label>
                        @error('case_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('case_manufacturer') is-invalid @enderror"
                               id="case_manufacturer" name="case_manufacturer"
                               placeholder="Manufacturer" value="{{ old('case_manufacturer') ?? $oldField('case_manufacturer') }}">
                        <label for="case_manufacturer">Manufacturer</label>
                        @error('case_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('case_series') is-invalid @enderror"
                               id="case_series" name="case_series"
                               placeholder="Series" value="{{ old('case_series') ?? $oldField('case_series') }}">
                        <label for="case_series">Series</label>
                        @error('case_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('case_model') is-invalid @enderror"
                               id="case_model" name="case_model"
                               placeholder="Model" value="{{ old('case_model') ?? $oldField('case_model') }}">
                        <label for="case_model">Model</label>
                        @error('case_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('case_color') is-invalid @enderror"
                               id="case_color" name="case_color"
                               placeholder="Color" value="{{ old('case_color') ?? $oldField('case_color') }}">
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
                                       placeholder="Length (mm)" value="{{ old('case_length') ?? $oldField('case_length') }}">
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
                                       placeholder="Width (mm)" value="{{ old('case_width') ?? $oldField('case_width') }}">
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
                                       placeholder="Height (mm)" value="{{ old('case_height') ?? $oldField('case_height') }}">
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
                               placeholder="Computer Case Type" value="{{ old('case_type') ?? $oldField('case_type') }}">
                        <label for="case_type">Computer Case Type</label>
                        @error('case_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="{{ $setMOBOFormFactorID() }} form-control @error($setMOBOFormFactorID()) is-invalid @enderror" multiple="multiple" style="width: 100%"
                                name="{{ $setMOBOFormFactorID() }}[]" id="{{ $setMOBOFormFactorID() }}">
                            @foreach($moboFormFactors as $mobo_form_factor)
                                <option
                                    @if((old($setMOBOFormFactorID()) !== null && in_array($mobo_form_factor->id,old($setMOBOFormFactorID()))) ||
                                    ($oldMOBOFormFactorField() !== null && in_array($mobo_form_factor->id,$oldMOBOFormFactorField()))) selected
                                    @endif value="{{ $mobo_form_factor->id }}">{{ $mobo_form_factor->name }}</option>
                            @endforeach
                            @if(old($setMOBOFormFactorID()) !== null)
                                @foreach(old($setMOBOFormFactorID()) as $mobo_form_factor_name)
                                    @if(!filter_var($mobo_form_factor_name,FILTER_VALIDATE_INT))
                                        <option selected
                                                value="{{ $mobo_form_factor_name }}">{{ $mobo_form_factor_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @error($setMOBOFormFactorID())
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('case_power_supply') is-invalid @enderror"
                               id="case_power_supply" name="case_power_supply"
                               placeholder="Power Supply" value="{{ old('case_power_supply') ?? $oldField('case_power_supply') }}">
                        <label for="case_power_supply">Power Supply</label>
                        @error('case_power_supply')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="case_power_supply_shroud" name="case_power_supply_shroud">
                            <option value="0" @if (!(old('case_power_supply_shroud') ?? $oldField('case_power_supply_shroud'))) selected @endif>No</option>
                            <option value="1" @if (old('case_power_supply_shroud') ?? $oldField('case_power_supply_shroud')) selected @endif>Yes</option>
                        </select>
                        <label for="case_power_supply_shroud">Power Supply Shroud</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('case_side_panel_window') is-invalid @enderror"
                               id="case_side_panel_window"
                               name="case_side_panel_window"
                               placeholder="Side Panel Window" value="{{ old('case_side_panel_window') ?? $oldField('case_side_panel_window') }}">
                        <label for="case_side_panel_window">Side Panel Window</label>
                        @error('case_side_panel_window')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="case_water_cooled_support" name="case_water_cooled_support">
                            <option value="0" @if (!(old('case_water_cooled_support') ?? $oldField('case_water_cooled_support'))) selected @endif>No</option>
                            <option value="1" @if (old('case_water_cooled_support') ?? $oldField('case_water_cooled_support')) selected @endif>Yes</option>
                        </select>
                        <label for="case_water_cooled_support">Water Cooled Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('case_cooler_clearance') is-invalid @enderror"
                               id="case_cooler_clearance"
                               name="case_cooler_clearance"
                               placeholder="Cooler Clearance (mm)" value="{{ old('case_cooler_clearance') ?? $oldField('case_cooler_clearance') }}">
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
                               value="{{ old('case_graphics_clearance') ?? $oldField('case_graphics_clearance') }}">
                        <label for="case_graphics_clearance">Graphics Card Clearance (mm)</label>
                        @error('case_graphics_clearance')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('case_psu_clearance') is-invalid @enderror"
                               id="case_psu_clearance" name="case_psu_clearance"
                               placeholder="PSU Clearance (mm)" value="{{ old('case_psu_clearance') ?? $oldField('case_psu_clearance') }}">
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
                               value="{{ old('case_full_height_e_slot') ?? $oldField('case_full_height_e_slot') }}">
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
                               value="{{ old('case_half_height_e_slot') ?? $oldField('case_half_height_e_slot') }}">
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
                               placeholder="External 5.25&quot; Bay" value="{{ old('case_external_525_bay') ?? $oldField('case_external_525_bay') }}">
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
                               placeholder="External 3.5&quot; Bay" value="{{ old('case_external_350_bay') ?? $oldField('case_external_350_bay') }}">
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
                               placeholder="Internal 3.5&quot; Bay" value="{{ old('case_internal_350_bay') ?? $oldField('case_internal_350_bay') }}">
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
                               placeholder="Internal 2.5&quot; Bay" value="{{ old('case_internal_250_bay') ?? $oldField('case_internal_250_bay') }}">
                        <label for="case_internal_250_bay">Internal 2.5" Bay</label>
                        @error('case_internal_250_bay')
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
    $('#{{ $setMOBOFormFactorID() }}').select2({
        dropdownParent: $('#{{ $setID() }}'),
        placeholder: "Motherboard Form Factor",
        allowClear: true,
        tags: true
    });
    @endpush
</script>
