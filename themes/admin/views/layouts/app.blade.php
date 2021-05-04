<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Petshop Admin') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('themes/admin/js/app.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Fonts
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    -->

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Styles -->
    <link href="{{ asset('themes/admin/css/app.css') }}" rel="stylesheet">
    <style>
        .active-menu{
            width: 230px !important;
            padding: 15px 25px !important;
        }

        #menu{
            width: 0;
            padding: 0;
            transition: width 0.6s ease-in-out;
        }

        .title{
            font-size: 21px !important;
        }

        .dark{
            background: #212529 !important;
        }
    </style>
    @livewireStyles
</head>
<body style="height: 100vh; overflow:hidden;">
        <nav class="dark navbar navbar-expand-md navbar-light m-0" style="height: 11vh">
            <div class="container col-12 px-2">
                <a class="navbar-brand text-white font-weight-bold title" href="{{ route('admin.home') }}">
                    {{ __('Petshop Admin')}}
                </a>
                <!-- Right Side Of Navbar -->
                <ul class="ml-auto navbar-nav">
                    <!-- Authentication Links -->
                    @guest('admin')
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('admin')->user()->name }}
                            </a>
                            <div class="dropdown-menu position-absolute dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="m-0 d-flex" style="height: 89vh;">
            @yield('content')
        </main>

        <script>
            const menu = document.getElementById('menu');
            const menuButton = document.getElementById('menu-button');
            menuButton.addEventListener("click", activeMenu);

            function activeMenu() {
                menu.classList.toggle('active-menu');
                console.log(menu)
            }
        </script>
        @livewireScripts
        @yield('myscripts')
</body>
</html>


