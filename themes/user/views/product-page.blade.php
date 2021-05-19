@extends('layouts.header')

@section('style')
    <style>
        /*Medium devices (tablets, 768px and up)*/
        @media (max-width: 768px) {
            .product-img {
                width: 100% !important;
                border-bottom-left-radius: 0 !important;
                border-bottom-right-radius: 0;
                border-top-right-radius: 5px;
            }

            .product-img img {
                height: 500px !important;
            }

            .product-desc {
                width: 100% !important;
                border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;
                border-top-right-radius: 0 !important;
                border-top-left-radius: 0;
            }

            .responsive-section-2 {
                flex-direction: column !important;
            }
        }

    </style>
@endsection

@section('content')
    <section class="d-flex responsive-section-1 justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
        <div class="col-sm-8" style="height: 100%; margin-bottom: 35px">
            <h5> Home </h5>
            <div class="rounded p-3 bg-white d-flex flex-column justify-content-between shadow-sm"
                style="margin-top: 2vh; height: 185px">
                <h6 class="py-1"> Welcome </h6>
                <p>
                    Hello,
                    @guest
                        {{ __('dear customer.') }}
                    @else
                        {{ 'dear ' . Auth::user()->name . '. ' }}
                    @endguest Welcome to this page where you can find as many products as you want for your pets.
                </p>
                <div class="d-flex">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-success btn-sm"> {{ __('Login') }} </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-light btn-sm mx-3">
                                {{ __('Register') }} </a>
                        @endif
                    @else
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 40px">
            <h5> Pets </h5>
            <div class="rounded shadow-sm" style="margin-top: 2vh; height: 185px">
                <div class="splide rounded position-relative overflow-hidden" id="splide" style="height: 100%">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($pets as $pet)
                                <li class="splide__slide" style="height: 200px;">
                                    <div class="rounded position-relative" style="height: 200px;">
                                        <div class="bg-dark position-absolute" style="width: 100%; height: 100%;">
                                            <img src="{{ asset('storage/pets/' . $pet->img) }}" alt=""
                                                style="width: 100%; height: 100%; object-fit: cover; background-color:rgba(0,0,0,0.7); opacity: 0.5;">
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <section class="responsive-section-2 d-flex justify-content-between m-0 p-0" style="width: 100%; height: 100%">
        <div class="col-md-2" style="height: 100%; margin-bottom: 35px">
            <div class="d-flex justify-content-between align-items-center py-3 mb-2">
                <h5 class="mb-0"> {{ __('Categories') }} </h5>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach ($pets as $pet)
                    <div class="card">
                        <div class="card-header bg-white p-1" id="heading{{ $pet->id }}">
                            <h2 class="mb-0">
                                <button class="btn text-primary btn-block text-left" type="button"
                                    data-toggle="collapse" data-target="#collapse{{ $pet->id }}" @if ($pet->id == 1) aria-expanded="true" @else aria-expanded="false" @endif aria-controls="collapse{{ $pet->id }}">
                                    {{ strtolower($pet->name) }}
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
                <h5 class="mb-0"> {{ __('Product') }} </h5>
                <livewire:product-search-bar />
            </div>

            {{-- Product --}}
            <div class="pt-2 mt-0 px-0" style="min-height: 200px">
                <div class="row justify-content-between m-0 p-0" style="width: 100%; height: 100%">
                    <div class="col-12 px-0" style="height: 100%;">
                        <div class="d-flex justify-content-between align-items-center px-2">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb bg-transparent py-1 px-0  mb-0">
                                    <li class="breadcrumb-item text-primary" aria-current="page">
                                        <a href="{{ route('home') }}"><i class="bi bi-house-fill"></i></a>
                                    </li>
                                    <li class="breadcrumb-item text-primary" aria-current="page">
                                        <a href="{{ route('home') }}" class="text-decoration-none">
                                            {{ strtolower($selected_pet) }} </a>
                                    </li>
                                    <li class="breadcrumb-item text-primary" aria-current="page">
                                        <a class="text-decoration-none"
                                            href="{{ route('products', ['pet' => strtolower($selected_pet), 'category' => strtolower($selected_category)]) }}">
                                            {{ strtolower($selected_category) }}
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ ucfirst($product->name) }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="p-0 mt-2">
                            <div class="d-flex flex-wrap justify-content-start" style="width: 100%">
                                <article class="d-flex align-items-end my-2 px-2 product bg-white shadow-sm"
                                    style="width: 100%;">
                                    <div class="d-flex flex-wrap" style="width: 100%">
                                        <div class=" position-relative product-img"
                                            style="width: 24%; border-top-left-radius: 5px; border-bottom-left-radius: 5px">
                                            <div class="p-0 d-flex align-items-center" style="width: 100%; height: 100%">
                                                <img src="{{ asset('storage/products/' . $product->img) }}"
                                                    class="m-auto d-block" style="height: 220px; width: 100%" alt="">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end product-desc p-4"
                                            style="width: 76%; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                                            <div class="p-1 py-3 d-flex flex-column col-12">
                                                <h4 class="mb-3" style="width: 100%">
                                                    {{ ucfirst($product->name) }} </h4>
                                                <p class="my-0 col-12 text-secondary px-0">
                                                    {{ ucfirst($product->description) }}
                                                    {{ ucfirst($product->description) }}
                                                </p>
                                                <br>

                                                <div class="d-flex justify-content-between align-items-center"
                                                    style="width: 100%">
                                                    <h4 class="mb-0" style="width: 50%;">
                                                        {{ '$' . number_format($product->price, 2) }} </h4>
                                                    @guest
                                                        <div class="bg-white px-3 add-to-cart position-relative">
                                                            <a href=""
                                                                class="btn btn-primary btn-sm btn-block">
                                                                Add to cart
                                                            </a>
                                                            <div class="p-0 position-absolute w-100 d-none align-items-center
                                                                           justify-content-around add-to-cart-req"
                                                                style="box-sizing: border-box; top: -6px">
                                                                <a class="nav-link text-primary p-0 py-2"
                                                                    href="{{ route('login') }}">
                                                                    Login
                                                                </a>
                                                                <a class="nav-link text-secondary p-0"
                                                                    href=" {{ route('register') }} ">
                                                                    Register
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="bg-white px-3">
                                                            <form action="{{ route('cart') }}" method="post" class="m-0 p-0">
                                                                @csrf
                                                                <input type="number" class="d-none" name="product_id"
                                                                    value="{{ $product->id }}" />
                                                                <input type="submit"
                                                                    class="btn btn-primary font-weight-bold btn-sm btn-block"
                                                                    value="Add to cart">
                                                            </form>
                                                        </div>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('home') }}" class="text-decoration-none">&leftarrow; Continue Shopping</a>
            </div>
            <br>
            <hr>
            <br>
            {{-- Featured products carousel --}}
            <div class="justify-content-between m-0 p-0" style="width: 100%;">
                <div class="col-12 px-0">
                    <h5 class="mb-3"> You may also like </h5>
                    <div class="light rounded p-0" style="min-height: 200px">
                        <div class="justify-content-between m-0 p-0" style="width: 100%; height: 100%">
                            <div class="col-12 px-0" style="height: 100%;">
                                <div class="p-0">
                                    <div class="splide" id="products-carousel">
                                        <div class="splide__slider">
                                            <div class="splide__track">
                                                <ul class="splide__list">
                                                    @foreach ($mayAlsoLike as $item)
                                                        <li class="splide__slide card mt-2 px-0 shadow-sm"
                                                            style="width: 100%;">
                                                            <div class="card-body pb-1 px-3 py-2">
                                                                <div class="col-12" style="height: 140px">
                                                                    <a
                                                                        href="{{ route('product', ['product' => $item->slug]) }}">
                                                                        <img src="{{ asset('storage/products/' . $item->img) }}"
                                                                            style="height: 100%; width: 100%" alt="">
                                                                    </a>
                                                                </div>
                                                                <div
                                                                    class="col-12 px-0 py-2 pb-0 mb-0 d-flex flex-column justify-content-between">
                                                                    <a class="col-12 mt-0 mb-3 px-0 text-decoration-none"
                                                                        href="{{ route('product', ['product' => $item->slug]) }}">
                                                                        {{ $item->name }}
                                                                    </a>
                                                                    <h5 class="col-12 m-0 mb-0 px-0">
                                                                        {{ '$' . number_format($item->price, 2) }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                            @guest
                                                                <div
                                                                    class="card-footer bg-white px-3 add-to-cart position-relative">
                                                                    <a href=""
                                                                        class="btn btn-primary btn-sm btn-block">
                                                                        Add to cart
                                                                    </a>
                                                                    <div class="p-0 position-absolute w-100 d-none align-items-center justify-content-around add-to-cart-req"
                                                                        style="box-sizing: border-box">
                                                                        <a class="nav-link text-primary p-0 py-2"
                                                                            href="{{ route('login') }}">
                                                                            Login
                                                                        </a>
                                                                        <a class="nav-link text-secondary p-0"
                                                                            href=" {{ route('register') }} ">
                                                                            Register
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="card-footer bg-white px-3">
                                                                    <form action="{{ route('cart') }}" method="post"
                                                                        class="m-0 p-0">
                                                                        @csrf
                                                                        <input type="number" class="d-none" name="product_id"
                                                                            value="{{ $item->id }}" />
                                                                        <input type="submit"
                                                                            class="btn btn-primary btn-sm btn-block"
                                                                            value="Add to cart">
                                                                    </form>
                                                                </div>
                                                            @endguest
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

    {{-- Featured products carousel --}}
    <script>
        new Splide('#products-carousel', {
            rewind: true,
            perPage: 5,
            gap: '0.7rem',
            breakpoints: {
                1200: {
                    perPage: 4,
                },
                950: {
                    perPage: 3,
                },
                600: {
                    perPage: 2,
                    gap: '0.8rem',
                },
                400: {
                    perPage: 1,
                },
            },
            padding: {
                left: 0,
                right: 0,
                top: '1rem',
                bottom: '3rem',
            }
        }).mount();

    </script>
@endsection
