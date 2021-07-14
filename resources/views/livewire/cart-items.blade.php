<section class="d-flex responsive-section-1 justify-content-between m-0 pt-4" style="width: 100%; height: 100%">
    <div class="col-md-8" style="height: 100%; margin-bottom: 35px">
        <h5 class="m-0 p-0"> Carrito </h5>
        <div class="rounded p-3 bg-white shadow-sm" style="margin-top: 2vh;">
            <div class="d-flex justify-content-between align-items-center mb-0">
                <h6 class="py-1 m-0"> Articulos en el carrito </h6>
                <h6 class="py-1 m-0 d-flex"> Total de artículos:
                    <span class="font-weight-normal ml-2 text-secondary"> <livewire:cart-items-counter /> </span>
                </h6>
            </div>
            <hr>
            <div class="px-0 d-block align-items-center justify-content-between mb-2 py-1 rounded w-100">
                @forelse($items as $item)
                    <div class="m-0 p-0 d-flex justify-content-start align-items-center flex-wrap w-100">
                        <div class="m-0 p-0 col-lg-2">
                            <div class="p-1" style="width: 100px; height: 110px;">
                                <img src="{{asset('storage/products/'.$item->img)}}"
                                     style="height: 100%; width: 100%"
                                     alt="">
                            </div>
                        </div>
                        <div class="m-0 p-0 col-lg-5">
                            <h5 class="p-0 m-0 py-2 flex-fill">
                                <a class="nav-link text-primary d-inline p-0 m-0" href="{{ route('product', ['product' => $item->slug]) }}">
                                    {{ $item->name }}
                                </a>
                            </h5>
                            <div class="m-0 p-0">
                                <p class="text-danger m-0 p-0" style="font-size: 10px"> {{ $item->availability }} disponible(s) </p>
                            </div>
                        </div>
                        <div class="m-0 p-0 col-lg-1 col-3 d-flex">
                            <h6 class="m-0 p-0 d-flex align-items-center justify-content-start">
                                <span>{{ '$' . number_format($item->price, 2) }}</span>
                            </h6>
                        </div>
                        <div class="d-flex m-0 p-0 col-lg-2 col-3 d-flex justify-content-center">
                            <div class="input-group p-0 d-flex align-items-center" style="width: 75px;">
                                <button class="btn btn-light btn-sm" style="font-size: 5px"
                                        wire:click="decrement({{$item->item_id}}, {{$item->id}}, {{$item->quantity}}, {{$item->price}})"> &minus;
                                </button>
                                <input type="text" class="form-control text-center mx-0 p-0"
                                       value="{{$item->quantity}}" disabled style="font-size: 7px">
                                @if ($item->quantity < $item->availability )
                                    <button class="btn btn-light btn-sm" style="font-size: 5px"
                                            wire:click="increment({{$item->item_id}}, {{$item->price}})"> &plus;
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="m-0 p-0 col-lg-1 col-3">
                            <h6 class="m-0 p-0 d-flex align-items-center justify-content-end">
                                <span>{{ '$' . number_format($item->total_price, 2) }}</span>
                            </h6>
                        </div>
                        <div class="m-0 p-0 col-lg-1 col-3">
                            <h3 class="mt-1 text-secondary d-flex align-items-center justify-content-end px-0" wire:click="destroy({{$item->id}})" style="cursor: pointer">
                                <i class="bi bi-x"></i>
                            </h3>
                        </div>
                    </div>
                @empty
                    <div class="m-0 p-0 d-flex justify-content-start align-items-start flex-wrap w-100">
                        <div class="p-0 w-100 d-flex align-items-center flex-column justify-content-center" style="box-sizing: border-box">
                            <p class="m-0 mb-3"> {{ __('No hay artículos en tu carrito de compras') }} </p>
                            <a href="{{ route('home') }}" class="btn btn-dark font-weight-bold">Ver Productos</a>
                        </div>
                    </div>
                    <br>
                @endforelse
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end p-0 m-0 mt-4">
            <a href="{{ route('home') }}" class="text-decoration-none m-0 p-0">&leftarrow; Seguir comprando</a>
        </div>
    </div>
    <div class="col-md-4" style="margin-bottom: 40px">
        <h5> &nbsp; </h5>
        <div class="rounded p-3 bg-white shadow-sm" style="margin-top: 2vh;">
            <h6 class="py-1"> Resumen de compra </h6>
            <hr>
            @if(!$subtotal == 0)
                <div class="m-0 p-0">
                    <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                        <p class="m-0"> Subtotal </p>
                        <p class="m-0">
                            {{ '$' . number_format($subtotal, 2)  }}
                        </p>
                    </div>
                    <div class="px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-1">
                        <p class="m-0"> Costo de envío </p>
                        <p class="m-0"> {{ '$' . number_format($shipping_cost, 2)   }} </p>
                    </div>
                    <div class="bg-light px-0 d-flex align-items-center justify-content-between mb-3 px-3 py-2 rounded font-weight-bold">
                        <p class="m-0"> Total </p>
                        <p class="m-0"> {{ '$' . number_format($total, 2) }} </p>
                    </div>
                    <div class="bg-light px-0 d-flex align-items-center justify-content-between mb-3">
                        <a href="{{route('checkout')}}" class="btn btn-primary font-weight-bold btn-block"> Checkout </a>
                    </div>
                </div>
            @else
                <div class="pt-2 w-100 mx-auto">
                    <div class="p-0 w-100 d-flex align-items-center justify-content-center" style="box-sizing: border-box">
                        <p class="m-0 mb-0"> {{ __('No hay artículos en tu carrito de compras') }} </p>
                    </div>
                </div>
                <br>
            @endif
        </div>
    </div>
</section>
