<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} CPU Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('cpu_component') is-invalid @enderror"
                                id="cpu_component"
                                name="cpu_component">
                            @foreach($cpuComponents as $cpu_component)
                                <option value="{{ $cpu_component->id }}"
                                        @if(old('cpu_component') !== null && old('cpu_component') == $cpu_component->id) selected @endif>{{ $cpu_component->name }}</option>
                            @endforeach
                        </select>
                        <label for="cpu_component">CPU Name</label>
                        @error('cpu_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('cpu_quantity') is-invalid @enderror"
                               id="cpu_quantity" name="cpu_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('cpu_quantity') }}">
                        <label for="cpu_quantity">Quantity</label>
                        @error('cpu_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('cpu_price') is-invalid @enderror"
                               id="cpu_price" name="cpu_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('cpu_price') }}">
                        <label for="cpu_price">Price</label>
                        @error('cpu_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('cpu_description') is-invalid @enderror"
                                  id="cpu_description" name="cpu_description"
                                  placeholder="Product Description">{{ old('cpu_description') }}</textarea>
                        <label for="cpu_description">Product Description</label>
                        @error('cpu_description')
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
