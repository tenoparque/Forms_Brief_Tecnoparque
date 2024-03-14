<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Brief') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/logo.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/images/logo.png') }}">

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

    <!-- JQUERY Reference -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Spectrum Color Picker -->
    <script src="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">




    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/img'])
    @vite('resources/js/menuburger.js')
    @vite('resources/js/validateUserRegister.js')

</head>

<body>
    
    <style>
        /* Agrega estilos CSS para la clase "active" */
        .sidebar-nav .sidebar-item .sidebar-link.active-link {
    color: yellow;
}

    </style>

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
                            <i class="lni lni-users"></i>
                            <span>Usuario</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <a href="/roles" class="sidebar-link " style="text-decoration: none">
                            <i class="lni lni-user"></i>
                            <span>Rol</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <details class="sidebar-item">
                            <summary class="sidebar-link has-dropdown collapsed" style="text-decoration: none; display: list-item;">
                                <i class="lni lni-popup"></i>
                                <span>Solicitud</span>
                            </summary>
                            <ul>
                                <li>
                                    <a href="/solicitudes" class="sidebar-link" style="text-decoration: none">
                                        <i class="lni lni-user"></i>
                                        <span>Solicitudes</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/servicios-por-tipos-de-solicitudes" class="sidebar-link" style="text-decoration: none">
                                        <i class="lni lni-user"></i>
                                        <span>Servicios x Tipo de Solicitud</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/tipos-de-solicitudes" class="sidebar-link" style="text-decoration: none">
                                        <i class="lni lni-user"></i>
                                        <span>Tipos de Solicitud</span>
                                    </a>
                                </li>
                            </ul>
                        </details>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <a href="servicios-por-tipos-de-solicitudes" class="sidebar-link collapsed has-dropdown"
                            style="text-decoration: none">
                            <i class="lni lni-support"></i>
                            <span>Servicios</span>
                        </a>
                    </li>
                    <hr class="hrmenu">
                    <li class="sidebar-item">
                        <a href="tipos-de-datos" class="sidebar-link" style="text-decoration: none">
                            <i class="lni lni-popup"></i>
                            <span class="txtTip">Tipo de Datos</span>
                            
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
                    @if (Route::currentRouteName() !== 'login')
                        <header class="container-fluid  mx-3"
                            style="align-items: center; margin-top: 70px; margin-bottom: 50px">
                            <div class="row d-flex justify-content-between">
                                <!-- Carta Izquierda -->
                                <div class="col-xl-9 col-lg-7 col-md-8 col-sm-8 col-12 mb-3 ">
                                    <div class="">
                                        <div class="text-wel">
                                            <h5 class="welcoRe">BIENVENIDO</h5>
                                            <div>
                                                <h2>
                                                    <span class="primeraPalabraFlex">SUPER -</span><span
                                                        class="segundaPalabraFlex"> ADMIN</span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Carta Derecha -->
                                <div class="col-xl-3 col-lg-5 col-md-4 col-sm-4 col-12">
                                    @if(isset($logo))
                                    <img class="img-fluid" id="logoHeader" src="data:image/png;base64,{{ base64_encode($logo) }}"></img>
                                    @endif
                                </div>
                            </div>

                        </header>
                    @endif
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

<!-- All the shared styles will be here -->
<style>
    #sidebar {
        width: 70px;
        min-width: 70px;
        z-index: 1000;
        transition: all .25s ease-in-out;
        background: linear-gradient(to bottom, {{ $colorPrincipal }}, {{ $colorSecundario }});
        display: flex;
        flex-direction: column;

    }

    /* LETRA */
    .textbriefsol {
        color: {{ $colorTerciario }};
        margin-block-start: -15px;
    }

    /*COLOR DE LETRAS */
    .primeraPalabraFlex {
        margin-right: 10px;
        color: {{ $colorSecundario }};

    }

    .segundaPalabraFlex {
        color: {{ $colorPrincipal }};
        font-weight: 900;

    }

    .hrmenu {
        margin-block-start: 2px;
        background: {{ $colorTerciario }};
        border: none;
        height: 1px;
        width: 80%;
        opacity: 20;
        margin-left: 20px;
    }

    /*diseño del icono select*/

    .circle {
        margin-block-start: 80%;
        right: 50%;
        top: 50%;
        width: 120%;
        height: 120%;
        border-radius: 60%;
        background-color: {{ $colorSecundario }};
    }

    .circle-play {

        position: absolute;
        top: 50%;
        right: 10px;
        width: 24px;
        height: 24px;
        position: relative;
        transform: translateY(-50%);
    }

    .icono {
        position: absolute;
        right: 2%;
        top: 50%;
        transform: translateY(-50%);
        justify-content: center;
        align-items: center;


    }

    .triangle {
        position: absolute;
        transform: rotate(325deg);
        margin-left: 3%;
        margin-top: -8%;
        width: 8%;
        height: 14%;
        left: 9px;
        top: 9px;
        border-top: 8px solid transparent;
        border-bottom: 4px solid transparent;
        border-left: 12px solid {{ $colorPrincipal }};
        
    }
</style>

</html>

