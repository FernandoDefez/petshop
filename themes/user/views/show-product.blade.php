@extends('layouts.header')

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
          .product-img{
               width: 100% !important;
               border-bottom-left-radius: 0 !important;
               border-bottom-right-radius: 0;
               border-top-right-radius: 5px;
          }

          .product-desc{
               width: 100% !important;
               border-bottom-left-radius: 5px;
               border-bottom-right-radius: 5px;
               border-top-right-radius: 0 !important;
               border-top-left-radius: 0;
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
               <h5 class="font-weight-bold mb-0"> {{ __('Product') }} </h5>
               <livewire:product-search-bar />
          </div>

          {{-- Product --}}
          <div class="light rounded py-4 px-2 mt-0" style="min-height: 200px">
               <div class="row justify-content-between m-0 p-0" style="width: 100%; height: 100%">
                    <div class="col-12 px-0" style="height: 100%;">
                         <div class="d-flex justify-content-between align-items-center px-2">
                              <nav aria-label="breadcrumb font-weight-bold">
                                   <ol class="breadcrumb bg-transparent py-1 px-0  mb-0">
                                        @if ($selected_pet)
                                        <li class="breadcrumb-item font-weight-bold text-primary"><a> {{ $selected_pet }} </a></li>
                                        @endif
                                        <li class="breadcrumb-item font-weight-bold text-primary"><a> Pet </a></li>
                                        <li class="breadcrumb-item font-weight-bold text-primary"><a> Category </a></li>
                                        @if ($selected_category)
                                        <li class="breadcrumb-item active font-weight-bold" aria-current="page"> {{ $selected_category }}</li>
                                        @endif
                                        <li class="breadcrumb-item active font-weight-bold" aria-current="page"> Product </li>
                                   </ol>
                              </nav>
                         </div>
                         <div class="p-0 py-2">
                              <div class="d-flex flex-wrap justify-content-start" style="width: 100%">
                                   <article class="d-flex align-items-end my-3 px-2 bg-light product" style="width: 100%;">
                                        <div class="d-flex flex-wrap" style="width: 100%">
                                            <div class="dark position-relative product-img" style="width: 24%; border-top-left-radius: 5px; border-bottom-left-radius: 5px">
                                                <div class="py-4" style="width: 100%; height: 100%">
                                                    <img src="{{asset('storage/products/'.$product->img)}}"
                                                         style="height: 100%; width: 100%"
                                                         alt="">
                                                </div>
                                            </div>
                                            <div class="d-flex dark align-items-end product-desc p-4" style="width: 76%; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                                                <div class="p-1 py-3 d-flex flex-column">
                                                    <p class="font-weight-bold my-0 text-white" style="width: 100%"> {{ ucfirst($product->product) }} </p>
                                                    <br>
                                                    <p class="my-0 col-12 text-secondary px-0"> {{ ucfirst($product->description) }} </p>
                                                    <p class="my-0 col-12 text-secondary px-0"> {{ ucfirst($product->description) }} </p>
                                                    <br>
                                                    <div class="d-flex justify-content-between align-items-center" style="width: 100%">
                                                        <h5 class="font-weight-bold text-white mb-0" style="width: 50%;"> {{ ucfirst($product->price) }} </h5>
                                                        <div class="d-flex justify-content-end" style="width: 50%">
                                                            <a href="" class="font-weight-bold btn btn-light btn-sm">Add to cart</a>
                                                        </div>
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
          <br>
          {{-- Featured products carousel --}}
          <div class="justify-content-between m-0 p-0" style="width: 100%;">
               <div class="col-12 px-0">
                    <h5 class="font-weight-bold mb-3"> Featured Products </h5>
                    <div class="light rounded p-0" style="min-height: 200px">
                         <div class="justify-content-between m-0 p-0" style="width: 100%; height: 100%">
                              <div class="col-12 px-0" style="height: 100%;">
                                   <div class="p-0">
                                        <div class="splide" id="products-carousel">
                                             <div class="splide__slider">
                                                  <div class="splide__track">
                                                        <ul class="splide__list">
                                                            @foreach($products as $product)
                                                            <li class="splide__slide d-flex align-items-end p-3 py-4" style="width: 100%;">
                                                                 <div class="d-flex flex-wrap" style="width: 100%">
                                                                      <div class="dark position-relative" style="width: 30%; border-top-left-radius: 5px; border-bottom-left-radius: 5px">
                                                                           <div href="#" class="py-4" style="height: 180px; width: 100%;">
                                                                                <img src="{{asset('storage/products/'.$product->img)}}"
                                                                                     style="height: 100%; width: 100%"
                                                                                     alt="">
                                                                           </div>
                                                                      </div>
                                                                      <div class="dark p-4 px-3" style="width: 70%; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                                                                           <p class="font-weight-bold my-0 text-white"> {{ $product->product }} </p>
                                                                           <p class="my-0 text-secondary"> {{ $product->id }} </p>
                                                                           <h5 class="font-weight-bold text-white my-3" style="width: 100%;"> {{ $product->price }} </h5>
                                                                           <div style="width: 100%">
                                                                                <a href="{{ route('product', ['product' => $product->slug]) }}" class="font-weight-bold btn btn-outline-light btn-sm p-1 px-2">See more</a>
                                                                                <a class="font-weight-bold btn btn-light btn-sm">Add to cart</a>
                                                                           </div>
                                                                      </div>
                                                                 </div>
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
        new Splide( '#products-carousel', {
            rewind : true,
            perPage: 2,
            breakpoints: {
                900: {
                    perPage: 1,
                },
            }
        } ).mount();
    </script>
@endsection
