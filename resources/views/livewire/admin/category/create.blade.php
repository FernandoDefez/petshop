<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create a new category</h5>
        <button type="button" wire:click="resetModal" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="col-md-12 mb-3 p-0">
            <label for="PetSelection">Choose a pet</label>
            <select
                class="custom-select @if (!empty($pet_id)) is-valid @else @error('pet_id') is-invalid @enderror @endif"
                wire:model="pet_id"
                id="PetSelection"
                aria-describedby="PetSelectionValidationFeedback"
                required>
                <option selected value="">Choose...</option>
                @foreach($pets as $pet)
                    <option value="{{$pet->id}}"> {{$pet->pet_name}} </option>
                @endforeach
            </select>
            @if (!empty($pet_id))
                <div class="valid-feedback"> {{ __('Valid') }} </div>
            @else
                @error('pet_id')
                <div id="PetSelectionValidationFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            @endif

        </div>
        <div class="mb-2">
            <label for="CategoryInput" class="form-label">Name a category</label>
            <input
                class="form-control
                @if (strlen($category) >= 3 && strlen($category) <= 20) is-valid @else @error('category') is-invalid @enderror @endif"
                type="text"
                wire:model="category"
                id="CategoryInput"
                aria-describedby="CategoryInputValidationFeedback"
                placeholder="Category name"
                required
            >
            @if (strlen($category) >= 3 && strlen($category) <= 20)
                <div class="valid-feedback"> {{ __('Valid') }} </div>
            @else
                @error('category')
                <div id="CategoryInputValidationFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="resetModal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click="store">Create pet</button>
    </div>
</div>
