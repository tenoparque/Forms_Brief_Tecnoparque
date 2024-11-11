@extends('layouts.app')

@section('content')
    <div class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center">
                                <div class="d-flex mt-3 mb-4">

                                    <div>
                                        <h1 class="primeraPalabraFlex"
                                            style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)">
                                            {{ __('DASHBOARD') }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (session()->has('alert-success'))
                        <div class="alert alert-success">
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 style="margin-top: 50px;">Bienvenido a BRIEF, Gestión de Formularios Tecnoparque!</h4>
                    </div>



                    <!-- Tarjetas de estadísticas -->
                    @can('dashboard.index')
                        <div class="container-fluid py-5">
                            <div class="row">
                                <div class="col-xl-4 col-sm-6 mb-xl-12 mb-4">
                                    <div class="card border-light shadow">
                                        <div class="card-header p-3 pt-2" style="border:transparent;">
                                            <div class="d-flex align-items-center">
                                                <!-- Ícono con el número al lado -->
                                                <div
                                                    class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl me-3">
                                                    <i class="fa-solid fa-envelope-circle-check"></i>
                                                </div>
                                                <!-- Texto y número más grande -->
                                                <div>
                                                    <p class="titulosoli mb-0">Solicitudes</p>
                                                    <span class="numero-color display-5" id="cardUno"></span>
                                                    <!-- Número en tamaño grande -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (!auth()->user()->hasRole('Designer|Experto Divulgación'))
                                    <div class="col-xl-4 col-sm-6 mb-xl-12 mb-4">
                                        <div class="card border-light shadow">
                                            <div class="card-header p-3 pt-2" style="border:transparent;">
                                                <div class="d-flex align-items-center">
                                                    <!-- Ícono con el número al lado -->
                                                    <div
                                                        class="icon icon-lg icon-shape bg-gradient-dark shadow-primary text-center border-radius-xl me-3">
                                                        <i class="fa-solid fa-envelope-open-text"></i>
                                                    </div>
                                                    <!-- Texto y número más grande -->
                                                    <div>
                                                        <p class="titulosoli mb-0">Solicitudes en espera</p>
                                                        <span class="numero-color display-5" id="cardDos"></span>
                                                        <!-- Número en tamaño grande -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-xl-4 col-sm-6 mb-xl-12 mb-4">
                                    <div class="card border-light shadow">
                                        <div class="card-header p-3 pt-2" style="border:transparent;">
                                            <div class="d-flex align-items-center">
                                                <!-- Ícono con el número al lado -->
                                                <div
                                                    class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl me-3">
                                                    <i class="fa-solid fa-envelope-circle-check"></i>
                                                </div>
                                                <!-- Texto y número más grande -->
                                                <div>
                                                    <p class="titulosoli mb-0">Solicitudes Finalizadas</p>
                                                    <span class="numero-color display-5" id="cardTres"></span>
                                                    <!-- Número en tamaño grande -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <!-- Fin de las tarjetas de estadísticas -->
                            <!-- Tarjetas con graficos Donas -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card bg-crema  border-light"
                                        style="display: flex;justify-content: center;align-items: center;flex-direction: column;text-align: center;">
                                        <div class="card-body">
                                            <h5 style="color:#00324d;" class="card-title">Proporción Solicitudes </h5>
                                            <canvas id="grafico_solicitudes_modificaciones" style="width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::user()->hasAnyRole(['Super Admin', 'Activador Nacional', 'Designer', 'Experto Divulgación']))
                                    <div class="col-md-6">
                                        <div class="card bg-crema border-light"
                                            style="display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center;">
                                            <div class="card-body">
                                                <h5 style="color:#00324d" class="card-title">Tipos de solicitudes</h5>
                                                <canvas id="grafico_tipos_solicitudes" style="width: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <!-- Gráfico con Chart.js -->
                            @can('dashboard.charts')
                                <div class="row mt-4" style="margin-top: 50px;margin-bottom: 30px">
                                    <div class="col-md-12">
                                        <div class="card border-0">
                                            <div class="card-body">
                                                <canvas id="grafica_mes_a_mes" width="400" height="100"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (Auth::user()->hasAnyRole(['Super Admin', 'Activador Nacional']))
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <canvas id="garfica_nodos_solicitudes" width="400"
                                                        height="100"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="card border-0">
                                                <div class="card-body">
                                                    <canvas id="grafica_cantidades_asignadas" width="400"
                                                        height="100"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- Fin del Gráfico con Chart.js -->
                            @endcan
                            <!-- Fin de las tarjetas de estadísticas -->

                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var intervalo = setInterval(hacerSolicitud, 5000);

                function hacerSolicitud() {

                    clearInterval(intervalo);
                    fetch("{{ route('datosGraficas') }}", {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest' // Agrega este encabezado para que Laravel detecte la solicitud como AJAX
                            }
                        }) // Utiliza la función route de Laravel para obtener la URL del endpoint
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error en la solicitud: ' + response.status);
                            }
                            return response.json();
                        })
                        .then(data => {
                            // Actualizar el valor en el elemento HTML
                            const cardUnoElement = document.getElementById('cardUno');
                            if (cardUnoElement) {
                                cardUnoElement.textContent = "" + data.total;
                            }

                            // Verificar si existe el elemento con ID 'cardDos'
                            const cardDosElement = document.getElementById('cardDos');
                            if (cardDosElement) {
                                cardDosElement.textContent = "" + data.CardDos;
                            }

                            // Llamar a la función para actualizar las gráficas
                            actualizarGraficos(data, data.tiposDeSolicitudes);
                        })
                        .catch(error => {
                            console.error('Error en la solicitud:', error);
                        })
                        .finally(() => {
                            intervalo = setInterval(hacerSolicitud, 5000);
                        });
                }

                var garfica_nodos_solicitudes = null;
                var grafico_solicitudes_modificaciones = null;
                var grafico_tipos_solicitudes = null;
                var grafica_mes_a_mes = null;
                var grafica_cantidades_asignadas = null;

                // Función para actualizar la gráfica tipo dona con los nuevos datos
                function actualizarGraficos(datos, tiposDeSolicitudes) {
                    // Valores predeterminados en caso de que los datos estén vacíos
                    var etiquetasDefault = ['Sin datos'];
                    var valoresDefault = [0];

                    // Gráfico de solicitudes asignadas
                    var barraCtx = document.getElementById('grafica_cantidades_asignadas');
                    if (barraCtx) {
                        barraCtx = barraCtx.getContext('2d');
                        if (!grafica_cantidades_asignadas) {
                            grafica_cantidades_asignadas = new Chart(barraCtx, {
                                type: 'bar',
                                data: {
                                    labels: datos.etiquetas || etiquetasDefault,
                                    datasets: [{
                                        label: 'Solicitudes Asignadas',
                                        data: datos.cantidades_asignadas || valoresDefault,
                                        backgroundColor: 'rgba(57, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        } else {
                            grafica_cantidades_asignadas.data.labels = datos.etiquetas || etiquetasDefault;
                            grafica_cantidades_asignadas.data.datasets[0].data = datos.cantidades_asignadas || valoresDefault;
                            grafica_cantidades_asignadas.update();
                        }
                    }

                    // Gráfico de nodos y solicitudes por nodo
                    var graficaNodosCtx = document.getElementById('garfica_nodos_solicitudes');
                    if (graficaNodosCtx) {
                        graficaNodosCtx = graficaNodosCtx.getContext('2d');
                        if (!garfica_nodos_solicitudes) {
                            garfica_nodos_solicitudes = new Chart(graficaNodosCtx, {
                                type: 'bar',
                                data: {
                                    labels: datos.datosPorNodo ? datos.datosPorNodo.map(item => item.nombre) :
                                        etiquetasDefault,
                                    datasets: [{
                                        label: 'Solicitudes por Nodo',
                                        data: datos.datosPorNodo ? datos.datosPorNodo.map(item => item
                                            .total_solicitudes) : valoresDefault,
                                        backgroundColor: 'rgba(57, 169, 0, 0.5)',
                                        borderColor: 'rgba(57, 169, 0, 0.5)',
                                        borderWidth: 1
                                    }, {
                                        label: 'Modificaciones por Nodo',
                                        data: datos.datosPorNodo ? datos.datosPorNodo.map(item => item
                                            .total_modificaciones) : valoresDefault,
                                        backgroundColor: 'rgba(100, 44, 120, 0.5)',
                                        borderColor: 'rgba(100, 44, 120, 0.5)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        } else {
                            garfica_nodos_solicitudes.data.labels = datos.datosPorNodo ? datos.datosPorNodo.map(item => item
                                .nombre) : etiquetasDefault;
                            garfica_nodos_solicitudes.data.datasets[0].data = datos.datosPorNodo ? datos.datosPorNodo.map(item =>
                                item.total_solicitudes) : valoresDefault;
                            garfica_nodos_solicitudes.data.datasets[1].data = datos.datosPorNodo ? datos.datosPorNodo.map(item =>
                                item.total_modificaciones) : valoresDefault;
                            garfica_nodos_solicitudes.update();
                        }
                    }

                    // Gráfico de solicitudes y modificaciones (tipo dona)
                    var donaCtx = document.getElementById('grafico_solicitudes_modificaciones');
                    if (donaCtx) {
                        donaCtx = donaCtx.getContext('2d');
                        if (!grafico_solicitudes_modificaciones) {
                            grafico_solicitudes_modificaciones = new Chart(donaCtx, {
                                type: 'doughnut',
                                data: {
                                    labels: ['Solicitudes', 'Modificaciones'],
                                    datasets: [{
                                        label: 'Total',
                                        data: [datos.solicitudes || 0, datos.modificaciones || 0],
                                        backgroundColor: ['rgba(57, 169, 0, 0.5)', 'rgba(100, 44, 120, 0.5)'],
                                        borderColor: ['rgba(57, 169, 0, 0.5)', 'rgba(100, 44, 120, 0.5)'],
                                        borderWidth: 1
                                    }]
                                },
                                options: {}
                            });
                        } else {
                            grafico_solicitudes_modificaciones.data.datasets[0].data = [datos.solicitudes || 0, datos
                                .modificaciones || 0
                            ];
                            grafico_solicitudes_modificaciones.update();
                        }
                    }

                    // Gráfico de tipos de solicitudes (tipo dona)
                    var otroDonaCtx = document.getElementById('grafico_tipos_solicitudes');
                    if (otroDonaCtx) {
                        otroDonaCtx = otroDonaCtx.getContext('2d');
                        if (!grafico_tipos_solicitudes) {
                            grafico_tipos_solicitudes = new Chart(otroDonaCtx, {
                                type: 'doughnut',
                                data: {
                                    labels: tiposDeSolicitudes ? tiposDeSolicitudes.map(tipo => tipo.nombre) :
                                        etiquetasDefault,
                                    datasets: [{
                                        label: 'Cantidad de Solicitudes',
                                        data: tiposDeSolicitudes ? tiposDeSolicitudes.map(tipo => tipo.total) :
                                            valoresDefault,
                                        backgroundColor: ['rgba(57, 169, 0, 0.5)', 'rgba(54, 162, 235, 0.5)'],
                                        borderColor: ['rgba(57, 169, 0, 0.5)', 'rgba(54, 162, 235, 1)'],
                                        borderWidth: 1
                                    }]
                                },
                                options: {}
                            });
                        } else {
                            grafico_tipos_solicitudes.data.labels = tiposDeSolicitudes ? tiposDeSolicitudes.map(tipo => tipo
                                .nombre) : etiquetasDefault;
                            grafico_tipos_solicitudes.data.datasets[0].data = tiposDeSolicitudes ? tiposDeSolicitudes.map(tipo =>
                                tipo.total) : valoresDefault;
                            grafico_tipos_solicitudes.update();
                        }
                    }

                    // Función para formatear la fecha en formato "mes año"
                    function formatearFecha(anio, mes) {
                        const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                            'Octubre', 'Noviembre', 'Dicicembre'
                        ];
                        return meses[mes - 1];
                    }

                    // Gráfico de solicitudes y modificaciones por mes
                    var grafica_por_mes = document.getElementById('grafica_mes_a_mes');
                    if (grafica_por_mes) {
                        grafica_por_mes = grafica_por_mes.getContext('2d');
                        if (!grafica_mes_a_mes) {
                            grafica_mes_a_mes = new Chart(grafica_por_mes, {
                                type: 'bar',
                                data: {
                                    labels: datos.datos_mes_a_mes ? datos.datos_mes_a_mes.map(data => formatearFecha(data
                                        .anio, data.mes)) : etiquetasDefault,
                                    datasets: [{
                                        label: 'Solicitudes',
                                        data: datos.datos_mes_a_mes ? datos.datos_mes_a_mes.map(data => data
                                            .total_solicitudes) : valoresDefault,
                                        backgroundColor: 'rgba(57, 169, 0, 0.5)',
                                        borderColor: 'rgba(57, 169, 0, 0.5)',
                                        borderWidth: 1
                                    }, {
                                        label: 'Modificaciones',
                                        data: datos.datos_mes_a_mes ? datos.datos_mes_a_mes.map(data => data
                                            .total_modificaciones) : valoresDefault,
                                        backgroundColor: 'rgba(100, 44, 120, 0.5)',
                                        borderColor: 'rgba(100, 44, 120, 0.5)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {}
                            });
                        } else {
                            grafica_mes_a_mes.data.labels = datos.datos_mes_a_mes ? datos.datos_mes_a_mes.map(data =>
                                formatearFecha(data.anio, data.mes)) : etiquetasDefault;
                            grafica_mes_a_mes.data.datasets[0].data = datos.datos_mes_a_mes ? datos.datos_mes_a_mes.map(data => data
                                .total_solicitudes) : valoresDefault;
                            grafica_mes_a_mes.data.datasets[1].data = datos.datos_mes_a_mes ? datos.datos_mes_a_mes.map(data => data
                                .total_modificaciones) : valoresDefault;
                            grafica_mes_a_mes.update();
                        }
                    }
                }


                document.addEventListener("DOMContentLoaded", function() {
                    // Llamar a hacerSolicitud una vez que el documento esté listo
                    hacerSolicitud();
                });

                window.addEventListener('resize', function() {
                    // Verifica si la gráfica está definida
                    if (garfica_nodos_solicitudes) {
                        garfica_nodos_solicitudes.resize();
                    }
                    if (grafica_mes_a_mes) {
                        grafica_mes_a_mes.resize();
                    }
                    if (grafica_cantidades_asignadas) {
                        grafica_cantidades_asignadas.resize();
                    }
                });


                // Función para realizar la solicitud XHR
                function hacerSolicitudXHR() {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', '{{ route('solicitudes.finalizadas') }}', true);
                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 300) {
                            console.log('Solicitud exitosa');

                            // Obtener el div donde deseas mostrar la respuesta
                            var pruebaDiv = document.getElementById('cardTres');

                            // Asignar el contenido de la respuesta al div
                            pruebaDiv.textContent = xhr.responseText;
                        } else {
                            console.error('Error en la solicitud:', xhr.statusText);
                        }
                    };
                    xhr.onerror = function() {
                        console.error('Error en la solicitud');
                    };
                    xhr.send();
                }

                // Llamar a la función inicialmente y luego cada 5 segundos
                hacerSolicitudXHR();
                setInterval(hacerSolicitudXHR, 5000);
            </script>
        @endsection
