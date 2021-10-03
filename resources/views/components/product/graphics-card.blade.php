<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Graphics Card Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('graphics_card_component') is-invalid @enderror"
                                @if($mode === 'edit') disabled @endif
                                id="graphics_card_component"
                                name="graphics_card_component">
                            @if($mode !== 'edit')
                            @foreach($graphicsCardComponents as $graphics_card_component)
                                <option value="{{ $graphics_card_component->id }}"
                                        @if(old('graphics_card_component') == $graphics_card_component->id) selected @endif>{{ $graphics_card_component->name }}</option>
                            @endforeach
                            @else
                                <option value="{{ $graphicsCardComponent->id }}" selected>{{ $oldField('graphics_card_component') }}</option>
                            @endif
                        </select>
                        <label for="graphics_card_component">Graphics Card Name</label>
                        @error('graphics_card_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('graphics_card_quantity') is-invalid @enderror"
                               @if($mode === 'edit') disabled @endif
                               id="graphics_card_quantity" name="graphics_card_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('graphics_card_quantity') ?? $oldField('graphics_card_quantity') }}">
                        <label for="graphics_card_quantity">Quantity</label>
                        @error('graphics_card_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('graphics_card_price') is-invalid @enderror"
                               id="graphics_card_price" name="graphics_card_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('graphics_card_price') ?? $oldField('graphics_card_price') }}">
                        <label for="graphics_card_price">Price</label>
                        @error('graphics_card_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('graphics_card_description') is-invalid @enderror"
                                  id="graphics_card_description" name="graphics_card_description"
                                  placeholder="Product Description">{{ old('graphics_card_description') ?? $oldField('graphics_card_description') }}</textarea>
                        <label for="graphics_card_description">Product Description</label>
                        @error('graphics_card_description')
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
