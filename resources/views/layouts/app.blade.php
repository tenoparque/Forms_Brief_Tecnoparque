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

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">


    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Artifakt&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

     

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/img'])
    @vite('resources/js/menuburger.js')
    @vite('resources/js/validateUserRegister.js')

</head>

<body>

    <div class="wrapper">
        @if (Route::currentRouteName() !== 'login')
            <aside id="sidebar">
                <div class="">
                    <div class=" d-flex align-items-center justify-content-center">
                        <img class="img-perfil " src="/images/recursos/foto-perfil.png"></img>
                    </div>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="/users" class="sidebar-link" style="text-decoration: none">
                            <i class="lni lni-user"></i>
                            <span>Usuario</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <a href="/roles" class="sidebar-link" style="text-decoration: none">
                            <i class="lni lni-user"></i>
                            <span>Rol</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <a href="/solicitudes" class="sidebar-link  has-dropdown collapsed"
                            style="text-decoration: none">
                            <i class="lni lni-popup"></i>
                            <span>Solicitud</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <a href="servicios-por-tipos-de-solicitudes" class="sidebar-link collapsed has-dropdown"
                            style="text-decoration: none">
                            <i class="lni lni-layout"></i>
                            <span>Servicios</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <a href="tipos-de-datos" class="sidebar-link" style="text-decoration: none">
                            <i class="lni lni-popup"></i>
                            <span class="txtTip">Tipo Campo</span>
                            <br>
                            <span class="txtSoli">x Solicitud</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <br><br><br><br><br><br>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" style="text-decoration: none"
                            onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                            <i class="lni lni-exit"></i>
                            <span>Cerrar sesión</span>
                        </a>
                        <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                <div class="sidebar-footer">

                    <div class="text-center pb-2">
                        <h1 class="textbrief">Brief</h1>
                        <p class="textbriefsol">Plataforma de solicitudes</p>
                    </div>
                </div>
            </aside>
            <div>
                <button class="toggle-btn" type="button">
                    <img class="flecha" src="/images/recursos/flecha.png"></img>
                </button>
            </div>
        @endif

        <div class="main">
            <div class="">
                <main class="">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
