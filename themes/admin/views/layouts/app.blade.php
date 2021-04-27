<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/admin') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/admin') }}" rel="stylesheet">
    <style>
        .active-menu{
            width: 0% !important;
            padding: 0 !important;
        }
    
        #menu{
            width: 230px;
            transition: width 0.6s ease-in-out;
        }
    </style>
</head>
<body style="height: 100vh; overflow:hidden;">
        <nav class="bg-dark navbar navbar-expand-md navbar-light m-0" style="height: 11vh">
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
                                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
        </nav>

        <main class="m-0 d-flex " style="height: 89vh;">
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
</body>
</html>


