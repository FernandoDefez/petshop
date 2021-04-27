<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Petshop') }}</title>

    <!-- Scripts -->
    <script src="{{ url('themes/user/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ url('themes/user/css/app.css') }}" rel="stylesheet">

    @yield('styles-link')

    <style>
        body {
            font-family: 'Nunito', sans-serif !important;
        }

        .title{
            font-size: 24px !important;
          }
        
          .dark{
               background: #212529 !important;
          }

          .light{
               background: #f5f5f5;
          }

          .bag-quantifier {
               font-size: 4px !important;
               top: 45%;
               left: 50%;
               transform: translateY(-50%);
               transform: translateX(-50%);
               color: white;
               font-style: normal;
          }

          /* Setting the menu into a column */
          @media (max-width: 992px) {
               #nav-menu{
                    margin-top: 2vh;
                    flex-direction: column;
               }
               main{
                    padding-bottom: 20px;
               }
          }
    </style>
    @yield('style')
    @livewireStyles()
</head>
<body style="overflow-x: hidden" class="bg-white">
    <header class="dark">
        <nav class="navbar navbar-expand-lg navbar-dark dark m-auto px-1" style="width: 95%; height: auto">
            <div class="d-flex col-12 justify-content-between px-2">               
                @guest
               
                @else
                <div class="">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <h2 class="m-0 text-white">
                                    <i class="bi bi-person"></i>
                                </h2>
                            </a>
                            <div class="position-absolute dropdown-menu dropdown-menu-left"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"> {{ Auth::user()->name }} </a>
                                <a class="dropdown-item" href="">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                @endguest     

                <a class="navbar-brand text-center title" href="{{ route('home') }}" style="font-size: 22px; font-weight: 900;">{{ __('Petshop')}}</a>

                <div class="d-flex">
                    @guest
                    <div class="d-flex align-items-center">
                        <div class="ml-auto d-flex d-flex mb-0 justify-content-between align-items-center">
                            <!-- Authentication Links -->
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                           <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    </div>
                    @endguest
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <h2 class="m-0 text-white">
                                    <i class="bi bi-bag">
                                         <span class="bag-quantifier position-absolute">+99</span>
                                    </i>
                                </h2>
                            </a>
                            <div class="position-absolute dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Items: 320</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Watch my cart</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="m-auto py-4 my-3 d-flex justify-content-between flex-wrap" style="width: 95%;">
    @guest
    <section class="d-flex responsive-section-1 justify-content-between m-0 p-0" style="width: 100%; height: 100%">
        <div class="col-sm-8" style="height: 100%; margin-bottom: 35px">
            <h5 class="font-weight-bold"> Home </h5>
            <div class="light rounded p-3" style="margin-top: 2vh; height: 200px">
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
                            <a href="{{ route('login') }}" class="font-weight-bold btn dark text-white"> {{ __('Login') }} </a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="font-weight-bold btn btn-outline-dark mx-3"> {{ __('Register') }} </a>
                        @endif
                    @else
                    @endguest
                </div>
            </div>
        </div>
        <div class="col-sm-4" style="margin-bottom: 40px">
            <h5 class="font-weight-bold"> Pets </h5>
            <div class="light rounded" style="margin-top: 2vh; height: 200px">
                <div class="splide rounded position-relative bg-success overflow-hidden" id="splide" style="height: 100%">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide" style="height: 200px;">
                                <div class="rounded position-relative" style="height: 200px;">
                                    <div class="bg-dark position-absolute" style="width: 100%; height: 100%;">
                                        <img src="https://images.pexels.com/photos/2253275/pexels-photo-2253275.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                            alt="" style="width: 100%; height: 100%; object-fit: cover; background-color:rgba(0,0,0,0.7); opacity: 0.5;">
                                    </div>
                                    <div class="p-5 py-4 position-absolute" style="z-index: 10; bottom: 0; width: 100%;">
                                        <h5 class="fw-bold text-white">Dog</h5>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide" style="height: 200px;">
                                <div class="rounded position-relative" style="height: 200px;">
                                    <div class="bg-dark position-absolute" style="width: 100%; height: 100%;">
                                        <img src="https://images.pexels.com/photos/1472999/pexels-photo-1472999.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                             alt="" style="width: 100%; height: 100%; object-fit: cover; background-color:rgba(0,0,0,0.8); opacity: 0.5;">
                                    </div>
                                    <div class="p-5 py-4 position-absolute" style="z-index: 10; bottom: 0; width: 100%;">
                                        <h5 class="fw-bold text-white">Cat</h5>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    @endguest
    @yield('content')
    <br>
    </main>

    <footer class="dark d-flex flex-column align-items-center py-3">
        <div class="m-auto d-flex justify-content-between py-2" style="width: 93%">
            <nav class="navbar-nav flex-column col-6 align-items-start">
                <a class="nav-link text-secondary" href="#">Privacy Policy</a>
                <a class="nav-link text-secondary" href="#">Terms</a>
                <a class="nav-link text-secondary" href="#">Documentation</a>
                <a class="nav-link text-secondary" href="#">Github</a>
            </nav>
            <nav class="nav flex-column col-6 align-items-end px-0">
                <a class="nav-link text-secondary px-0" href="#">Twitter</a>
                <a class="nav-link text-secondary px-0" href="#">Facebook</a>
                <a class="nav-link text-secondary px-0" href="#">Youtube</a>
            </nav>
        </div>
        <div class="m-auto d-flex justify-content-between pt-3" style="width: 93%">
            <p class="text-white">&copy; All rights reserved</p>
        </div>
    </footer>
</body>
    <!-- Scripts -->
    @yield('scripts')
    @livewireScripts()
</html>