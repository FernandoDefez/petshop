@extends('layouts.header')

@section('content')
     <section class="d-flex justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
        <div class="col-12" style="height: 100%; margin-bottom: 35px; width: 73%">
            <h5> Profile </h5>
            <div class="rounded p-3 bg-white" style="margin-top: 2vh; width: 100%">
                <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="py-1 mb-0"> Account Settings </h6>
                        <hr>
                    </div>
                </div>
               {{-- Account Settings --}}
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Fullname</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" 
                                        value="{{ $user->name }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">E-mail</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" 
                                        value="{{ $user->email }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer05">Password</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary font-weight-bold btn-sm" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Address Settings --}}
                @if ($user_address)
                <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="py-1 mb-0"> My Address </h6>
                        <hr>
                    </div>
                </div>
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">City</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" 
                                        value="{{ $user_address->city }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">Suburb</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" 
                                        value="{{ $user_address->suburb }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Address 1</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" 
                                        value="{{ $user_address->add1 }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">Address 2</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" 
                                        value="{{ $user_address->add2 }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer05">Zip</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" 
                                        value="{{ $user_address->zip }}" required>
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer03">Phone Number</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" 
                                        value="{{ $user_address->phone_number }}" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm font-weight-bold" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
               @else
               <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="py-1 mb-0"> My Address </h6>
                        <hr>
                    </div>
                </div>
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form action="{{ route('address') }}" method="post">
                         @csrf
                         <input type="number" class="d-none" name="user_id" value="{{ $user->id }}" />
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">City</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" 
                                        name="city" placeholder="Enter your city" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">Suburb</label>
                                    <input type="text" class="form-control is-valid" id="validationServer02" 
                                        name="suburb" placeholder="Enter your suburb" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer03">Address 1</label>
                                    <input type="text" class="form-control is-valid" id="validationServer03" 
                                        name="add1" placeholder="Enter your 1st address" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer04">Address 2</label>
                                    <input type="text" class="form-control is-valid" id="validationServer04" 
                                        name="add2" value="" placeholder="Enter your 2nd address" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer05">Zip</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" 
                                        name="zip" placeholder="Enter your zip" required>
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer06">Phone Number</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer06" aria-describedby="validationServer06Feedback" 
                                        name="phone_number" placeholder="Enter your phone number" required>
                                    <div id="validationServer06Feedback" class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm font-weight-bold" type="submit">Save Address</button>
                            </div>
                        </form>
                    </div>
                </div>
               @endif
            </div>
        </div>
    </section>
@endsection

{{--
@section('content')
    <section class="d-flex justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
        <div class="col-12" style="height: 100%; margin-bottom: 35px; width: 73%">
            <h5> Profile </h5>
            <div class="rounded p-3 bg-white" style="margin-top: 2vh; width: 100%">
                <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="py-1 mb-0"> Account Settings </h6>
                        <hr>
                    </div>
                </div>
                    Account Settings
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Fullname</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" 
                                        value="{{ /*$user->name*/ }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">E-mail</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" 
                                        value="{{ /*$user->email*/ }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer05">Password</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary font-weight-bold btn-sm" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                Address Settings
                <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="py-1 mb-0"> My Address </h6>
                        <hr>
                    </div>
                </div>
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">City</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" 
                                        value="{{ /*$user_address->city*/ }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">Suburb</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" 
                                        value="{{ /*$user_address->suburb*/ }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">Address 1</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" 
                                        value="{{ /*$user_address->add1*/ }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">Address 2</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" 
                                        value="{{ /*$user_address->add2*/ }}" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer05">Zip</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" 
                                        value="{{ /*$user_address->zip*/ }}" required>
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer03">Phone Number</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" 
                                        value="{{ /*$user_address->phone_number*/ }}" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary btn-sm font-weight-bold" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}