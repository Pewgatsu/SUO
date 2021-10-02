<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} RAM Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('ram_component') is-invalid @enderror"
                                id="ram_component"
                                name="ram_component">
                            @foreach($ramComponents as $ram_component)
                                <option value="{{ $ram_component->id }}"
                                        @if(old('ram_component') !== null && old('ram_component') == $ram_component->id) selected @endif>{{ $ram_component->name }}</option>
                            @endforeach
                        </select>
                        <label for="ram_component">RAM Name</label>
                        @error('ram_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('ram_quantity') is-invalid @enderror"
                               id="ram_quantity" name="ram_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('ram_quantity') }}">
                        <label for="ram_quantity">Quantity</label>
                        @error('ram_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('ram_price') is-invalid @enderror"
                               id="ram_price" name="ram_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('ram_price') }}">
                        <label for="ram_price">Price</label>
                        @error('ram_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('ram_description') is-invalid @enderror"
                                  id="ram_description" name="ram_description"
                                  placeholder="Product Description">{{ old('ram_description') }}</textarea>
                        <label for="ram_description">Product Description</label>
                        @error('ram_description')
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
