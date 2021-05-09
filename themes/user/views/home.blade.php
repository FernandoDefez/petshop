@extends('layouts.header')

<style>
    .product{
        width: 18.3%;
    }
    /*Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 576px) {
        .product{
            width: 46%;
        }
        .product-image{
            height: 140px !important;
        }
    }
    /*Small devices (landscape phones, 576px and up)*/
    @media (min-width: 576px) and (max-width: 767.98px) {
        .product{
            width: 30%;
        }
    }
    /*Medium devices (tablets, less than 992px)*/
    @media (min-width: 768px) and (max-width: 991.98px) {
        .product{
            width: 28%;
        }
    }
    @media (max-width: 768px) {
        .responsive-section-2{
            flex-direction: column !important;
        }
    }
    /*Large devices (desktops, less than 1200px)*/
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .product{
            width: 22.7%;
        }
    }
</style>
@section('style')
@endsection

@section('content')
    <section class="d-flex responsive-section-1 justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
        <div class="col-sm-8" style="height: 100%; margin-bottom: 35px">
            <h5 class="font-weight-bold"> Home </h5>
            <div class="rounded p-3 bg-white d-flex flex-column justify-content-between" style="margin-top: 2vh; height: 185px">
                <h6 class="font-weight-bold py-1"> Welcome </h6>
                <p>
                    Hello,
                    @guest
                        {{ __('dear customer.') }}
                    @else
                        {{ 'dear ' . Auth::user()->name . '. '}}
                    @endguest Welcome to this page where you can find as many products as you want for your pets.
                </p>
                <div class="d-flex">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="font-weight-bold btn btn-success"> {{ __('Login') }} </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-weight-bold btn btn-outline-success mx-3"> {{ __('Register') }} </a>
                        @endif
                    @else
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 40px">
            <h5 class="font-weight-bold"> Pets </h5>
            <div class="light rounded" style="margin-top: 2vh; height: 185px">
                <div class="splide rounded position-relative overflow-hidden" id="splide" style="height: 100%">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($pets as $pet)
                                <li class="splide__slide" style="height: 200px;">
                                    <div class="rounded position-relative" style="height: 200px;">
                                        <div class="bg-dark position-absolute" style="width: 100%; height: 100%;">
                                            <img src="{{asset('storage/pets/'.$pet->img)}}"
                                                 alt="" style="width: 100%; height: 100%; object-fit: cover; background-color:rgba(0,0,0,0.7); opacity: 0.5;">
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
                <h5 class="font-weight-bold mb-0"> {{ __('Categories') }} </h5>
            </div>
            <div class="accordion" id="accordionExample">
                @foreach ($pets as $pet)
                <div class="card">
                    <div class="card-header bg-white p-1" id="heading{{$pet->id}}">
                        <h2 class="mb-0">
                            <button
                                class="btn text-primary btn-block font-weight-bold text-left"
                                type="button"
                                data-toggle="collapse"
                                data-target="#collapse{{$pet->id}}"
                                @if($pet->id == 1) aria-expanded="true" @else aria-expanded="false" @endif
                                aria-controls="collapse{{$pet->id}}">
                                {{ strtolower($pet->name) }}
                            </button>
                            </h2>
                        </div>
                        <div id="collapse{{$pet->id}}" class="collapse" aria-labelledby="heading{{$pet->id}}" data-parent="#accordionExample">
                            <div class="card-body px-3 py-2 d-flex flex-column">
                            @foreach( $categories as $category )
                                @if( $pet->id == $category->pet_id)
                                    <a href="{{ route('products', [ 'pet' => strtolower($pet->name), 'category' => strtolower($category->name)]) }}"
                                    class="text-secondary col-12 px-2">
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
                <h5 class="font-weight-bold mb-0"> {{ __('Products') }} </h5>
                <livewire:product-search-bar />
            </div>
            <div class="pt-2 mt-0 px-0" style="min-height: 200px">
                <div class="row justify-content-between m-0 p-0" style="width: 100%; height: 100%">
                    <div class="col-12 px-0" style="height: 100%;">
                        <div class="d-flex justify-content-between align-items-center px-2">
                            <nav aria-label="breadcrumb font-weight-bold">
                                <ol class="breadcrumb bg-transparent py-1 px-0  mb-0">
                                    <li class="breadcrumb-item text-primary font-weight-bold" aria-current="page">
                                        <a href="{{ route('home') }}"><i class="bi bi-house-fill"></i></a>
                                    </li>
                                    @if ($selected_pet)
                                        <li class="breadcrumb-item text-primary font-weight-bold" aria-current="page">
                                            <a href="{{ route('home') }}"> {{ strtolower($selected_pet) }} </a>
                                        </li>
                                    @endif
                                    @if ($selected_category)
                                        <li class="breadcrumb-item font-weight-bold" aria-current="page">
                                            <a  href="{{ route('products', [ 'pet' => strtolower($selected_pet), 'category' => strtolower($selected_category)]) }}"
                                                class="active text-secondary">
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
                                    <article class="card m-2 px-0 product">
                                        <div class="card-body pb-1 px-3 py-2">
                                            <div class="col-12 product-image" style="height: 125px">
                                                <img src="{{asset('storage/products/'.$product->img)}}"
                                                     style="height: 100%; width: 100%"
                                                     alt="">
                                            </div>
                                            <div class="col-12 px-0 py-2 pb-0 mb-0 d-flex flex-column justify-content-between">
                                                <a class="col-12 font-weight-bold mt-0 mb-1 px-0" href="{{ route('product', ['product' => $product->slug]) }}">
                                                    {{ $product->name }}
                                                </a>
                                                <!---<span class="col-12 mb-2 m-0 p-0 text-danger"> {{ $product->availability }} </span>--->
                                                <h5 class="col-12 m-0 font-weight-bold mb-0 px-0">
                                                    &dollar;{{ sprintf("%.2f", $product->price)  }}
                                                </h5>
                                            </div>
                                        </div>
                                        @guest
                                            <div class="card-footer bg-white px-3 add-to-cart position-relative">
                                                <a href="#" class="font-weight-bold btn btn-primary btn-sm btn-block">
                                                    Add to cart
                                                </a>
                                                <div class="p-0 position-absolute w-100 d-none align-items-center
                                                     justify-content-around add-to-cart-req" style="box-sizing: border-box">
                                                    <a class="nav-link text-primary p-0 py-2" href="{{ route('login')  }}">
                                                        Log In
                                                    </a>
                                                    <a class="nav-link text-secondary p-0" href=" {{ route('register')  }} ">
                                                        Sign Up
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card-footer bg-white px-3">
                                                <form action="{{ route('cart') }}" method="post" class="m-0 p-0">
                                                    @csrf
                                                    <input type="number" class="d-none" name="product_id" value="{{ $product->id }}"/>
                                                    <input type="submit" class="font-weight-bold btn btn-primary btn-sm btn-block" value="Add to cart" >
                                                </form>
                                            </div>
                                        @endguest
                                    </article>
                                @empty
                                    <div class="col-12 p-2 py-2">
                                        <div class="alert alert-danger col-12" role="alert">
                                            <h4 class="alert-heading">No products found!</h4>
                                            <p> There is no products in this category </p>
                                            <hr>
                                            <p class="mb-0">Try typing the product name you are looking for on the <strong>Search Input</strong> at top-right or try
                                                looking for another category.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <br>
                        <div class="col-12 d-flex justify-content-center">
                            @if($products->links())
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
    <script type="text/javascript">

    </script>
@endsection
