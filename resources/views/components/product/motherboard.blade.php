<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Motherboard Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select" id="mobo_component" name="mobo_component">
                            @foreach($motherboards as $motherboard)
                                <option
                                    value="{{ $motherboard->id }}">{{ $motherboard->name }}</option>
                            @endforeach
                        </select>
                        <label for="mobo_component">Motherboard Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_quantity') is-invalid @enderror"
                               id="mobo_quantity" name="mobo_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('mobo_quantity') }}">
                        <label for="mobo_quantity">Quantity</label>
                        @error('mobo_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_price') is-invalid @enderror"
                               id="mobo_price" name="mobo_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('mobo_price') }}">
                        <label for="mobo_m2_slot">Price</label>
                        @error('mobo_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Product Description" id="mobo_description"
                                  style="height: 250px"></textarea>
                        <label for="mobo_description">Product Description</label>
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
