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
        }

        .add-to-cart:hover > .add-to-cart-req{
            display: flex !important;
        }
        .add-to-cart:hover > a{
            opacity: 0;
        }
        /* This will be activated once the user hovers the add to cart button */
        .add-to-cart-req{
            top: 12px;
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

        footer{
            background: #212121 !important;
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
<body class="bg-light" style="overflow-x: hidden;">

    <!-- Header content -->
    <header class="bg-white py-2 shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-dark m-auto px-1" style="width: 95%; height: auto">
            <div class="d-flex col-12 justify-content-between px-2 align-items-center">
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
                                <div class="position-absolute dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        {{ __('Mi cuenta')  }}
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                @endguest

                <a class="navbar-brand text-center font-weight-bold text-dark m-0 p-0 h-100" href="{{ route('home') }}">{{ __('PETSHOP')}}</a>

                <div class="d-flex">
                    @guest
                        <div class="d-flex align-items-center">
                            <div class="ml-auto d-flex d-flex mb-0 justify-content-between align-items-center">
                                <!-- Authentication Links -->
                                <a class="nav-link text-secondary" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                <a class="nav-link text-secondary" href="{{ route('register') }}">{{ __('Regístrarse') }}</a>
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
                                <a class="dropdown-item d-flex">Artículos: <livewire:cart-items-counter /></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('cart') }}">Ver carrito</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>



    <!-- Main content -->
    <main class="m-auto py-4 my-3 d-flex justify-content-between flex-wrap light" style="width: 90%;">
        @if (!\Request::is('product/*') && \Request::is('/') || \Request::is('products/*'))
            <section class="d-flex responsive-section-1 justify-content-between m-0 pt-3" style="width: 100%; height: 100%">
                <div class="col-sm-8" style="height: 100%; margin-bottom: 35px">
                    <h5 class=""> Bienvenido </h5>
                        <div class="rounded p-3 bg-white d-flex flex-column justify-content-between shadow-sm"
                             style="margin-top: 2vh; height: 185px">
                            <!---Because there are many ways to pamper your pets-->
                            <h5 class="pt-2"> Aquí encontrarás lo necesario para tu mascota. Tenemos
                                los mejores productos y al mejor precio.</h5>
                            <p>
                                Hola,
                                @guest

                                @else
                                    {{ Auth::user()->name . '. ' }}
                                @endguest qué bueno volver a tenerte aquí.
                            </p>
                            <div class="d-flex">
                                @guest
                                    @if (Route::has('login'))
                                        <a href="{{ route('login') }}" class="btn btn-dark font-weight-bold"> {{ __('Iniciar sesión ') }} </a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-outline-dark font-weight-bold mx-3">
                                            {{ __('Registrarse') }} </a>
                                    @endif
                                @else
                                @endguest
                            </div>
                        </div>
                </div>
                <div class="col-sm-4" style="margin-bottom: 40px">
                    <h5 class=""> Mascotas </h5>
                    <div class="rounded shadow-sm" style="margin-top: 2vh; height: 185px">
                        <div class="splide rounded position-relative overflow-hidden" id="splide" style="height: 100%">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach ($pets as $pet)
                                        <li class="splide__slide" style="height: 200px;">
                                            <div class="rounded position-relative" style="height: 200px;">
                                                <div class="bg-dark position-absolute" style="width: 100%; height: 100%;">
                                                    <img src="{{ asset('storage/pets/' . $pet->img) }}" alt=""
                                                         style="width: 100%; height: 100%; object-fit: cover; background-color:rgba(0,0,0,0.7); opacity: 0.90;">
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
        @endif

        <br>
        @yield('content')
    </main>

    <footer class="d-flex flex-column align-items-center py-3">
        <div class="m-auto d-flex justify-content-start py-2 pb-3 align-items-center" style="width: 93%">
            <p class="text-white mr-4 font-weight-bold m-0"> Accede a nuestros productos. </p>
            <a class="btn btn-outline-light font-weight-bold" href="{{ route('register') }}">Registrarse</a>
        </div>
        <div class="m-auto d-flex justify-content-start align-items-center" style="width: 93%">
            <div class="w-100 bg-secondary" style="height: 1.5px"></div>
        </div>
        <div class="m-auto d-flex justify-content-between py-4" style="width: 93%">
            <nav class="navbar-nav flex-column col-6 align-items-start">
                <p class="text-white mr-4 font-weight-bold m-0"> Tu cuenta </p>
                <a class="nav-link text-secondary py-1" href="#">Iniciar sesión</a>
                <a class="nav-link text-secondary py-1" href="#">Registrarse</a>
                <a class="nav-link text-secondary py-1" href="#">Ayuda</a>
            </nav>
            <nav class="nav flex-column col-6 align-items-end px-0">
                <p class="text-white mr-4 font-weight-bold m-0"> Descubrir </p>
                <a class="nav-link text-secondary py-1" href="#"> Documentación </a>
                <a class="nav-link text-secondary py-1" href="#"> Blog </a>
                <a class="nav-link text-secondary py-1" href="#"> Acerca de </a>
                <a class="nav-link text-secondary py-1" href="#"> Empleos </a>
            </nav>
        </div>
        <div class="m-auto d-flex justify-content-start" style="width: 93%">
            <p class="font-weight-bold text-white m-1"> Síguenos </p>
        </div>
        <div class="m-auto d-flex justify-content-start pb-3" style="width: 93%; font-size:24px;">
            <a class="text-secondary mr-4" href="#"> <i class="bi bi-facebook"></i> </a>
            <a class="text-secondary mr-4" href="#"> <i class="bi bi-twitter"></i> </a>
            <a class="text-secondary mr-4" href="#"> <i class="bi bi-youtube"></i> </a>
            <a class="text-secondary" href="#"> <i class="bi bi-instagram"></i> </a>
        </div>
        <div class="m-auto d-flex justify-content-start pt-3 font-weight-bold" style="width: 93%">
            <p class="text-white mr-4">&copy; Petshop </p>
            <p class="text-secondary mr-4">Políticas de privacidad</p>
            <p class="text-secondary mr-4">Términos y condiciones</p>
            <p class="text-secondary">Ayuda</p>
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
