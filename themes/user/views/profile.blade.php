@extends('layouts.header')
<style>
    /*Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {

    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {

    }

    /*Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {

    }
</style>
@section('style')
@endsection

@section('content')
    <section class="d-flex justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
        <div class="col-12" style="height: 100%; margin-bottom: 35px; width: 73%">
            <h5 class="font-weight-bold"> Profile </h5>
            <div class="rounded p-3 bg-white" style="margin-top: 2vh; width: 100%">

                {{--- Account Setting ---}}
                <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="font-weight-bold py-1 mb-0"> Account Settings </h6>
                        <hr>
                    </div>
                </div>
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">First name</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">E-mail</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" value="Otto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer03">Phone Number</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer05">Zip</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary font-weight-bold" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>




                {{--- Shipping Settings ---}}
                <div class="container d-flex p-0 justify-content-between">
                    <div class="rounded col-12 px-0">
                        <h6 class="font-weight-bold py-1 mb-0"> Shipping Address </h6>
                        <hr>
                    </div>
                </div>
                <div class="container d-flex p-0 justify-content-between">
                    <div class="col-12 rounded p-2 px-3">
                        <form>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer01">First name</label>
                                    <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer02">E-mail</label>
                                    <input type="email" class="form-control is-valid" id="validationServer02" value="Otto" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer03">Phone Number</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        Please provide a valid phone number.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer05">Zip</label>
                                    <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button class="btn btn-primary font-weight-bold" type="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
