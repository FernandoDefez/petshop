@extends('layouts.header')

@section('style')
<style>
    .product {
        width: 18.3%;
    }

    /*Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 576px) {
        .product {
            width: 46%;
        }

        .product-image {
            height: 140px !important;
        }
    }

    /*Small devices (landscape phones, 576px and up)*/
    @media (min-width: 576px) and (max-width: 767.98px) {
        .product {
            width: 30%;
        }
    }

    /*Medium devices (tablets, less than 992px)*/
    @media (min-width: 768px) and (max-width: 991.98px) {
        .product {
            width: 28%;
        }
    }

    @media (max-width: 768px) {
        .responsive-section-2 {
            flex-direction: column !important;
        }
    }

    /*Large devices (desktops, less than 1200px)*/
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .product {
            width: 22.7%;
        }
    }

</style>
@endsection

@section('content')
    <section class="responsive-section-2 d-flex justify-content-between m-0 p-0" style="width: 100%; height: 100%">
        <div class="col-md-2" style="height: 100%; margin-bottom: 35px">
            <div class="d-flex justify-content-between align-items-center py-3 mb-2">
                <h5 class="mb-0"> {{ __('Categorías') }} </h5>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach ($pets as $pet)
                    <div class="card">
                        <div class="card-header bg-white p-1" id="heading{{ $pet->id }}">
                            <h2 class="mb-0">
                                <button class="btn text-primary btn-block text-left d-flex justify-content-between" type="button"
                                    data-toggle="collapse" data-target="#collapse{{ $pet->id }}" @if ($pet->id == 1) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapse{{ $pet->id }}">
                                    <p class="p-0 m-0">{{ strtolower($pet->name) }}</p>
                                    <i class="bi bi-chevron-down"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapse{{ $pet->id }}" class="collapse"
                            aria-labelledby="heading{{ $pet->id }}" data-parent="#accordionExample">
                            <div class="card-body px-3 py-2 d-flex flex-column">
                                @foreach ($categories as $category)
                                    @if ($pet->id == $category->pet_id)
                                        <a href="{{ route('products', ['pet' => strtolower($pet->name), 'category' => strtolower($category->name)]) }}"
                                            class="text-secondary col-12 px-2 text-decoration-none">
                                            {{ strtolower($category->name) }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-md-10" style="margin-bottom: 35px">
            <div class="d-flex justify-content-between align-items-center py-2">
                <h5 class="mb-0"> {{ __('Productos') }} </h5>
                <livewire:product-search-bar />
            </div>
            <div class="pt-2 mt-0 px-0" style="min-height: 200px">
                <div class="row justify-content-between m-0 p-0" style="width: 100%; height: 100%">
                    <div class="col-12 px-0" style="height: 100%;">
                        <div class="d-flex justify-content-between align-items-center px-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent py-1 px-0  mb-0">
                                    <li class="breadcrumb-item text-primary" aria-current="page">
                                        <a href="{{ route('home') }}"><i class="bi bi-house-fill"></i></a>
                                    </li>
                                    @if ($selected_pet)
                                        <li class="breadcrumb-item text-primary" aria-current="page">
                                            <a href="{{ route('home') }}" class="text-decoration-none">
                                                {{ strtolower($selected_pet) }} </a>
                                        </li>
                                    @endif
                                    @if ($selected_category)
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="{{ route('products', ['pet' => strtolower($selected_pet), 'category' => strtolower($selected_category)]) }}"
                                                class="active text-secondary text-decoration-none">
                                                {{ strtolower($selected_category) }}
                                            </a>
                                        </li>
                                    @endif
                                </ol>
                            </nav>
                        </div>
                        <div class="p-0 py-2">
                            <div class="d-flex flex-wrap justify-content-start" style="width: 100%;">
                                @forelse($products as $product)
                                    <article class="card m-2 px-0 product shadow-sm">
                                        <div class="card-body pb-1 px-3 py-2">
                                            <div class="col-12 product-image" style="height: 125px">
                                                <a href="{{ route('product', ['product' => $product->slug]) }}">
                                                    <img src="{{ asset('storage/products/' . $product->img) }}"
                                                        style="height: 100%; width: 100%" alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="col-12 px-0 py-2 pb-0 mb-0 d-flex flex-column justify-content-between">
                                                <a class="col-12 mt-0 mb-1 px-0 text-decoration-none"
                                                    href="{{ route('product', ['product' => $product->slug]) }}">
                                                    {{ $product->name }}
                                                </a>
                                                <!---<span class="col-12 mb-2 m-0 p-0 text-danger"> {{ $product->availability }} </span>--->
                                                <h5 class="col-12 m-0 mb-0 px-0">
                                                    {{ '$' . number_format($product->price, 2) }}
                                                </h5>
                                            </div>
                                        </div>
                                        @guest
                                            <div class="card-footer bg-white px-3 add-to-cart position-relative">
                                                <a href="#" class="btn btn-primary font-weight-bold btn-block">
                                                    Añadir al carrito
                                                </a>
                                                <div class="p-0 position-absolute w-100 d-none align-items-center
                                                             justify-content-around add-to-cart-req"
                                                    style="box-sizing: border-box; font-size: 12px;">
                                                    <a class="nav-link text-primary p-0 py-2" href="{{ route('login') }}">
                                                        Iniciar sesión
                                                    </a>
                                                    <a class="nav-link text-secondary p-0" href=" {{ route('register') }} ">
                                                        Registrarse
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            @if ($product->availability <= 0)
                                            <div class="card-footer bg-white px-3">
                                                <form class="m-0 p-0">
                                                    <button class="btn btn-primary font-weight-bold btn-block"
                                                        value="Add to cart" disabled>
                                                        Añadir al carrito
                                                    </button>
                                                </form>
                                            </div>
                                            @else
                                            <div class="card-footer bg-white px-3">
                                                <form action="{{ route('cart') }}" method="post" class="m-0 p-0">
                                                    @csrf
                                                    <input type="number" class="d-none" name="product_id"
                                                        value="{{ $product->id }}" />
                                                    <input type="number" class="d-none" name="product_price"
                                                           value="{{ $product->price }}" />
                                                    <input type="submit"
                                                        class="btn btn-primary font-weight-bold btn-block"
                                                        value="Añadir al carrito">
                                                </form>
                                            </div>
                                            @endif
                                        @endguest
                                    </article>
                                @empty
                                    <div class="col-12 p-2 py-2">
                                        <div class="alert alert-danger col-12" role="alert">
                                            <h4 class="alert-heading">No se encontró ningún producto!</h4>
                                            <hr>
                                            <p class="mb-0">Puedes intentar escribir el nombre del producto que estás
                                                buscando, en la caja de texto. <strong>Buscar producto</strong> ubicado
                                                en la esquina superior derecha
                                            </p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <br>
                        <div class="col-12 d-flex justify-content-center">
                            @if ($products->links())
                                {{ $products->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    @if(session()->exists('message'))
        <script>
            Swal.fire({
                icon: '{{ session()->get('status')  }}',
                title: '{{ session()->get('message') }}',
                timer: 3000
            })
        </script>
    @endif
@endsection
