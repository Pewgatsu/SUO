<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} PSU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($psu) && isset($psu->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{$psu->component->image_path }}" alt="">
                        @endif
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
                               placeholder="Component Name" value="{{ old('psu_name') ?? $oldField('psu_name') }}">
                        <label for="psu_name">Component Name</label>
                        @error('psu_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('psu_manufacturer') is-invalid @enderror"
                               id="psu_manufacturer" name="psu_manufacturer"
                               placeholder="Manufacturer"
                               value="{{ old('psu_manufacturer') ?? $oldField('psu_manufacturer') }}">
                        <label for="psu_manufacturer">Manufacturer</label>
                        @error('psu_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('psu_series') is-invalid @enderror"
                               id="psu_series" name="psu_series"
                               placeholder="Series" value="{{ old('psu_series') ?? $oldField('psu_series') }}">
                        <label for="psu_series">Series</label>
                        @error('psu_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('psu_model') is-invalid @enderror"
                               id="psu_model" name="psu_model" placeholder="Model"
                               value="{{ old('psu_model') ?? $oldField('psu_model') }}">
                        <label for="psu_model">Model</label>
                        @error('psu_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('psu_color') is-invalid @enderror"
                               id="psu_color" name="psu_color" placeholder="Color"
                               value="{{ old('psu_color') ?? $oldField('psu_color') }}">
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
                                       placeholder="Length (mm)"
                                       value="{{ old('psu_length') ?? $oldField('psu_length') }}">
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
                                       placeholder="Width (mm)"
                                       value="{{ old('psu_width') ?? $oldField('psu_width') }}">
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
                                       placeholder="Height (mm)"
                                       value="{{ old('psu_height') ?? $oldField('psu_height') }}">
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
                               placeholder="Form Factor"
                               value="{{ old('psu_form_factor') ?? $oldField('psu_form_factor') }}">
                        <label for="psu_form_factor">Form Factor</label>
                        @error('psu_form_factor')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('psu_wattage') is-invalid @enderror"
                               id="psu_wattage" name="psu_wattage"
                               placeholder="Wattage (W)" value="{{ old('psu_wattage') ?? $oldField('psu_wattage') }}">
                        <label for="psu_wattage">Wattage (W)</label>
                        @error('psu_wattage')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('psu_efficiency_rating') is-invalid @enderror"
                               id="psu_efficiency_rating"
                               name="psu_efficiency_rating"
                               placeholder="Efficiency Rating"
                               value="{{ old('psu_efficiency_rating') ?? $oldField('psu_efficiency_rating') }}">
                        <label for="psu_efficiency_rating">Efficiency Rating</label>
                        @error('psu_efficiency_rating')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="psu_modular" name="psu_modular">
                            <option value="None"
                                    @if ('None' === (old('psu_modular') ?? $oldField('psu_modular'))) selected @endif>
                                Non-Modular
                            </option>
                            <option value="Semi"
                                    @if ('Semi' === (old('psu_modular') ?? $oldField('psu_modular'))) selected @endif>
                                Semi-Modular
                            </option>
                            <option value="Full"
                                    @if ('Full' === (old('psu_modular') ?? $oldField('psu_modular'))) selected @endif>
                                Fully-Modular
                            </option>
                        </select>
                        <label for="psu_modular">Modular</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('psu_atx_connector') is-invalid @enderror"
                               id="psu_atx_connector" name="psu_atx_connector"
                               min="0"
                               max="16"
                               placeholder="ATX Connector"
                               value="{{ old('psu_atx_connector') ?? $oldField('psu_atx_connector') }}">
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
                               placeholder="EPS Connector"
                               value="{{ old('psu_eps_connector') ?? $oldField('psu_eps_connector') }}">
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
                               placeholder="SATA Connector"
                               value="{{ old('psu_sata_connector') ?? $oldField('psu_sata_connector') }}">
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
                               placeholder="Molex 4-pin Connector"
                               value="{{ old('psu_molex_connector') ?? $oldField('psu_molex_connector') }}">
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
                               placeholder="PCIe 8-pin Connector"
                               value="{{ old('psu_pcie_8pin_connector') ?? $oldField('psu_pcie_8pin_connector') }}">
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
                               placeholder="PCIe 6+2-pin Connector"
                               value="{{ old('psu_pcie_62pin_connector') ?? $oldField('psu_pcie_62pin_connector') }}">
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
                               placeholder="PCIe 6-pin Connector"
                               value="{{ old('psu_pcie_6pin_connector') ?? $oldField('psu_pcie_6pin_connector') }}">
                        <label for="psu_pcie_6pin_connector">PCIe 6-pin Connector</label>
                        @error('psu_pcie_6pin_connector')
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
