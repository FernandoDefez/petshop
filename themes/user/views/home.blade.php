@extends('layouts.header')

@section('styles-link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
@endsection

@section('style')
<style>
    /*Small devices (landscape phones, 576px and up)*/
    @media (max-width: 576px) {
        .responsive-section-1{
            flex-direction: column !important;
        }
    }

    /*Medium devices (tablets, 768px and up)*/
    @media (max-width: 768px) {
        .product{
            width: 100% !important;
            padding: 0 !important;
        }

        .responsive-section-2{
            flex-direction: column !important;
        }
    }
    </style>
@endsection

@section('content')
<section class="responsive-section-2 d-flex justify-content-between m-0 p-0" style="width: 100%; height: 100%">
    <div class="col-md-2" style="height: 100%; margin-bottom: 35px">
        <div class="d-flex justify-content-between align-items-center py-3">
            <h5 class="font-weight-bold mb-0"> {{ __('Categories') }} </h5>
        </div>
        <aside class="light rounded py-4 px-3" style="min-height: 100px">
            @foreach ($pets as $pet)
            <div class="dropdown">
                <button class="btn dark text-white dropdown-toggle col-12 d-flex justify-content-between align-items-center p-2 px-3" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ strtolower($pet->pet_name) }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach( $categories as $category )
                        @if( $pet->id == $category->pet_id)
                        <li>
                            <a class="dropdown-item" href="{{ route('products', [ 'pet' => $pet->pet_name, 'category' => $category->category_name]) }}">
                                {{ strtolower($category->category_name) }}
                            </a>
                        </li>
                        @endif
                    @endforeach
                </div>
            </div>
            <br>
            @endforeach
        </aside>
    </div>
    <div class="col-md-10" style="margin-bottom: 35px">
        <div class="d-flex justify-content-between align-items-center py-2">
            <h5 class="font-weight-bold mb-0"> {{ __('Products') }} </h5>
            <livewire:product-search-bar />
        </div>
        <div class="light rounded py-4 px-2 mt-0" style="min-height: 200px">
            <div class="row justify-content-between m-0 p-0" style="width: 100%; height: 100%">
                <div class="col-12 px-0" style="height: 100%; margin-bottom: 30px">
                    <div class="d-flex justify-content-between align-items-center px-2">
                        <nav aria-label="breadcrumb font-weight-bold">
                            <ol class="breadcrumb bg-transparent py-1 px-0  mb-0">
                                @if ($selected_pet)
                                    <li class="breadcrumb-item font-weight-bold text-primary"><a> {{ $selected_pet }} </a></li>
                                @endif
                                @if ($selected_category)
                                <li class="breadcrumb-item active font-weight-bold" aria-current="page">{{ $selected_category }}</li>
                                @endif
                            </ol>
                        </nav>
                    </div>
                    <div class="p-0 py-2">
                        <div class="d-flex flex-wrap justify-content-start" style="width: 100%">
                            @foreach($products as $product)
                                <article class="d-flex align-items-end my-3 px-2 bg-light product" style="height: 100%; width: 50%;">
                                    <div class="d-flex flex-wrap" style="height: 180px; width: 100%">
                                        <div class="dark position-relative" style="width: 30%; border-top-left-radius: 5px; border-bottom-left-radius: 5px">
                                            <div href="#" class="py-4" style="height: 180px; width: 100%;">
                                                <img src="https://cdn.shopify.com/s/files/1/0291/9097/9643/products/7501072202314_af2691ad-7f92-4835-9bcd-d92de90b3d05_650x.png?v=1603931569"
                                                     style="height: 100%; width: 100%"
                                                     alt="">
                                            </div>
                                        </div>
                                        <div class="dark p-4 px-3" style="width: 70%; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                                            <p class="font-weight-bold my-0 text-white">{{ $product->product  }}</p>
                                            <p class="my-0 text-secondary">{{ substr($product->description, 0, 35) }}</p>
                                            <h5 class="font-weight-bold text-white my-3" style="width: 100%;">{{ $product->price  }}</h5>
                                            <div style="width: 100%">
                                                <a href="{{ route('product', ['product' => $product->slug]) }}" class="font-weight-bold btn btn-outline-light btn-sm p-1 px-2">See more</a>
                                                <a href="" class="font-weight-bold btn btn-light btn-sm p-1 px-2">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
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
    <script>
        new Splide( '#splide', {
            type  : 'loop',
            rewind: true,
            autoplay: true,
            pauseOnHover: false
        } ).mount();
    </script>
@endsection