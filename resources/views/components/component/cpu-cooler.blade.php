<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} CPU Cooler</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($cpuCooler) && isset($cpuCooler->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{ asset('images/cpu_coolers/' . $cpuCooler->component->image_path) }}" alt="">
                        @endif
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
                               placeholder="Component Name"
                               value="{{ old('cpu_cooler_name') ?? $oldField('cpu_cooler_name') }}">
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
                               placeholder="Manufacturer"
                               value="{{ old('cpu_cooler_manufacturer') ?? $oldField('cpu_cooler_manufacturer') }}">
                        <label for="cpu_cooler_manufacturer">Manufacturer</label>
                        @error('cpu_cooler_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_cooler_series') is-invalid @enderror"
                               id="cpu_cooler_series" name="cpu_cooler_series"
                               placeholder="Series"
                               value="{{ old('cpu_cooler_series') ?? $oldField('cpu_cooler_series') }}">
                        <label for="cpu_cooler_series">Series</label>
                        @error('cpu_cooler_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_cooler_model') is-invalid @enderror"
                               id="cpu_cooler_model" name="cpu_cooler_model"
                               placeholder="Model"
                               value="{{ old('cpu_cooler_model') ?? $oldField('cpu_cooler_model') }}">
                        <label for="cpu_cooler_model">Model</label>
                        @error('cpu_cooler_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_cooler_color') is-invalid @enderror"
                               id="cpu_cooler_color" name="cpu_cooler_color"
                               placeholder="Color"
                               value="{{ old('cpu_cooler_color') ?? $oldField('cpu_cooler_color') }}">
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
                                       placeholder="Length (mm)"
                                       value="{{ old('cpu_cooler_length') ?? $oldField('cpu_cooler_length') }}">
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
                                       placeholder="Width (mm)"
                                       value="{{ old('cpu_cooler_width') ?? $oldField('cpu_cooler_width') }}">
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
                                       placeholder="Height (mm)"
                                       value="{{ old('cpu_cooler_height') ?? $oldField('cpu_cooler_height') }}">
                                <label for="cpu_cooler_height">Height (mm)</label>
                                @error('cpu_cooler_height')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- CPU Cooler Attributes -->
                    <div class="form-floating mb-3">
                        <select class="{{ $setCPUSocketID() }} form-control @error($setCPUSocketID()) is-invalid @enderror" multiple="multiple" style="width: 100%"
                                name="{{ $setCPUSocketID() }}[]" id="{{ $setCPUSocketID() }}">
                            @foreach($cpuSockets as $cpu_socket)
                                <option
                                    @if((old($setCPUSocketID()) !== null && in_array($cpu_socket->id,old($setCPUSocketID()))) ||
                                    ($oldCPUSocketField() !== null && in_array($cpu_socket->id,$oldCPUSocketField()))) selected
                                    @endif value="{{ $cpu_socket->id }}">{{ $cpu_socket->name }}</option>
                            @endforeach
                            @if(old($setCPUSocketID()) !== null)
                                @foreach(old($setCPUSocketID()) as $cpu_socket_name)
                                    @if(!filter_var($cpu_socket_name,FILTER_VALIDATE_INT))
                                        <option selected value="{{ $cpu_socket_name }}">{{ $cpu_socket_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        @error($setCPUSocketID())
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_cooler_fan_speed') is-invalid @enderror"
                               id="cpu_cooler_fan_speed"
                               name="cpu_cooler_fan_speed"
                               placeholder="Fan Speed (rpm)"
                               value="{{ old('cpu_cooler_fan_speed') ?? $oldField('cpu_cooler_fan_speed') }}">
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
                               placeholder="Noise Level (dB)"
                               value="{{ old('cpu_cooler_noise_level') ?? $oldField('cpu_cooler_noise_level') }}">
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
                               placeholder="Water Cooled Support"
                               value="{{ old('cpu_cooler_water_cooled') ?? $oldField('cpu_cooler_water_cooled') }}">
                        <label for="cpu_cooler_water_cooled">Water Cooled Support</label>
                        @error('cpu_cooler_water_cooled')
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
    $('#{{ $setCPUSocketID() }}').select2({
        dropdownParent: $('#{{ $setID() }}'),
        placeholder: "CPU Socket",
        allowClear: true,
        tags: true
    });
    @endpush
</script>
