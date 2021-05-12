<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Petshop Admin') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('themes/user/js/app.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('themes/user/css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>

<style>
    body {
        font-family: Bahnschrift;
    }

    .title {
        font-size: 24px !important;
    }

    .dark{
        background: #212529 !important;
    }
</style>

<body class="dark">
<nav class="navbar shadow-sm navbar-expand-md navbar-dark dark m-0 p-3">
    <div class="container col-12 px-2">
        <a class="navbar-brand text-white font-weight-bold" href="{{ route('admin.home') }}" style="font-size: 21px">
            {{ __('Petshop Admin')}}
        </a>
        <!-- Right Side Of Navbar -->
        <ul class="ml-auto navbar-nav">
            <!-- Authentication Links -->
            @guest('admin')
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-secondary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::guard('admin')->user()->name }}
                    </a>
                    <div class="dropdown-menu position-absolute dropdown-menu-right dark bg-dark" aria-labelledby="navbarDropdown">
                        <form action="{{ route('admin.logout') }}" method="POST" class="p-3">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm font-weight-bold btn-block">{{ __('Logout') }}</button>
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<main class="m-0 col-12 p-4">
    @yield('content')
</main>

    @livewireScripts
    @yield('myscripts')
</body>
</html>


