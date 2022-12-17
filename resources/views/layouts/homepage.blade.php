<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Ecommerce - {{ $title }}</title>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('homepage/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('homepage/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('homepage/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('design/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('product/css/style.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <link rel="stylesheet" href="{{ asset('styles.css') }}">
        <script src="https://kit.fontawesome.com/5e539df1ae.js" crossorigin="anonymous"></script>
        <script src="{{ asset('homepage/js/jquery.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body class="pb-5">
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark py-3 bg-dark shadow-sm fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('homepage') }}" class="nav-link {{ (Request::is('/') ? 'active' : '') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('category') }}" class="nav-link {{ (Request::is('category*') ? 'active' : '') }}">Category</a>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <a href="{{ route('carts') }}" class="nav-link position-relative {{ (Request::is('cart*') ? 'active' : '') }}">
                                        <span class="badge bg-none text-dark position-absolute bg-warning start-0 top-0" style="font-size: 11px; transform: translate(-3px, -5px);"></span>
                                    Cart
                                    <span class="badge badge-pill bg-primary cart-count" style="transform: translateY(-1px)"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('wishlist') }}" class="nav-link position-relative {{ (Request::is('wishlist*') ? 'active' : '') }}">
                                    <span class="badge bg-none text-dark position-absolute bg-warning start-0 top-0" style="font-size: 11px; transform: translate(-3px, -5px);"></span>
                                    Wishlist
                                    <span class="badge badge-pill bg-danger wishlist-count" style="transform: translateY(-1px)"></span>
                                </a>
                                </li>
                            @endauth
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle {{ (Request::is('dashboard*')) ? "active" : "" }}" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class=" dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        @yield('pages')
        <script src="{{ asset('design/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('homepage/js/popper.js') }}"></script>
        <script src="{{ asset('homepage/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('homepage/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('homepage/js/main.js') }}"></script>
        <script src="{{ asset('product/js/popper.min.js') }}"></script>
        @stack('script')
    </body>
</html>