<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Storage Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('storage_component') is-invalid @enderror"
                                @if($mode === 'edit') disabled @endif
                                id="storage_component"
                                name="storage_component">
                            @if($mode !== 'edit')
                            @foreach($storageComponents as $storage_component)
                                <option value="{{ $storage_component->id }}"
                                        @if(old('storage_component') == $storage_component->id) selected @endif>{{ $storage_component->name }}</option>
                            @endforeach
                            @else
                                <option value="{{ $storageComponent->id }}" selected>{{ $oldField('storage_component') }}</option>
                            @endif
                        </select>
                        <label for="storage_component">Storage Name</label>
                        @error('storage_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('storage_quantity') is-invalid @enderror"
                               @if($mode === 'edit') disabled @endif
                               id="storage_quantity" name="storage_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('storage_quantity') ?? $oldField('storage_quantity') }}">
                        <label for="storage_quantity">Quantity</label>
                        @error('storage_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('storage_price') is-invalid @enderror"
                               id="storage_price" name="storage_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('storage_price') ?? $oldField('storage_price') }}">
                        <label for="storage_price">Price</label>
                        @error('storage_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('storage_description') is-invalid @enderror"
                                  id="storage_description" name="storage_description"
                                  placeholder="Product Description">{{ old('storage_description') ?? $oldField('storage_description') }}</textarea>
                        <label for="storage_description">Product Description</label>
                        @error('storage_description')
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
