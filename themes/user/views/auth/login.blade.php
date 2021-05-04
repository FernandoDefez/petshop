<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('Petshop') }}</title>

    <!-- Scripts -->
    <script src="{{url('themes/user/js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{url('themes/user/css/app.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

    <style>
        body {
            font-family: 'Nunito', sans-serif !important;
        }

        .title{
            font-size: 21px;
        }


        .dark{
            background: #161C24 !important;
        }

        .light{
            background: #f5f5f5;
        }

        @media (max-width: 768px) {

        }

        @media (max-width: 992px) {
            .carousel{
                display: none;
            }
            main{
                padding: 0 !important;
                margin: 0 !important;
                width: 100vw;
                justify-content: center;
            }
            .sign-in-card{
                width: 500px !important;
                margin: auto !important;
                padding-top: 50px !important;
            }
            .header{
                display: block !important;
            }
        }
    </style>
</head>
<body class="bg-light" style="overflow: hidden; width: 100vw; height: 100vh">
    <main class="m-0 p-0 position-relative" style="width: 100vw; height: 100vh">
        <div class="header position-absolute dark col-12 px-4 py-3" style="display: none">
            <div class="mb-0 d-flex justify-content-between align-items-center">
                <a class="text-white navbar-brand font-weight-bold title" href="{{@url('/')}}">
                    {{ __('Petshop') }}
                </a>
                <div class="d-flex align-items-center">
                @guest
                    @if (Route::has('login'))
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                    @if (Route::has('register'))
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>

                    @endif
                @endguest
                </div>
            </div>
        </div>

        <div class="d-flex p-0 m-0">
            <div class="col-7 carousel p-0 m-0" style="height: 100vh">
                <div class="bg-light " style="height: 100vh">
                    <div class="splide position-relative overflow-hidden" id="splide" style="height: 100vh">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($pets as $pet)
                                    <li class="splide__slide" style="height: 100vh;">
                                        <div class="rounded position-relative" style="height: 100vh">
                                            <div class="bg-dark position-absolute" style="width: 100%; height: 100vh;">
                                                <img src="{{asset('storage/pets/'.$pet->img)}}"
                                                     alt="" style="width: 100%; height: 100vh; object-fit: cover; background-color:rgba(0,0,0,0.7); opacity: 0.5;">
                                            </div>
                                            <div class="px-5 py-4 position-absolute" style="z-index: 10; top: 0; width: 100%;">
                                                <h2 class="mb-0"><a class="text-white navbar-brand font-weight-bolder title" href="{{@url('/')}}">Petshop</a></h2>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sign-in-card bg-light m-0" style="height: 100vh">
                <div class="p-4 m-0">
                    <div class="p-0 py-5 m-auto" style="height: 100%;">
                        <h6 class="px-5"> Hello, dear customer. It is good to have you here! </h6>
                        <h5 class="font-weight-bold px-5"> {{ __('Log In')}} </h5>
                        <div class="rounded my-0 p-0">

                            <form method="POST" action="{{ route('login') }}" class="m-0 row px-5 py-5">
                                @csrf
                                <div class="col-md-12 p-0 mb-4">
                                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                        placeholder="E-mail Address" autocomplete="email" aria-describedby="validateEmail" required autofocus>
                                    @error('email')
                                    <span class="invalid-feedback pt-2 mb-0" role="alert">
                                        <p class="mb-0">{{ $message }}</p>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 p-0 mb-4">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                        placeholder="Password" aria-describedby="validatePassword" required>
                                        @error('password')
                                        <span class="invalid-feedback pt-2 mb-0" role="alert">
                                            <p class="mb-0">{{ $message }}</p>
                                        </span>
                                        @enderror
                                </div>
                                <br>
                                <div class="col-12 p-0 d-flex justify-content-between align-items-center mb-4">
                                    <div class="col-md-4 p-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-right p-0">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link p-1" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12 p-0 mb-4">
                                    <button class="fs-6 rounded font-weight-bold p-2 btn btn-dark dark btn-sm col-12" type="submit">{{ __('Log In') }}</button>
                                </div>
                                <br>
                                <div class="col-12 p-0">
                                    <p class="col-12 p-0 text-center m-0"> Don't have an account?
                                        <a href="{{ route('register') }}" class="p-0">{{ __('Register') }}</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

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
</html>
