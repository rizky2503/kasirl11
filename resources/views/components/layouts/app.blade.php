<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- ✅ MENAMBAHKAN penutup tag <a> yang hilang -->
                         <a href="{{ route('Home') }}" wire:navigate
                            class="btn {{ request()->routeIs('Home') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Home
                         </a>
                         @if(auth::user()->peran=='admin')
                         <a href="{{ route('Pengguna') }}" wire:navigate
                            class="btn {{ request()->routeIs('Pengguna') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Pengguna
                            @endif
                         </a>
                         @if(auth::user()->peran=='admin')
                         <a href="{{ route('Produk') }}" wire:navigate
                            class="btn {{ request()->routeIs('Produk') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Produk
                            @endif
                         </a>
                         <a href="{{ route('Transaksi') }}" wire:navigate
                            class="btn {{ request()->routeIs('Transaksi') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Transaksi
                         </a>
                         <a href="{{ route('Laporan') }}" wire:navigate
                            class="btn {{ request()->routeIs('Laporan') ? 'btn-primary' : 'btn-outline-primary' }}">
                            Laporan
                         </a>
                    </div>
                </div>

                <!-- Slot konten Blade -->
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
