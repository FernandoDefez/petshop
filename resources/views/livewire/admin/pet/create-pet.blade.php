<div>
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create a new pet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        {{--
        <div class="d-flex align-items-center justify-content-between">
            <p class="m-0 p-0">Uploading image, please wait</p>
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
        </div>
        <br>

        <div class="mb-1" style="width: 100%; height: 180px">
            <img src="https://images.pexels.com/photos/133069/pexels-photo-133069.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                 style="width: 100%; height: 100%">
        </div>--}}
        <br>
        <div class="mb-2">
            <label for="PetInput" class="form-label">Name a pet</label>
            <input type="text" class="form-control is-valid" id="PetInput"
                   aria-describedby="PetInputValidationFeedback" placeholder="Pet name"  wire:model="pet" required>
            <div id="PetInputValidationFeedbak" class="valid-feedback">  </div>
            <div id="PetInputValidationFeedbak" class="invalid-feedback"> Please insert a pet name. </div>
            {{ $pet }}
        </div>
        <br>
        Pet Image Selection Input
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="ImageInputLabel">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input is-invalid" id="ImageInput" aria-describedby="ImageInputLabel">
                <label class="custom-file-label" for="ImageInput">Choose file</label>
                <div class="valid-feedback" id="ImageInput">Image has been selected succesfully</div>
                <div class="invalid-feedback">Select an image</div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click="store">Create pet</button>
    </div>
</div>
