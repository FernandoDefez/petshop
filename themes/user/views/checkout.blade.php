@extends('layouts.header')
@section('content')
       <section class="d-flex responsive-section-1 justify-content-between m-0 pt-3 flex-wrap" style="width: 100%; height: 100%">
           <div class="col-md-8" style="height: 100%; margin-bottom: 35px">
               <h5> Realizar pago </h5>
               <div class="rounded p-3 bg-white d-flex justify-content-between d-flex flex-wrap shadow-sm" style="margin-top: 2vh;">
                   <div class="col-12 px-0">
                       <div class="mb-0">
                           <h6 class="py-1 m-0"> Información de envío </h6>
                       </div>
                       <hr>
                       <form class="p-2">
                           @guest
                           @else
                               <div class="form-row">
                                   <div class="col-md-6 col-12 mb-3">
                                       <label for="validationServer01">Nombre completo</label>
                                       <input type="text" class="form-control is-valid" id="validationServer01" value="{{ Auth::user()->name }}" required>
                                       <div class="valid-feedback">
                                           Looks good!
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-12 mb-3">
                                       <label for="validationServer02">E-mail</label>
                                       <input type="email" class="form-control is-valid" id="validationServer02" value="{{ Auth::user()->email }}" required>
                                       <div class="valid-feedback">
                                           Looks good!
                                       </div>
                                   </div>
                               </div>
                               <div class="form-row">
                                   <div class="col-md-6 col-12 mb-3">
                                       <label for="validationServer03">Phone Number</label>
                                       <input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
                                       <div id="validationServer03Feedback" class="invalid-feedback">
                                           Please provide a valid phone number.
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-12 mb-3">
                                       <label for="validationServer04">State</label>
                                       <select class="custom-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                                           <option selected disabled value="">Choose...</option>
                                           <option>...</option>
                                       </select>
                                       <div id="validationServer04Feedback" class="invalid-feedback">
                                           Please select a valid state.
                                       </div>
                                   </div>
                                   <div class="col-md-6 col-12 mb-3">
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
                           @endguest
                       </form>
                   </div>
               </div>
           </div>

           <div class="col-md-4" style="margin-bottom: 40px">
               <h5> &nbsp; </h5>
               <div class="rounded p-3 bg-white shadow-sm" style="margin-top: 2vh;">
                   <h6 class="py-1"> Resumen de compra </h6>
                   <hr>
                   <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                       <p class="m-0"> Subtotal </p>
                       <p class="m-0"> {{ '$' . number_format($subtotal, 2)   }} </p>
                   </div>
                   <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                       <p class="m-0"> Costo de envío </p>
                       <p class="m-0"> {{ '$' . number_format($shipping_cost, 2)   }} </p>
                   </div>
                   <div class="bg-light font-weight-bold px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-2 rounded">
                       <p class="m-0"> Total </p>
                       <p class="m-0"> {{ '$' . number_format($total, 2)   }} </p>
                   </div>
                   <div class="bg-light px-0 d-flex align-items-center justify-content-between mb-3">
                       <a class="btn btn-outline-primary font-weight-bold btn-block py-0" href="{{ route('paypal.payment') }}">
                           Pagar con <img src="{{ asset('images/paypal.svg') }}" alt=""  style="width: 60px; height: 50px">
                       </a>
                   </div>
                   <div class="bg-light px-0 d-flex align-items-center justify-content-between mb-3">
                       <button class="btn btn-outline-primary font-weight-bold btn-block py-0">
                           Pagar con <img src="{{ asset('images/oxxo.svg') }}" alt=""  style="width: 45px; height: 35px">
                       </button>
                   </div>
                   <div class="bg-light px-0 d-flex align-items-center justify-content-between mb-3">
                       <button class="btn btn-outline-primary font-weight-bold btn-block py-0">
                           Pagar con <img src="{{ asset('images/visa.svg') }}" alt=""  style="width: 45px; height: 35px">
                       </button>
                   </div>
                   <div class="bg-light px-0 d-flex align-items-center justify-content-between mb-3">
                       <button class="btn btn-outline-primary font-weight-bold btn-block py-2">
                           Pagar con <img src="{{ asset('images/mastercard.svg') }}" alt=""  style="width: 40px; height: 30px">
                       </button>
                   </div>
               </div>
           </div>
       </section>
@endsection
