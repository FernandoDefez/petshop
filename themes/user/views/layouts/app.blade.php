<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Petshop') }}</title>

    <!-- Scripts -->
    <script src="{{ url('themes/user/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url('themes/user/css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif !important;
        }
        
        .title{
            font-size: 21px !important;
        }
        
        .dark{
            background: #212529 !important;
        }

        .light{
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="dark col-12 px-4 py-3">
        <div class="mb-0 d-flex justify-content-between align-items-center">
            <a class="text-white navbar-brand font-weight-bold title" href="{{@url('/')}}"> {{ __('Petshop') }} </a>
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

    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>
</html>
