@extends('layouts.header')
@section('content')
       <section class="d-flex responsive-section-1 justify-content-between m-0 pt-3 flex-wrap" style="width: 100%; height: 100%">
           <div class="col-md-8" style="height: 100%; margin-bottom: 35px">
               <h5 class="font-weight-bold"> Payment </h5>
               <div class="rounded p-3 bg-white d-flex justify-content-between d-flex flex-wrap" style="margin-top: 2vh;">
                   <div class="col-lg-6 px-0">
                       <div class="mb-0">
                           <h6 class="font-weight-bold py-1 m-0"> Billing information </h6>
                       </div>
                       <hr>
                       <form class="p-2">
                           <div class="form-row">
                               <div class="col-md-12 mb-3">
                                   <label for="validationServer01">First name</label>
                                   <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                                   <div class="valid-feedback">
                                       Looks good!
                                   </div>
                               </div>
                               <div class="col-md-12 mb-3">
                                   <label for="validationServer02">E-mail</label>
                                   <input type="email" class="form-control is-valid" id="validationServer02" value="Otto" required>
                                   <div class="valid-feedback">
                                       Looks good!
                                   </div>
                               </div>
                           </div>
                           <div class="form-row">
                               <div class="col-md-12 mb-3">
                                   <label for="validationServer03">Phone Number</label>
                                   <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                   <div id="validationServer03Feedback" class="invalid-feedback">
                                       Please provide a valid phone number.
                                   </div>
                               </div>
                               <div class="col-md-12 mb-3">
                                   <label for="validationServer04">State</label>
                                   <select class="custom-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                       <option selected disabled value="">Choose...</option>
                                       <option>...</option>
                                   </select>
                                   <div id="validationServer04Feedback" class="invalid-feedback">
                                       Please select a valid state.
                                   </div>
                               </div>
                               <div class="col-md-12 mb-3">
                                   <label for="validationServer05">Zip</label>
                                   <input type="text" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                                   <div id="validationServer05Feedback" class="invalid-feedback">
                                       Please provide a valid zip.
                                   </div>
                               </div>
                           </div>
                           <div class="form-group">
                               <div class="form-check">
                                   <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                   <label class="form-check-label" for="invalidCheck3">
                                       Agree to terms and conditions
                                   </label>
                                   <div  id="invalidCheck3Feedback" class="invalid-feedback">
                                       You must agree before submitting.
                                   </div>
                               </div>
                           </div>
                           <button class="btn btn-primary" type="submit">Submit form</button>
                       </form>
                   </div>

                   <div class="col-lg-5 px-0">
                       <div class="mb-0">
                           <h6 class="font-weight-bold py-1 m-0"> Payment method </h6>
                       </div>
                       <hr>
                       <div class="col-12 rounded pt-4 px-2">
                           <form>
                               <div class="form-row align-items-center">
                                   <div class="col-12 my-1">
                                       <div class="custom-control custom-checkbox mr-sm-2 mb-4 d-flex align-items-center justify-content-between">
                                           <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                           <label class="custom-control-label" for="customControlAutosizing">Pay with PayPal</label>
                                           <img src="{{ asset('assets/paypal.svg') }}" alt=""  style="width: 60px; height: 50px">
                                       </div>
                                       <div class="custom-control custom-checkbox mr-sm-2 mb-5 d-flex align-items-center justify-content-between">
                                           <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                           <label class="custom-control-label" for="customControlAutosizing">Pay with Oxxo</label>
                                           <img src="{{ asset('assets/oxxo.svg') }}" alt=""  style="width: 45px; height: 35px">
                                       </div>
                                       <div class="custom-control custom-checkbox mr-sm-2 mb-5 d-flex align-items-center justify-content-between">
                                           <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                           <label class="custom-control-label" for="customControlAutosizing">Pay with Mércado Pago</label>
                                           <img src="{{ asset('assets/mercadopago.png') }}" alt=""  style="width: 68px; height: 22px">
                                       </div>
                                       <div class="custom-control custom-checkbox mr-sm-2 mb-5 d-flex align-items-center justify-content-between">
                                           <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                           <label class="custom-control-label" for="customControlAutosizing">Credit / Debit Card</label>
                                           <div class="d-flex justify-content-end">
                                               <img src="{{ asset('assets/mastercard.svg') }}" alt=""  style="width: 40px; height: 30px">
                                               <img src="{{ asset('assets/visa.svg') }}" alt=""  style="width: 45px; height: 35px">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>

           <div class="col-md-4" style="margin-bottom: 40px">
               <h5 class="font-weight-bold"> &nbsp; </h5>
               <div class="rounded p-3 bg-white" style="margin-top: 2vh;">
                   <h6 class="font-weight-bold py-1"> Cart summary </h6>
                   <hr>
                   <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                       <p class="m-0"> Subtotal </p>
                       <p class="m-0"> &dollar; 12.00 </p>
                   </div>
                   <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                       <p class="m-0"> Shipping </p>
                       <p class="m-0"> &dollar; 12.00 </p>
                   </div>
                   <div class="bg-light px-0 d-flex align-items-center justify-content-between font-weight-bold mb-3 px-3 py-2 rounded">
                       <p class="m-0"> Total </p>
                       <p class="m-0"> &dollar; 12.00 </p>
                   </div>
                   <div class="bg-light px-0 d-flex align-items-center justify-content-between font-weight-bold mb-3">
                       <button class="btn btn-primary btn-block font-weight-bold">
                           Checkout
                       </button>
                   </div>
               </div>
           </div>
       </section>
@endsection
