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
    
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Artifakt&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/img'])
    @vite('resources/js/menuburger.js')
    @vite('resources/js/validateUserRegister.js')
</head>
<body>
    <div class="wrapper">
        @if(Route::currentRouteName() !== 'login')
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-chevron-right"></i>
                </button>
                <div class="sidebar-logo">
                    <img class="img-perfil" src="/images/recursos/foto-perfil.png"></img>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" style="text-decoration: none">
                        <i class="lni lni-user"></i>
                        <span>Usuario</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/roles" class="sidebar-link" style="text-decoration: none">
                        <i class="lni lni-agenda"></i>
                        <span>Rol</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/solicitudes" class="sidebar-link  has-dropdown collapsed" style="text-decoration: none">
                        <i class="lni lni-protection"></i>
                        <span>Solicitud</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="servicios-por-tipos-de-solicitudes" class="sidebar-link collapsed has-dropdown" style="text-decoration: none">
                        <i class="lni lni-layout"></i>
                        <span>Servicios</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tipos-de-datos" class="sidebar-link" style="text-decoration: none">
                        <i class="lni lni-popup"></i>
                        <span>Tipo Campo x Solicitud</span>
                    </a>
                </li>
                <br><br><br><br><br><br><br><br><br><br><br><br><br>
                <li>
                    <div class="sidebar-footer">
                        <a href="#" class="sidebar-link" style="text-decoration: none" onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                            <i class="lni lni-exit"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    
                        <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link2" style="text-decoration: none">
                        <img class="text-brief" src="/images/recursos/texto-brief.png"></img>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link2" style="text-decoration: none">
                        <span class="text-yellow">Plataforma de solicitudes</span>
                    </a>
                </li>
                
            </ul>
            
        </aside>
        @endif

        <div class="main p-3">
            <div class="text-center">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
