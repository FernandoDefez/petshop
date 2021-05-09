<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="createPetModalLabel">Create a new pet</h5>
        <button type="button" wire:click="resetModal" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        {{-- Alert while uploading an image--}}
        <div class="alert alert-success alert-dismissible fade show col-12" wire:loading wire:loading.attr="disabled" wire:target="image" role="alert">
            <div class="spinner-border spinner-border-sm" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <strong>Uploading image, </strong> please wait
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{-- Showing the image once is uploaded --}}
        @if($image)
            <div class="mb-1" style="width: 100%; height: 200px">
                <img
                    loading="lazy"
                    decoding="async"
                    src="{{ $image->temporaryUrl() }}"
                    style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <br>
        @endif
        <div class="mb-4">
            <label for="PetInput" class="form-label">Name a pet</label>
            <input
                type="text"
                class="form-control @if (strlen($pet) >= 3 && strlen($pet) <= 20) is-valid @else @error('pet') is-invalid @enderror @endif"
                   id="PetInput"
                   aria-describedby="PetInputValidationFeedback" placeholder="Pet name"  wire:model="pet" required>
            @if (strlen($pet) >= 3 && strlen($pet) <= 20)
                <div id="PetInputValidationFeedbak" class="valid-feedback"> {{ __('Valid') }} </div>
            @else
                @error('pet')
                    <div id="PetInputValidationFeedbak" class="invalid-feedback"> {{ $message }} </div>
                @enderror
            @endif
        </div>
        <div class="input-group mb-3 d-flex flex-column">
            <label for="PetImage" class="form-label">Select an image</label>
            <input type="file" id="PetImage" wire:model="image" class="form-control-file  @error('image') is-invalid @enderror" accept="image/*" id="{{$input_id}}">
            @if ($image)
                <div class="valid-feedback" id="PetImage"> {{ __('Valid Image') }} </div>
            @else
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            @endif
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" wire:click="resetModal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click="store" wire:loading.attr="disabled" wire:target="store, image" class="disabled:opacity: 0.5">Create pet</button>
    </div>
</div>
