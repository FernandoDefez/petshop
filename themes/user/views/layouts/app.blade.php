<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Petshop') }}</title>

    <!-- Scripts -->
    <script src="{{ url('themes/assets/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url('themes/assets/css/app.css') }}" rel="stylesheet">
</head>

<style type="text/css">
    body{
        font-family: cursive;
    }

    .dark{
        /*background: #212529 !important;*/
        background: #04030C !important;
    }
</style>

<body>
  <div class="bg-white col-12 px-4 py-3 shadow-sm">
      <div class="mb-0 d-flex justify-content-between align-items-center">
          <a class="navbar-brand text-center font-weight-bold text-dark m-0 p-0 h-100" href="{{ route('home') }}">{{ __('PETSHOP')}}</a>
          <div class="d-flex align-items-center">
              @guest
                  @if (Route::has('login'))
                      <a class="nav-link text-secondary" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                  @endif
              @endguest
          </div>
      </div>
  </div>
  <main class="py-4">
      @yield('content')
  </main>
</body>
</html>
