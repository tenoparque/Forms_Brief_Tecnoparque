<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Brief') }}</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('/images/logo.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('/images/logo.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">


    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Artifakt&display=swap" rel="stylesheet">



    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- JQUERY Reference -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Spectrum Color Picker -->
   
    

    
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/spectrum-colorpicker2/dist/spectrum.min.css">




    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/img'])
    @vite('resources/js/menuburger.js')
    @vite('resources/js/validateUserRegister.js')



    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>



</head>

<body>

    {{-- <style>
        /* Agrega estilos CSS para la clase "active" */
        .sidebar-nav .sidebar-item .sidebar-link.active-link {
    color: yellow;
}

    </style> --}}

    @include('sweetalert::alert')

    <div class="wrapper">
        {{-- Este bloque de código se ejecutará si la ruta actual NO coincide con ninguna de las rutas de login, password.request o password.reset --}}
        @if (!request()->routeIs('login') && !request()->routeIs('password.request') && !request()->routeIs('password.reset'))
            <div class="wrapper">
                <aside id="sidebar">
                    <button class="toggle-btn" type="button">
                        <img class="flecha" src="/images/recursos/flecha.png" width="20px" height="20px"></img>
                    </button>
                    <div class="d-flex">

                        <div class="sidebar-logo" style="text-align: center;">
                            <a href="{{ route('user.miperfil') }}">
                                <img style="cursor: pointer;" src="../images/recursos/foto-perfil.png" alt=""
                                    class="img-fluid" width="70%" height=70%>
                            </a>
                            <p style="color: white; cursor: default">Mi perfil</p>
                        </div>
                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-item">
                            <a href="{{ route('home.index') }}" class="sidebar-link">
                                <i class="lni lni-home"></i></i>
                                <span>Home</span>
                            </a>
                            <hr class="hrmenu">
                        </li>

                        @can('users.index')
                            {{-- Validate that you have the users.index permission to be able to watch the users item (link). --}}
                            <li class="sidebar-item">
                                <a href="{{ route('users.index') }}" class="sidebar-link">
                                    <i class="lni lni-users"></i>
                                    <span>Usuarios</span>
                                </a>
                                <hr class="hrmenu">
                            </li>
                        @endcan

                        @can('roles.index')
                            {{-- Validate that you have the roles.index permission to be able to watch the roles item (link). --}}
                            <li class="sidebar-item">
                                <a href="{{ route('roles.index') }}" class="sidebar-link">
                                    <i class="lni lni-user"></i>
                                    <span>Rol</span>
                                </a>
                                <hr class="hrmenu">
                            </li>
                        @endcan

                        @can('estados.index')
                            {{-- Validate that you have the estados.index permission to be able to display the Estados item. --}}
                            <li class="sidebar-item">
                                <a href="{{ route('estados.index') }}" class="sidebar-link">
                                    <i class="lni lni-reload"></i>
                                    <span>Estados</span>
                                </a>
                                <hr class="hrmenu">
                            </li>
                        @endcan

                        @can('politicas.index')
                            {{-- Validate that you have the politicas.index permission to be able to display the Politicas item. --}}
                            <li class="sidebar-item">
                                <a href="{{ route('politicas.index') }}" class="sidebar-link">
                                    <i class="lni lni-handshake"></i>
                                    <span>Politicas</span>
                                </a>
                                <hr class="hrmenu">
                            </li>
                        @endcan

                        @can('personalizaciones.index')
                            {{-- Validate that you have the personalizaciones.index permission to be able to display the Personalizaciones item. --}}
                            <li class="sidebar-item">
                                <a href="{{ route('personalizaciones.index') }}" class="sidebar-link">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    <span>Personalizaciones</span>
                                </a>
                                <hr class="hrmenu">
                            </li>
                        @endcan

                        {{-- Here we validate that you must have at least one of these permissions to pass to the second validation layer --}}
                        @canany(['categoriasEventosEspeciales.index', 'eventosEspeciales.index'])
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                    data-bs-target="#eventos" aria-expanded="false" aria-controls="auth">
                                    <i class="fa-regular fa-calendar-days"></i>
                                    <span>Eventos</span>
                                </a>
                                <hr class="hrmenu">
                                <ul id="eventos" class="sidebar-dropdown list-unstyled collapse"
                                    data-bs-parent="#sidebar">

                                    @can('categoriasEventosEspeciales.index')
                                        {{-- Validate that you have the categoriasEventosEspeciales.index permission to be able to display the Categorias de Eventos Especiales Permissions item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('categorias-eventos-especiales.index') }}"
                                                class="sidebar-link">Categoria de eventos
                                            </a>
                                        </li>
                                    @endcan

                                    @can('eventosEspeciales.index')
                                        {{-- Validate that you have the eventosEspeciales.index permission to be able to display the Eventos Especiales Permissions item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('eventos-especiales-por-categorias.index') }}"
                                                class="sidebar-link">Eventos especiales
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcan

                        {{-- Here we validate that you must have at least one of these permissions to pass to the second validation layer --}}
                        @canany(['departamentos.index', 'nodos.index', 'ciudades.index'])
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                    data-bs-target="#nodos" aria-expanded="false" aria-controls="auth">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>Tecnoparques</span>
                                </a>
                                <hr class="hrmenu">
                                <ul id="nodos" class="sidebar-dropdown list-unstyled collapse"
                                    data-bs-parent="#sidebar">

                                    @can('nodos.index')
                                        {{-- Validate that you have the nodos.index permission to be able to display the Nodos item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('nodos.index') }}" class="sidebar-link">Nodos</a>

                                        </li>
                                    @endcan

                                    @can('departamentos.index')
                                        {{-- Validate that you have the departamentos.index permission to be able to display the Departamentos item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('departamentos.index') }}"
                                                class="sidebar-link">Departamentos</a>
                                        </li>
                                    @endcan


                                    @can('ciudades.index')
                                        {{-- Validate that you have the ciudades.index permission to be able to display the Ciudades item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('ciudades.index') }}" class="sidebar-link">Ciudades</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan

                        {{-- Here we validate that you must have at least one of these permissions to pass to the second validation layer --}}
                        @canany(['solicitudes.index', 'tiposSolicitudes.index', 'serviciosPorTiposSolicitudes.index',
                            'estadosSolicitudes.index', 'datosUnicosSolicitud.index'])
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                    data-bs-target="#solicitudes" aria-expanded="false" aria-controls="auth">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                    <span>Solicitud</span>
                                </a>
                                <hr class="hrmenu">
                                <ul id="solicitudes" class="sidebar-dropdown list-unstyled collapse"
                                    data-bs-parent="#sidebar">

                                    @can('solicitudes.index')
                                        {{-- Validate that you have the solicitudes.index permission to be able to display the Solicitudes item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('solicitudes.index') }}" class="sidebar-link">Solicitudes</a>
                                        </li>
                                    @endcan

                                    @can('tiposSolicitudes.index')
                                        {{-- Validate that you have the tiposSolicitudes.index permission to be able to display the Tipos de Solicitudes item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('tipos-de-solicitudes.index') }}" class="sidebar-link">Tipo de
                                                solicitudes
                                            </a>
                                        </li>
                                    @endcan

                                    @can('serviciosPorTiposSolicitudes.index')
                                        {{-- Validate that you have the serviciosPorTiposSolicitudes.index permission to be able to display the Servicios Por Tipos de Solicitudes item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('servicios-por-tipos-de-solicitudes.index') }}"
                                                class="sidebar-link">Servicios x tipo de solicitud
                                            </a>
                                        </li>
                                    @endcan

                                    @can('estadosSolicitudes.index')
                                        {{-- Validate that you have the estadosSolicitudes.index permission to be able to display the Estados de las Solicitudes item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('estados-de-las-solictudes.index') }}"
                                                class="sidebar-link">Estados de las solicitudes
                                            </a>
                                        </li>
                                    @endcan

                                    @can('datosUnicosSolicitud.index')
                                        {{-- Validate that you have the datosUnicosSolicitud.index permission to be able to display the Datos Unicos Por Solicitud item. --}}
                                        <li class="sidebar-item">
                                            <a href="{{ route('datos-unicos-por-solicitudes.index') }}"
                                                class="sidebar-link">Datos únicos x solicitud
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcan

                        @can('tiposDeDato.index')
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                                    data-bs-target="#datos" aria-expanded="false" aria-controls="auth">
                                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                                    <span>Datos</span>
                                </a>
                                <hr class="hrmenu">
                                <ul id="datos" class="sidebar-dropdown list-unstyled collapse"
                                    data-bs-parent="#sidebar">
                                    <li class="sidebar-item">
                                        <a href="{{ route('tipos-de-datos.index') }}" class="sidebar-link">Tipo de
                                            datos</a>

                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <li class="sidebar-item">
                            <a href="{{ route('reportes-estadisticas.reports') }}" class="sidebar-link">
                                <i class="fa-solid fa-chart-simple"></i>
                                <span>Reportes y Estadísticas</span>
                            </a>
                            <hr class="hrmenu">
                        </li>

                    </ul>
                    <div class="sidebar-footer">
                        <a href="{{ route('logout') }}" class="sidebar-link"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

                            <i class="lni lni-exit"></i>
                            <span>{{ __('Cerrar Sesión') }}</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <div class="text-center pb-2 textFooter">
                            <h1 class="textbrief" style="color: #fff;font-size:50px;font-weight:600;">Brief</h1>
                            <p class="textbriefsol">Plataforma de solicitudes</p>
                        </div>
                    </div>

                </aside>

            </div>
        @endif

        <div class="main">
            <div class="">
                <main class="" style="">
                    @if (Route::currentRouteName() !== 'login')
                        <header class="container-fluid  "
                            style="align-items: center; margin-top: 55px; margin-bottom: 50px">
                            <div class="row d-flex justify-content-between">
                                <!-- Carta Izquierda -->
                                <div class="col-xl-9 col-lg-7 col-md-8 col-sm-8 col-12 mb-3 ">
                                    @if (!request()->routeIs('password.reset'))
                                        <div class="">
                                            <div class="text-wel mx-5">
                                                <h5 class="welcoRe" style="text-transform: uppercase">BIENVENIDO
                                                    {{ $nombreUsuario }}</h5>
                                                <h4></h4>
                                                <div>
                                                    <h2>
                                                        <span class="primeraPalabraFlex">ROL: </span><span
                                                            class="segundaPalabraFlex"
                                                            style="text-transform: uppercase">
                                                            {{ $nombreRol }}</span>
                                                    </h2>
                                                </div>
                                            </div>

                                        </div>
                                    @endif
                                </div>

                                <!-- Carta Derecha -->
                                <div class="col-xl-3 col-lg-5 col-md-4 col-sm-4 col-12">
                                    @if (isset($logo))
                                        <img class="ImgHeader" id="logoHeader"
                                            src="data:image/png;base64,{{ base64_encode($logo) }}"></img>
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
    /* LOGIN */
    .flex__direction-login {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border-radius: 20px;
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
        background-color: {{ $colorPrincipal }}E9;

        transition: 0.3s;
    }

    .titulo__login {
        font-family: "Work Sans", sans-serif;
        font-weight: 800;
        font-size: 710%;
        color: #fff;
        padding-top: 80px;
        margin: 0;
    }

    .subtitulo__login {
        color: {{ $colorTerciario }};
        font-size: 170%;
        font-weight: 300;
        font-family: "Work Sans", sans-serif;
        padding: 0 0 0 0;
        margin: 0;
        margin-bottom: 12px;
        margin-block-start: -2%;
    }

    #sidebar {
        width: 70px;
        min-width: 70px;
        z-index: 1000;
        transition: all .25s ease-in-out;
        background: linear-gradient(to bottom, {{ $colorPrincipal }}, {{ $colorSecundario }});
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .sidebar-link.active {
        color: {{ $colorTerciario}};       
    }

    .swal2-confirm {
    background-color:  {{ $colorPrincipal }} !important;

}
    
        .progressbar li.active+li::after {
        background: linear-gradient(to right, {{ $colorPrincipal }} ,{{ $colorSecundario }});
}
.progressbar li.active::before {
        
        background-color: {{ $colorCuarto }};      
         box-shadow: 0 0 5px rgb({{ $colorSecundario }}); 
    }
    .page-link {
    color: {{ $colorSecundario }} !important;
   
}
   
.progressbar li.active {
        color:{{ $colorCuarto}} ;

    }
    .page-item.active .page-link {

background-color:{{ $colorPrincipal }} ;
/* Cambia el color de fondo del elemento activo */
border-color: #ffffff;
/* Cambia el color del borde del elemento activo */
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
        font-weight: 700;

    }

    .segundaPalabraFlex {
        color: {{ $colorPrincipal }};
        font-weight: 900;

    }
    .invalid-feedback {
    color: {{ $colorSecundario }} ;
}




    .hrmenu {
        background: {{ $colorTerciario }};
        border: none;
        height: 1px;
        width: 80%;
        opacity: 20;
        margin: 0 auto;

    }

    /*diseño del icono select*/

    .circle {
        margin-block-start: 80%;
        right: 50%;
        top: 50%;
        width: 120%;
        height: 120%;
        border-radius: 60%;
        z-index: 1;
        background-color: {{ $colorSecundario }};
    }

    .circle-play {
        position: absolute;
        top: 50%;
        right: 10px;
        width: 24px;
        height: 24px;
        position: relative;
        z-index: 1;
        transform: translateY(-50%);
    }

    .icono {
        position: absolute;
        right: 2%;
        top: 50%;
        z-index: 1;
        transform: translateY(-50%);
        justify-content: center;
        align-items: center;
        pointer-events: none;


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
<script>
    window.onbeforeunload = function() {
        history.replaceState(null, null, location.pathname);
    }
</script>
<script>
    $(document).ready(function() {
        // Obtener la URL de la página actual
        var url = window.location.href;

        // Recorrer todos los enlaces del menú lateral
        $('.sidebar-link').each(function() {
            // Si la URL del enlace coincide con la URL de la página actual
            if (this.href === url) {
                // Añadir la clase 'active' al enlace
                $(this).addClass('active');
            }
        });
    });
</script>

</html>
