<section class="d-flex responsive-section-1 justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
    <div class="col-md-8" style="height: 100%; margin-bottom: 35px">
        <h5 class="font-weight-bold"> Cart </h5>
        <div class="rounded p-3 bg-white" style="margin-top: 2vh;">
            <div class="d-flex justify-content-between align-items-center mb-0">
                <h6 class="font-weight-bold py-1 m-0"> Shopping cart </h6>
                <h6 class="font-weight-bold py-1 m-0 d-flex"> Total items:
                    <span class="font-weight-normal ml-2 font-weight-bold text-primary"> <livewire:cart-items-counter /> </span>
                </h6>
            </div>
            <hr>
            <div class="px-0 d-block align-items-center justify-content-between font-weight-bold mb-3 py-1 rounded w-100">
                @forelse($items as $item)
                    <div class="m-0 p-0 d-flex justify-content-start align-items-start flex-wrap w-100">
                        <div class="mr-2 m-auto p-2" style="height: 190px; width: 175px">
                            <img src="{{asset('storage/products/'.$item->img)}}"
                                 style="height: 100%; width: 100%"
                                 alt="">
                        </div>
                        <div class="m-0 p-2 mt-2 flex-fill">
                            <div class="d-flex justify-content-between">
                                <h5 class="p-0 m-0 py-2">
                                    <a class="nav-link text-primary p-0 m-0" href="{{ route('product', ['product' => $item->slug]) }}">
                                        {{ $item->name }}
                                    </a>
                                </h5>
                                <div class="col-2 m-0 p-0 font-weight-bold d-flex align-items-baseline justify-content-end">
                                    <h2 class="mt-1 text-secondary px-0" wire:click="destroy({{$item->id}})" style="cursor: pointer">
                                        <i class="bi bi-x"></i>
                                    </h2>
                                </div>
                            </div>
                            <br>
                            <div class="m-0 p-0 d-flex py-3 col-12 align-items-center justify-content-between">
                                <div class="input-group p-0 d-flex" style="width: 95px">
                                    <button class="btn btn-light btn-sm font-weight-bold"
                                            wire:click="decrement({{$item->item_id}}, {{$item->id}}, {{$item->quantity}})"> &minus;
                                    </button>
                                    <input type="text" class="form-control text-center mx-1 p-0"
                                           value="{{$item->quantity}}" disabled>
                                    <button class="btn btn-light btn-sm font-weight-bold"
                                            wire:click="increment({{$item->item_id}})"> &plus;
                                    </button>
                                </div>
                                <div class="m-0 p-0 d-flex justify-content-end">
                                    <h3 class=" m-0 p-0 font-weight-bold d-flex align-items-center justify-content-end">
                                        <span>&dollar;{{ $item->quantity * sprintf("%.2f",  $item->price) }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @empty
                    @guest
                        <div class="m-0 p-0 d-flex justify-content-start align-items-start flex-wrap w-100">
                            <div class="p-0 w-100 d-flex align-items-center justify-content-center" style="box-sizing: border-box">
                                <a class="nav-link text-primary p-0 py-2 mx-2" href="{{ route('login')  }}">
                                    Log In
                                </a>
                                <p class="mx-1 mb-0"> or </p>
                                <a class="nav-link text-secondary p-0 mx-2" href=" {{ route('register')  }} ">
                                    Sign Up
                                </a>
                            </div>
                        </div>
                        <br>
                    @else
                        <div class="m-0 p-0 d-flex justify-content-start align-items-start flex-wrap w-100">
                            <div class="p-0 w-100 d-flex align-items-center justify-content-center" style="box-sizing: border-box">
                                <p class="mx-1 mb-0"> {{ __('There is no items in your cart yet') }} </p>
                            </div>
                        </div>
                        <br>
                    @endguest
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-bottom: 40px">
        <h5 class="font-weight-bold"> &nbsp; </h5>
        <div class="rounded p-3 bg-white" style="margin-top: 2vh;">
            <h6 class="font-weight-bold py-1"> Cart summary </h6>
            <hr>
            @if(!$subtotal == 0)
                <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                    <p class="m-0"> Subtotal </p>
                    <p class="m-0">
                        &dollar;{{ $subtotal }}
                    </p>
                </div>
                <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                    <p class="m-0"> Shipping cost </p>
                    <p class="m-0"> &dollar;{{ sprintf("%.2f", $shippingCost)  }} </p>
                </div>
                <div class="bg-light px-0 d-flex align-items-center justify-content-between font-weight-bold mb-3 px-3 py-2 rounded">
                    <p class="m-0"> Total </p>
                    <p class="m-0"> &dollar;{{ $total }} </p>
                </div>
                <div class="bg-light px-0 d-flex align-items-center justify-content-between font-weight-bold mb-3">
                    <button class="btn btn-primary btn-block font-weight-bold">
                        Checkout
                    </button>
                </div>
                <br>
            @else
                @guest
                    <div class="m-0 p-0 d-flex justify-content-start align-items-start flex-wrap w-100">
                        <div class="p-0 w-100 d-flex align-items-center justify-content-center" style="box-sizing: border-box">
                            <a class="nav-link text-primary p-0 py-2 mx-2" href="{{ route('login')  }}">
                                Log In
                            </a>
                            <p class="mx-1 mb-0"> or </p>
                            <a class="nav-link text-secondary p-0 mx-2" href=" {{ route('register')  }} ">
                                Sign Up
                            </a>
                        </div>
                    </div>
                    <br>
                @else
                    <div class="pt-2 w-100 mx-auto">
                        <div class="p-0 w-100 d-flex align-items-center justify-content-center" style="box-sizing: border-box">
                            <p class="m-0 mb-0 font-weight-bold"> {{ __('There is no items in your cart yet') }} </p>
                        </div>
                    </div>
                    <br>
                @endguest
            @endif
        </div>
    </div>
</section>
