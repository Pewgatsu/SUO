<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Storage</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Component Attributes -->

                    <div class="mb-3">
                        @if($mode === 'edit' && isset($storage) && isset($storage->component->image_path))
                            <img class="img-fluid rounded mx-auto d-block mb-2"
                                 src="{{ asset('images/components/storages/' . $storage->component->image_path) }}" alt="">
                        @endif
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
                               placeholder="Component Name" value="{{ old('storage_name') ?? $oldField('storage_name') }}">
                        <label for="storage_name">Component Name</label>
                        @error('storage_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_manufacturer') is-invalid @enderror"
                               id="storage_manufacturer"
                               name="storage_manufacturer"
                               placeholder="Manufacturer" value="{{ old('storage_manufacturer') ?? $oldField('storage_manufacturer') }}">
                        <label for="storage_manufacturer">Manufacturer</label>
                        @error('storage_manufacturer')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_series') is-invalid @enderror"
                               id="storage_series" name="storage_series"
                               placeholder="Series" value="{{ old('storage_series') ?? $oldField('storage_series') }}">
                        <label for="storage_series">Series</label>
                        @error('storage_series')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_model') is-invalid @enderror"
                               id="storage_model" name="storage_model"
                               placeholder="Model" value="{{ old('storage_model') ?? $oldField('storage_model') }}">
                        <label for="storage_model">Model</label>
                        @error('storage_model')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_color') is-invalid @enderror"
                               id="storage_color" name="storage_color"
                               placeholder="Color" value="{{ old('storage_color') ?? $oldField('storage_color') }}">
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
                                       placeholder="Length (mm)" value="{{ old('storage_length') ?? $oldField('storage_length') }}">
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
                                       placeholder="Width (mm)" value="{{ old('storage_width') ?? $oldField('storage_width') }}">
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
                                       placeholder="Height (mm)" value="{{ old('storage_height') ?? $oldField('storage_height') }}">
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
                               placeholder="Storage Type" value="{{ old('storage_type') ?? $oldField('storage_type') }}">
                        <label for="storage_type">Storage Type</label>
                        @error('storage_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_capacity') is-invalid @enderror"
                               id="storage_capacity" name="storage_capacity"
                               placeholder="Storage Capacity (GB)" value="{{ old('storage_capacity') ?? $oldField('storage_capacity') }}">
                        <label for="storage_capacity">Storage Capacity (GB)</label>
                        @error('storage_capacity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_interface') is-invalid @enderror"
                               id="storage_interface" name="storage_interface"
                               placeholder="Interface" value="{{ old('storage_interface') ?? $oldField('storage_interface') }}">
                        <label for="storage_interface">Interface</label>
                        @error('storage_interface')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_form_factor') is-invalid @enderror"
                               id="storage_form_factor" name="storage_form_factor"
                               placeholder="Form Factor" value="{{ old('storage_form_factor') ?? $oldField('storage_form_factor') }}">
                        <label for="storage_form_factor">Form Factor</label>
                        @error('storage_form_factor')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('storage_cache') is-invalid @enderror"
                               id="storage_cache" name="storage_cache"
                               placeholder="Storage Cache (MB)" value="{{ old('storage_cache') ?? $oldField('storage_cache') }}">
                        <label for="storage_cache">Storage Cache (MB)</label>
                        @error('storage_cache')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="storage_nvme" name="storage_nvme">
                            <option value="0" @if (!(old('storage_nvme') ?? $oldField('storage_nvme'))) selected @endif>No</option>
                            <option value="1" @if (old('storage_nvme') ?? $oldField('storage_nvme')) selected @endif>Yes</option>
                        </select>
                        <label for="storage_nvme">NVMe</label>
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
