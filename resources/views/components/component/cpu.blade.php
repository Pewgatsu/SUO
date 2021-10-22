<div class="modal fade text-start" id="{{ $setID() ?? '' }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} CPU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($cpu) && isset($cpu->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{ asset('images/components/cpus/' . $cpu->component->image_path) }}" alt="">
                        @endif
                        <label for="cpu_image" class="form-label">Component Image</label>
                        <input class="form-control @error('cpu_image') is-invalid @enderror" type="file"
                               id="cpu_image" name="cpu_image">
                        @error('cpu_image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_name') is-invalid @enderror"
                               id="cpu_name" name="cpu_name"
                               placeholder="Component Name" value="{{ old('cpu_name') ?? $oldField('cpu_name') }}">
                        <label for="cpu_name">Component Name</label>
                        @error('cpu_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_manufacturer') is-invalid @enderror"
                               id="cpu_manufacturer" name="cpu_manufacturer"
                               placeholder="Manufacturer"
                               value="{{ old('cpu_manufacturer') ?? $oldField('cpu_manufacturer') }}">
                        <label for="cpu_manufacturer">Manufacturer</label>
                        @error('cpu_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_series') is-invalid @enderror"
                               id="cpu_series" name="cpu_series"
                               placeholder="Series" value="{{ old('cpu_series') ?? $oldField('cpu_series') }}">
                        <label for="cpu_series">Series</label>
                        @error('cpu_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_model') is-invalid @enderror"
                               id="cpu_model" name="cpu_model" placeholder="Model"
                               value="{{ old('cpu_model') ?? $oldField('cpu_model') }}">
                        <label for="cpu_model">Model</label>
                        @error('cpu_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_color') is-invalid @enderror"
                               id="cpu_color" name="cpu_color" placeholder="Color"
                               value="{{ old('cpu_color') ?? $oldField('cpu_color') }}">
                        <label for="cpu_color">Color</label>
                        @error('cpu_color')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('cpu_length') is-invalid @enderror"
                                       id="cpu_length" name="cpu_length"
                                       placeholder="Length (mm)"
                                       value="{{ old('cpu_length') ?? $oldField('cpu_length') }}">
                                <label for="cpu_length">Length (mm)</label>
                                @error('cpu_length')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('cpu_width') is-invalid @enderror"
                                       id="cpu_width" name="cpu_width"
                                       placeholder="Width (mm)" value="{{ old('cpu_width') ?? $oldField('cpu_width') }}">
                                <label for="cpu_width">Width (mm)</label>
                                @error('cpu_width')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control @error('cpu_height') is-invalid @enderror"
                                       id="cpu_height" name="cpu_height"
                                       placeholder="Height (mm)"
                                       value="{{ old('cpu_height') ?? $oldField('cpu_height') }}">
                                <label for="cpu_height">Height (mm)</label>
                                @error('cpu_height')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- CPU Attributes -->

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_socket') is-invalid @enderror"
                               id="cpu_socket" name="cpu_socket"
                               placeholder="CPU Socket" value="{{ old('cpu_socket') ?? $oldField('cpu_socket') }}">
                        <label for="cpu_socket">CPU Socket</label>
                        @error('cpu_socket')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_microarchitecture') is-invalid @enderror"
                               id="cpu_microarchitecture"
                               name="cpu_microarchitecture"
                               placeholder="Microarchitecture"
                               value="{{ old('cpu_microarchitecture') ?? $oldField('cpu_microarchitecture') }}">
                        <label for="cpu_microarchitecture">Microarchitecture</label>
                        @error('cpu_microarchitecture')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_core_count') is-invalid @enderror"
                               id="cpu_core_count" name="cpu_core_count"
                               placeholder="Core Count" value="{{ old('cpu_core_count') ?? $oldField('cpu_core_count') }}">
                        <label for="cpu_core_count">Core Count</label>
                        @error('cpu_core_count')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_thread_count') is-invalid @enderror"
                               id="cpu_thread_count" name="cpu_thread_count"
                               placeholder="Thread Count"
                               value="{{ old('cpu_thread_count') ?? $oldField('cpu_thread_count') }}">
                        <label for="cpu_thread_count">Thread Count</label>
                        @error('cpu_thread_count')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_base_clock') is-invalid @enderror"
                               id="cpu_base_clock" name="cpu_base_clock"
                               placeholder="Base Clock (GHz)"
                               value="{{ old('cpu_base_clock') ?? $oldField('cpu_base_clock') }}">
                        <label for="cpu_base_clock">Base Clock (GHz)</label>
                        @error('cpu_base_clock')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_boost_clock') is-invalid @enderror"
                               id="cpu_boost_clock" name="cpu_boost_clock"
                               placeholder="Boost Clock (GHz)"
                               value="{{ old('cpu_boost_clock') ?? $oldField('cpu_boost_clock') }}">
                        <label for="cpu_boost_clock">Boost Clock (GHz)</label>
                        @error('cpu_boost_clock')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_max_mem_support') is-invalid @enderror"
                               id="cpu_max_mem_support" name="cpu_max_mem_support"
                               placeholder="Maximum Memory Support (GB)"
                               value="{{ old('cpu_max_mem_support') ?? $oldField('cpu_max_mem_support') }}">
                        <label for="cpu_max_mem_support">Maximum Memory Support (GB)</label>
                        @error('cpu_max_mem_support')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('cpu_tdp') is-invalid @enderror"
                               id="cpu_tdp" name="cpu_tdp" placeholder="TDP (W)"
                               value="{{ old('cpu_tdp') ?? $oldField('cpu_tdp') }}">
                        <label for="cpu_tdp">TDP (W)</label>
                        @error('cpu_tdp')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="cpu_smt_support" name="cpu_smt_support">
                            <option value="0" @if (!(old('cpu_smt_support') ?? $oldField('cpu_smt_support'))) selected @endif>
                                No
                            </option>
                            <option value="1" @if (old('cpu_smt_support') ?? $oldField('cpu_smt_support')) selected @endif>
                                Yes
                            </option>
                        </select>
                        <label for="cpu_smt_support">SMT Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="cpu_ecc_support" name="cpu_ecc_support">
                            <option value="0" @if (!(old('cpu_ecc_support') ?? $oldField('cpu_ecc_support'))) selected @endif>
                                No
                            </option>
                            <option value="1" @if (old('cpu_ecc_support') ?? $oldField('cpu_ecc_support')) selected @endif>
                                Yes
                            </option>
                        </select>
                        <label for="cpu_ecc_support">ECC Support</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                               class="form-control @error('cpu_integrated_graphics') is-invalid @enderror"
                               id="cpu_integrated_graphics"
                               name="cpu_integrated_graphics"
                               placeholder="Integrated Graphics"
                               value="{{ old('cpu_integrated_graphics') ?? $oldField('cpu_integrated_graphics') }}">
                        <label for="cpu_integrated_graphics">Integrated Graphics</label>
                        @error('cpu_integrated_graphics')
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
