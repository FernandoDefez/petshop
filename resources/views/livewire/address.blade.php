<div class="p-0 m-0">
    @if ($user_address)
    <div class="container d-flex p-0 justify-content-between">
        <div class="rounded col-12 px-0">
            <h6 class="py-1 mb-0"> Your address </h6>
            <hr>
        </div>
    </div>
    <div class="container d-flex p-0 justify-content-between">
        <div class="col-12 rounded p-2 px-3">
            <div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer01">City</label>
                        <input wire:model="city" type="text" class="form-control @error('city') is-invalid @enderror" id="validationServer01" 
                                value="{{ $user_address->city }}" name="city" placeholder="Enter your city" required>
                        @error('city')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationServer02">Suburb</label>
                        <input wire:model="suburb" type="text" class="form-control @error('suburb') is-invalid @enderror" id="validationServer02" 
                                value="{{ $user_address->suburb }}" name="suburb" placeholder="Enter your suburb" required>
                        @error('suburb')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer03">Address 1</label>
                        <input wire:model="add1" type="text" class="form-control @error('add1') is-invalid @enderror" id="validationServer03" 
                                value="{{ $user_address->add1 }}" name="add1" placeholder="Enter your 1st address" required>
                        @error('add1')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationServer04">Address 2</label>
                        <input wire:model="add2" type="text" class="form-control @error('add2') is-invalid @enderror" id="validationServer04" 
                                value="{{ $user_address->add2 }}" name="add2" value="" placeholder="Enter your 2nd address" required>
                        @error('add2')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer05">Zip</label>
                        <input wire:model="zip" type="text" class="form-control @error('zip') is-invalid @enderror" id="validationServer05" aria-describedby="validationServer05Feedback" 
                                value="{{ $user_address->zip }}" name="zip" placeholder="Enter your zip" required>
                        @error('zip')
                            <div id="validationServer05Feedback" class="invalid-feedback"> Please provide a valid zip. </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationServer06">Phone Number</label>
                        <input wire:model="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" id="validationServer06" aria-describedby="validationServer06Feedback" 
                                value="{{ $user_address->phone_number }}" name="phone_number" placeholder="Enter your phone number" required>
                        @error('phone_number')
                            <div id="validationServer06Feedback" class="invalid-feedback"> Please provide a valid phone number. </div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm font-weight-bold" wire:click="store">Update Address</button>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container d-flex p-0 justify-content-between">
        <div class="rounded col-12 px-0">
            <h6 class="py-1 mb-0"> Your address </h6>
            <hr>
        </div>
    </div>
    <div class="container d-flex p-0 justify-content-between">
        <div class="col-12 rounded p-2 px-3">
            <div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer07">City</label>
                        <input wire:model="city" type="text" class="form-control @error('city') is-invalid @enderror" id="validationServer07" 
                                value="" name="city" placeholder="Enter your city" required>
                        @error('city')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationServer08">Suburb</label>
                        <input wire:model="suburb" type="text" class="form-control @error('suburb') is-invalid @enderror" id="validationServer08" 
                                value="" name="suburb" placeholder="Enter your suburb" required>
                        @error('suburb')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer09">Address 1</label>
                        <input wire:model="add1" type="text" class="form-control @error('add1') is-invalid @enderror" id="validationServer09" 
                                value="" name="add1" placeholder="Enter your 1st address" required>
                        @error('add1')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationServer10">Address 2</label>
                        <input wire:model="add2" type="text" class="form-control @error('add2') is-invalid @enderror" id="validationServer10" 
                                value="" name="add2" value="" placeholder="Enter your 2nd address" required>
                        @error('add2')
                            <div class="invalid-feedback"> {{$message}} </div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer11">Zip</label>
                        <input wire:model="zip" type="text" class="form-control @error('zip') is-invalid @enderror" id="validationServer11" aria-describedby="validationServer11Feedback" 
                                value="" name="zip" placeholder="Enter your zip" required>
                        @error('zip')
                            <div id="validationServer11Feedback" class="invalid-feedback"> Please provide a valid zip. </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationServer12">Phone Number</label>
                        <input wire:model="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" id="validationServer06" aria-describedby="validationServer12Feedback" 
                                value="" name="phone_number" placeholder="Enter your phone number" required>
                        @error('phone_number')
                            <div id="validationServer06Feedback" class="invalid-feedback"> Please provide a valid phone number. </div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm font-weight-bold" wire:click="store">Save Address</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>