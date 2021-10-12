<div class="modal fade" id="{{ $setID() }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="{{ $setID() }}_label">
                    Delete {{ $component->name }}</h5>
                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                Do you want to delete this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancel
                </button>
                <form
                    action="{{ $setRoute() }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
