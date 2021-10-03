<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} PSU Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('psu_component') is-invalid @enderror"
                                @if($mode === 'edit') disabled @endif
                                id="psu_component" name="psu_component">
                            @if($mode !== 'edit')
                            @foreach($psuComponents as $psu_component)
                                <option value="{{ $psu_component->id }}"
                                        @if(old('psu_component') == $psu_component->id) selected @endif>{{ $psu_component->name }}</option>
                            @endforeach
                            @else
                                <option value="{{ $psuComponent->id }}" selected>{{ $oldField('psu_component') }}</option>
                            @endif
                        </select>
                        <label for="psu_component">PSU Name</label>
                        @error('psu_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('psu_quantity') is-invalid @enderror"
                               @if($mode === 'edit') disabled @endif
                               id="psu_quantity" name="psu_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('psu_quantity') ?? $oldField('psu_quantity') }}">
                        <label for="psu_quantity">Quantity</label>
                        @error('psu_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('psu_price') is-invalid @enderror"
                               id="psu_price" name="psu_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('psu_price') ?? $oldField('psu_price') }}">
                        <label for="psu_price">Price</label>
                        @error('psu_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('psu_description') is-invalid @enderror"
                                  id="psu_description" name="psu_description"
                                  placeholder="Product Description">{{ old('psu_description') ?? $oldField('psu_description') }}</textarea>
                        <label for="psu_description">Product Description</label>
                        @error('psu_description')
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
