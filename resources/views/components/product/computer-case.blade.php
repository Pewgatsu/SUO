<div class="modal fade text-start" id="{{ $setID() }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="{{ $setID() }}_label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ $setRoute() }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $setID() }}_label">{{ $setTitle() }} Computer Case Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-3">
                        <select class="form-select @error('case_component') is-invalid @enderror"
                                @if($mode === 'edit') disabled @endif
                                id="case_component" name="case_component">
                            @if($mode !== 'edit')
                            @foreach($computerCaseComponents as $computer_case_component)
                                <option value="{{ $computer_case_component->id }}"
                                        @if(old('case_component') == $computer_case_component->id) selected @endif>{{ $computer_case_component->name }}</option>
                            @endforeach
                            @else
                                <option value="{{ $computerCaseComponent->id }}" selected>{{ $oldField('case_component') }}</option>
                            @endif
                        </select>
                        <label for="case_component">Computer Case Name</label>
                        @error('case_component')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('case_quantity') is-invalid @enderror"
                               @if($mode === 'edit') disabled @endif
                               id="case_quantity" name="case_quantity" min="1"
                               max="1000" placeholder="Quantity" value="{{ old('case_quantity') ?? $oldField('case_quantity') }}">
                        <label for="case_quantity">Quantity</label>
                        @error('case_quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('case_price') is-invalid @enderror"
                               id="case_price" name="case_price" min="0"
                               max="1000000" step="0.01"
                               placeholder="Price" value="{{ old('case_price') ?? $oldField('case_price') }}">
                        <label for="case_price">Price</label>
                        @error('case_price')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea style="height: 250px"
                                  class="form-control @error('case_description') is-invalid @enderror"
                                  id="case_description" name="case_description"
                                  placeholder="Product Description">{{ old('case_description') ?? $oldField('case_description') }}</textarea>
                        <label for="case_description">Product Description</label>
                        @error('case_description')
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
