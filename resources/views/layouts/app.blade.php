<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ConsultameUTN') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'ConsultameUTN') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    <!-- get current user -->

                    @if (Auth::user())

                        @if (Auth::user()->role == 'ALUMNO')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('all') }}">{{ __('Anotarse a Consultas') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('misinscripciones', Auth::user()->id) }}">{{ __('Mis Inscripciones') }}</a>
                            </li>
                        @endif

                        @if (Auth::user()->role == 'DOCENTE')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('misconsultas', Auth::user()->id) }}">{{ __('Consultas') }}</a>
                            </li>
                        @endif                 

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('inscripciones.index') }}">{{ __('Inscripciones') }}</a>
                        </li> -->
                        
                        @if (Auth::user()->role == 'ADMIN')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('materias.index') }}">{{ __('Materias') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('consultas.index') }}">{{ __('Consultas') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('inscripciones.index') }}">{{ __('Inscripciones') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('all') }}">{{ __('Anotarse a Consultas') }}</a>
                            </li>
                        @endif
                    @endif
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('materias.index') }}">{{ __('Materias') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                    </li> -->

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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
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
            @yield('content')
        </main>
    </div>
    @yield('js')
</body>
</html>
