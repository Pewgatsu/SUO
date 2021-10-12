<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">Edit {{ $component->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="product_name" disabled
                               placeholder="Product Name"
                               value="{{ $oldField('product_name') }}">
                        <label for="product_name">Product Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('product_price') is-invalid @enderror"
                               id="product_price" name="product_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('product_price') ?? $oldField('product_price') }}">
                        <label for="product_price">Price</label>
                        @error('product_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('product_description') is-invalid @enderror"
                                  id="product_description" name="product_description"
                                  placeholder="Product Description">{{ old('product_description') ?? $oldField('product_description') }}</textarea>
                        <label for="product_description">Product Description</label>
                        @error('product_description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>
