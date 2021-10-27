<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} RAM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($ram) && isset($ram->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{  $ram->component->image_path }}" alt="">
                        @endif
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
                               placeholder="Component Name" value="{{ old('ram_name') ?? $oldField('ram_name') }}">
                        <label for="ram_name">Component Name</label>
                        @error('ram_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_manufacturer') is-invalid @enderror"
                               id="ram_manufacturer" name="ram_manufacturer"
                               placeholder="Manufacturer" value="{{ old('ram_manufacturer') ?? $oldField('ram_manufacturer') }}">
                        <label for="ram_manufacturer">Manufacturer</label>
                        @error('ram_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_series') is-invalid @enderror"
                               id="ram_series" name="ram_series"
                               placeholder="Series" value="{{ old('ram_series') ?? $oldField('ram_series') }}">
                        <label for="ram_series">Series</label>
                        @error('ram_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_model') is-invalid @enderror"
                               id="ram_model" name="ram_model" placeholder="Model" value="{{ old('ram_model') ?? $oldField('ram_model') }}">
                        <label for="ram_model">Model</label>
                        @error('ram_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_color') is-invalid @enderror"
                               id="ram_color" name="ram_color" placeholder="Color" value="{{ old('ram_color') ?? $oldField('ram_color') }}">
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
                                       placeholder="Length (mm)" value="{{ old('ram_length') ?? $oldField('ram_length') }}">
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
                                       placeholder="Width (mm)" value="{{ old('ram_width') ?? $oldField('ram_width') }}">
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
                                       placeholder="Height (mm)" value="{{ old('ram_height') ?? $oldField('ram_height') }}">
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
                               placeholder="Memory Type" value="{{ old('ram_memory_type') ?? $oldField('ram_memory_type') }}">
                        <label for="ram_memory_type">Memory Type</label>
                        @error('ram_memory_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_memory_speed') is-invalid @enderror"
                               id="ram_memory_speed" name="ram_memory_speed"
                               placeholder="Memory Speed (MHz)" value="{{ old('ram_memory_speed') ?? $oldField('ram_memory_speed') }}">
                        <label for="ram_memory_speed">Memory Speed (MHz)</label>
                        @error('ram_memory_speed')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_memory_capacity') is-invalid @enderror"
                               id="ram_memory_capacity" name="ram_memory_capacity"
                               placeholder="Memory Capacity (GB))" value="{{ old('ram_memory_capacity') ?? $oldField('ram_memory_capacity') }}">
                        <label for="ram_memory_capacity">Memory Capacity (GB)</label>
                        @error('ram_memory_capacity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_form_factor') is-invalid @enderror"
                               id="ram_form_factor" name="ram_form_factor"
                               placeholder="Form Factor" value="{{ old('ram_form_factor') ?? $oldField('ram_form_factor') }}">
                        <label for="ram_form_factor">Form Factor</label>
                        @error('ram_form_factor')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_modules') is-invalid @enderror"
                               id="ram_modules" name="ram_modules"
                               placeholder="Modules" value="{{ old('ram_modules') ?? $oldField('ram_modules') }}">
                        <label for="ram_modules">Modules</label>
                        @error('ram_modules')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_voltage') is-invalid @enderror"
                               id="ram_voltage" name="ram_voltage"
                               placeholder="Voltage (V)" value="{{ old('ram_voltage') ?? $oldField('ram_voltage') }}">
                        <label for="ram_voltage">Voltage (V)</label>
                        @error('ram_voltage')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('ram_timings') is-invalid @enderror"
                               id="ram_timings" name="ram_timings"
                               placeholder="Memory Timings" value="{{ old('ram_timings') ?? $oldField('ram_timings') }}">
                        <label for="ram_timings">Memory Timings</label>
                        @error('ram_timings')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="ram_ecc_memory" name="ram_ecc_memory">
                            <option value="0" @if (!(old('ram_ecc_memory') ?? $oldField('ram_ecc_memory'))) selected @endif>No</option>
                            <option value="1" @if (old('ram_ecc_memory') ?? $oldField('ram_ecc_memory')) selected @endif>Yes</option>
                        </select>
                        <label for="ram_ecc_memory">ECC Memory</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="ram_registered_memory" name="ram_registered_memory">
                            <option value="0" @if (!(old('ram_registered_memory') ?? $oldField('ram_registered_memory'))) selected @endif>No</option>
                            <option value="1" @if (old('ram_registered_memory') ?? $oldField('ram_registered_memory')) selected @endif>Yes</option>
                        </select>
                        <label for="ram_registered_memory">Registered Memory</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="ram_heat_spreader" name="ram_heat_spreader">
                            <option value="0" @if (!(old('ram_heat_spreader') ?? $oldField('ram_heat_spreader'))) selected @endif>No</option>
                            <option value="1" @if (old('ram_heat_spreader') ?? $oldField('ram_heat_spreader')) selected @endif>Yes</option>
                        </select>
                        <label for="ram_heat_spreader">Heat Spreader</label>
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
