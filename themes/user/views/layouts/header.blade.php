<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Petshop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('themes/assets/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--- Splide CSS for Carousel --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ url('themes/assets/css/app.css') }}" rel="stylesheet">

    @yield('styles-link')

    <style>
        body{
            font-family: cursive;
            background: #f9f9f9;
        }

        .title {
            font-size: 24px !important;
        }

        .dark{
            background: #212529 !important;
        }

        .add-to-cart:hover > .add-to-cart-req{
            display: flex !important;
        }
        .add-to-cart:hover > a{
            opacity: 0;
        }
        .add-to-cart-req{
            top: 4px;
            left: 0;
        }

        .bag-quantifier {
            top: 10%;
            left: 80%;
            transform: translateY(-50%);
            transform: translateX(-50%);
            height: 20px;
            width: 20px;
            border-radius: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .bag-quantifier p{
            font-size: 10px !important;
            color: white;
            font-weight: 500;
            margin-bottom: 0;
            font-style: normal;
            margin: 0;
        }

        /*Small devices (landscape phones, 576px and up)*/
        @media (max-width: 576px) {
            .responsive-section-1{
                flex-direction: column !important;
            }
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
    @livewireStyles
</head>
<body style="overflow-x: hidden;">
    <header class="bg-white py-2 shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-dark m-auto px-1" style="width: 95%; height: auto">
            <div class="d-flex col-12 justify-content-between px-2">
                @guest
                @else
                <div class="">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <h3 class="m-0 text-dark">
                                    <i class="bi bi-person"></i>
                                </h3>
                            </a>
                            <div class="position-absolute dropdown-menu dropdown-menu-left"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"> {{ Auth::user()->name }} </a>
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
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

                <a class="navbar-brand text-center title text-dark mr-0" href="{{ route('home') }}">{{ __('Petshop')}}</a>

                <div class="d-flex">
                    @guest
                    <div class="d-flex align-items-center">
                        <div class="ml-auto d-flex d-flex mb-0 justify-content-between align-items-center">
                            <!-- Authentication Links -->
                            <a class="nav-link text-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                           <a class="nav-link text-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
                    </div>
                    @endguest
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <h3 class="m-0 text-dark">
                                    <i class="bi bi-bag">
                                        @guest
                                        @else
                                        <span class="bag-quantifier position-absolute bg-primary">
                                            <livewire:cart-items-counter />
                                        </span>
                                        @endguest
                                    </i>
                                </h3>
                            </a>
                            <div class="position-absolute dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item d-flex">Items: <livewire:cart-items-counter /></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('cart') }}">View cart</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="m-auto py-4 my-3 d-flex justify-content-between flex-wrap light" style="width: 90%;">
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
    @livewireScripts
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script>
        new Splide( '#splide', {
            type  : 'loop',
            rewind: true,
            autoplay: true,
            pauseOnHover: false
        } ).mount();
    </script>

    @yield('scripts')
</html>
