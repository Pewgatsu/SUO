<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} CPU Cooler Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('cpu_cooler_component') is-invalid @enderror"
                                @if($mode === 'edit') disabled @endif
                                id="cpu_cooler_component"
                                name="cpu_cooler_component">
                            @if($mode !== 'edit')
                            @foreach($cpuCoolerComponents as $cpu_cooler_component)
                                <option value="{{ $cpu_cooler_component->id }}"
                                        @if(old('cpu_cooler_component') == $cpu_cooler_component->id) selected @endif>{{ $cpu_cooler_component->name }}</option>
                            @endforeach
                            @else
                                <option value="{{ $cpuCoolerComponent->id }}" selected>{{ $oldField('cpu_cooler_component') }}</option>
                            @endif
                        </select>
                        <label for="cpu_cooler_component">CPU Cooler Name</label>
                        @error('cpu_cooler_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('cpu_cooler_quantity') is-invalid @enderror"
                               @if($mode === 'edit') disabled @endif
                               id="cpu_cooler_quantity" name="cpu_cooler_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('cpu_cooler_quantity') ?? $oldField('cpu_cooler_quantity') }}">
                        <label for="cpu_cooler_quantity">Quantity</label>
                        @error('cpu_cooler_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('cpu_cooler_price') is-invalid @enderror"
                               id="cpu_cooler_price" name="cpu_cooler_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('cpu_cooler_price') ?? $oldField('cpu_cooler_price') }}">
                        <label for="cpu_cooler_price">Price</label>
                        @error('cpu_cooler_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('cpu_cooler_description') is-invalid @enderror"
                                  id="cpu_cooler_description" name="cpu_cooler_description"
                                  placeholder="Product Description">{{ old('cpu_cooler_description') ?? $oldField('cpu_cooler_description') }}</textarea>
                        <label for="cpu_description">Product Description</label>
                        @error('cpu_cooler_description')
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
