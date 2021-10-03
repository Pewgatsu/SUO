<div class="modal fade" id="{{ $setID() }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ $setRoute }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">
                        Delete {{ $type }} Products</h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">Do you want to delete {{ $component->name }}?</p>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('product_quantity') is-invalid @enderror"
                               id="product_quantity" name="product_quantity" min="1"
                               max="{{ $setQuantity() }}" placeholder="Product Quantity"
                               value="{{ old('component_quantity') ?? $setQuantity() }}">
                        <label for="product_quantity">Product Quantity</label>
                        @error('product_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
