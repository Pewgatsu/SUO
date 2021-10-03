<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Motherboard Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('mobo_component') is-invalid @enderror"
                                @if($mode === 'edit') disabled @endif
                                id="mobo_component"
                                name="mobo_component">
                            @if($mode !== 'edit')
                            @foreach($motherboardComponents as $motherboard_component)
                                <option value="{{ $motherboard_component->id }}"
                                        @if(old('mobo_component') == $motherboard_component->id) selected @endif>{{ $motherboard_component->name }}</option>
                            @endforeach
                            @else
                                <option value="{{ $motherboardComponent->id }}" selected>{{ $oldField('mobo_component') }}</option>
                            @endif
                        </select>
                        <label for="mobo_component">Motherboard Name</label>
                        @error('mobo_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_quantity') is-invalid @enderror"
                               @if($mode === 'edit') disabled @endif
                               id="mobo_quantity" name="mobo_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('mobo_quantity') ?? $oldField('mobo_quantity') }}">
                        <label for="mobo_quantity">Quantity</label>
                        @error('mobo_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('mobo_price') is-invalid @enderror"
                               id="mobo_price" name="mobo_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('mobo_price') ?? $oldField('mobo_price') }}">
                        <label for="mobo_price">Price</label>
                        @error('mobo_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('mobo_description') is-invalid @enderror"
                                  id="mobo_description" name="mobo_description"
                                  placeholder="Product Description">{{ old('mobo_price') ?? $oldField('mobo_description') }}</textarea>
                        <label for="mobo_description">Product Description</label>
                        @error('mobo_description')
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
