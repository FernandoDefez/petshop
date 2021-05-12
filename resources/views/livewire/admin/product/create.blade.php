<div class="modal-content bg-light shadow-sm">
    <div class="modal-header">
        <h5 class="modal-title">Create a new product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <!-- Image Column --->
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show col-12" wire:loading wire:loading.attr="disabled" wire:target="image" role="alert">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <strong>Uploading image, </strong> please wait
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if($image)
                    <div class="mb-4">
                        <img
                            loading="lazy"
                            decoding="async"
                            src="{{ $image->temporaryUrl() }}"
                            style="width: 100%; height: 100%; object-fit: cover;"
                            alt="...">
                    </div>
                @endif
            </div>
            <!-- Information Column --->
            <div class="col-12">
                <form>
                    <!-- First Row --->
                    <div class="form-row">
                        <!-- Pet Selector --->
                        <div class="form-group col-sm-6 text-secondary">
                            <label for="selectPetInput">Choose a Pet</label>
                            <select
                                wire:model="selectedPet"
                                id="selectPetInput"
                                class="form-control px-2
                                @if ($selectedPet >= 1)
                                     is-valid
                                @else
                                    @error('selectedPet')
                                    is-invalid
                                    @enderror
                                @endif"
                                aria-describedby="SelectPetValidationFeedbak">
                                <option value="" selected>Choose a pet</option>
                                @foreach($pets as $pet)
                                    <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                                @endforeach
                            </select>
                            @if ($selectedPet >= 1)
                                <div class="valid-feedback"> {{ __('Valid') }} </div>
                            @else
                                @error('selectedPet')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            @endif
                        </div>

                        <!-- Category Selector --->
                        @if (!is_null($selectedPet))
                        <div class="form-group col-sm-6 text-secondary">
                            <label for="selectCategoryInput">Choose a Category</label>
                            <select
                                wire:model="selectedCategory"
                                id="selectCategoryInput"
                                class="form-control px-2
                                 @if ($selectedCategory >= 1)
                                    is-valid
                                @else
                                @error('selectedPet')
                                    is-invalid
                                    @enderror
                                @endif">
                                <option value="" selected>Choose a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($selectedCategory >= 1)
                                <div class="valid-feedback"> {{ __('Valid') }} </div>
                            @else
                                @error('selectedCategory')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            @endif
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <!-- Upload Image --->
                        <div class="form-group col-sm-12 p-0 text-secondary">
                            <label for="productImageInput">Upload an image</label>
                            <input type="file" wire:model="image" class="form-control-file @if($image) is-valid @else @error('image') is-invalid @enderror @endif" id="productImageInput" accept="image/png">
                            @if($image)
                                <div class="valid-feedback"> {{ __('Valid Image') }} </div>
                            @else
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <!-- Second Row --->
                    <div class="form-row">
                        <!-- Set Product Name --->
                        <div class="form-group col-sm-12 text-secondary">
                            <label for="productInput">Product Name</label>
                            <input type="text" wire:model="product" class="form-control @if ($product) is-valid @else @error('product') is-invalid @enderror @endif" id="productInput"
                                   placeholder="Product">
                            @if ($product)
                                <div class="valid-feedback"> {{ __('Valid') }} </div>
                            @else
                                @error('product')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <!-- Third Row --->
                    <div class="form-row mb-1">
                        <!-- Set Quantity Available --->
                        <div class="form-group col-6 text-secondary">
                            <label for="AvailabiltyInput" class="">Quantity Available</label>
                            <input type="number" wire:model="availability"
                                   class="form-control @if($availability) is-valid @else @error('availability') is-invalid @enderror @endif"
                                   id="AvailabiltyInput" placeholder="Set Quantity Available">
                            @if ($availability)
                                <div class="valid-feedback"> {{ __('Valid') }} </div>
                            @else
                                @error('price')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            @endif
                        </div>
                        <!-- Set Price --->
                        <div class="form-group col-6 text-secondary">
                            <label for="PriceInput" class="">Price</label>
                            <input type="text" wire:model="price"
                                   class="form-control @if($price) is-valid @else @error('price') is-invalid @enderror @endif"
                                   id="PriceInput" placeholder="Set price">
                            @if ($price)
                                <div class="valid-feedback"> {{ __('Valid') }} </div>
                            @else
                                @error('price')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            @endif
                        </div>
                    </div>

                    <!-- Fourth Row --->
                    <div class="form-row">
                        <div class="form-group col-12 text-secondary">
                            <label for="descriptionTextArea">Description</label>
                            <textarea class="form-control @if($description) is-valid @else @error('description') is-invalid @enderror @endif"
                                      wire:model="description" id="descriptionTextArea" rows="2" placeholder="Write a description about the product"></textarea>
                            @if ($description)
                                <div class="valid-feedback"> {{ __('Valid') }} </div>
                            @else
                                @error('description')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary font-weight-bold btn-sm" wire:click="resetModal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary font-weight-bold btn-sm" wire:click="store" wire:loading.attr="disabled" wire:target="store, image" class="disabled:opacity: 0.5">Create product</button>
    </div>
</div>
