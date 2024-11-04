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
                                    <div class="card  border-light shadow">
                                        <div class="card-header p-3 pt-2"style="border:transparent;">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                                <i class="fa-solid fa-envelope-circle-check"></i>
                                            </div>
                                            <div class="text-end pt-1">
                                                <p class="titulosoli">Solicitudes</p>
                                            </div>
                                        </div>

                                        <div class="card-footer p-3" style="background-color:#ececee">
                                            <span class="total-color">Total:</span>
                                            <span class="numero-color" id="cardUno"></span>
                                        </div>

                                    </div>
                                </div>
                                @if (!auth()->user()->hasRole('Designer'))
                                    <div class="col-xl-4 col-sm-6 mb-xl-12 mb-4">
                                        <div class="card  border-light shadow">
                                            <div class="card-header p-3 pt-2"style="border:transparent;">
                                                <div
                                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                                    <i class="fa-solid fa-envelope-open-text"></i>

                                                </div>
                                                <div class="text-end pt-1">
                                                    <p class="titulosoli">Solicitudes en espera</p>
                                                </div>
                                            </div>
                                            <div class="card-footer p-3" style="background-color:#ececee">
                                                <span class="total-color">Total:</span>
                                                <span class="numero-color" id="cardDos"></span>
                                            </div>

                                        </div>
                                    </div>
                                @endif

                                <div class="col-xl-4 col-sm-6 mb-xl-12 mb-4">
                                    <div class="card  border-light shadow">
                                        <div class="card-header p-3 pt-2"style="border:transparent;">
                                            <div
                                                class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                                <i class="fa-solid fa-envelope-circle-check"></i>
                                            </div>
                                            <div class="text-end pt-1">
                                                <p class="titulosoli">Solicitudes Finalizadas</p>
                                            </div>
                                        </div>
                                        <div class="card-footer p-3" style="background-color:#ececee">
                                            <span class="total-color">Total:</span>
                                            <span class="numero-color" id="cardTres"></span>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            <!-- Fin de las tarjetas de estadísticas -->

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


                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <canvas id="garfica_nodos_solicitudes" width="400" height="100"></canvas>
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

                            <!-- Fin del Gráfico con Chart.js -->

                            <!-- Tarjetas con graficos -->
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
                                <div class="col-md-6 ">
                                    <div class="card bg-crema  border-light "
                                        style="display: flex;justify-content: center;align-items: center;flex-direction: column;text-align: center;">
                                        <div class="card-body">
                                            <h5 style="color:#00324d" class="card-title">Tipos de solicitudes</h5>
                                            <canvas id="grafico_tipos_solicitudes" style="width: 100%;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    fetch("{{ route('datosGraficas') }}") // Utiliza la función route de Laravel para obtener la URL del endpoint
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
                    if (datos.cantidades_asignadas && datos.cantidades_asignadas.length > 0) {
                        var etiquetasAsignadas = datos.etiquetas || etiquetasDefault;
                        var cantidadesAsignadas = datos.cantidades_asignadas || valoresDefault;
                    } else {
                        var etiquetasAsignadas = etiquetasDefault;
                        var cantidadesAsignadas = valoresDefault;
                    }

                    var barraCtx = document.getElementById('grafica_cantidades_asignadas').getContext('2d');
                    if (!grafica_cantidades_asignadas) {
                        grafica_cantidades_asignadas = new Chart(barraCtx, {
                            type: 'bar',
                            data: {
                                labels: etiquetasAsignadas,
                                datasets: [{
                                    label: 'Solicitudes Asignadas',
                                    data: cantidadesAsignadas,
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
                        grafica_cantidades_asignadas.data.labels = etiquetasAsignadas;
                        grafica_cantidades_asignadas.data.datasets[0].data = cantidadesAsignadas;
                        grafica_cantidades_asignadas.update();
                    }

                    // Gráfico de nodos y solicitudes por nodo
                    if (datos.datosPorNodo && datos.datosPorNodo.length > 0) {
                        var etiquetasNodos = datos.datosPorNodo.map(function(item) {
                            return item.nombre;
                        });
                        var totalSolicitudes = datos.datosPorNodo.map(function(item) {
                            return item.total_solicitudes;
                        });
                        var totalModificaciones = datos.datosPorNodo.map(function(item) {
                            return item.total_modificaciones;
                        });
                    } else {
                        var etiquetasNodos = etiquetasDefault;
                        var totalSolicitudes = valoresDefault;
                        var totalModificaciones = valoresDefault;
                    }

                    var barraCtx = document.getElementById('garfica_nodos_solicitudes').getContext('2d');
                    if (!garfica_nodos_solicitudes) {
                        garfica_nodos_solicitudes = new Chart(barraCtx, {
                            type: 'bar',
                            data: {
                                labels: etiquetasNodos,
                                datasets: [{
                                    label: 'Solicitudes por Nodo',
                                    data: totalSolicitudes,
                                    backgroundColor: 'rgba(57, 169, 0, 0.5)',
                                    borderColor: 'rgba(57, 169, 0, 0.5)',
                                    borderWidth: 1
                                }, {
                                    label: 'Modificaciones por Nodo',
                                    data: totalModificaciones,
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
                        garfica_nodos_solicitudes.data.labels = etiquetasNodos;
                        garfica_nodos_solicitudes.data.datasets[0].data = totalSolicitudes;
                        garfica_nodos_solicitudes.data.datasets[1].data = totalModificaciones;
                        garfica_nodos_solicitudes.update();
                    }


                    // Gráfico de tipo dona para solicitudes y modificaciones
                    // Obtener el contexto del lienzo de la gráfica tipo dona
                    var donaCtx = document.getElementById('grafico_solicitudes_modificaciones').getContext('2d');
                    var solicitudes = datos.solicitudes !== undefined ? datos.solicitudes : 0;
                    var modificaciones = datos.modificaciones !== undefined ? datos.modificaciones : 0;

                    // Crear la gráfica tipo dona
                    if (!grafico_solicitudes_modificaciones) {
                        grafico_solicitudes_modificaciones = new Chart(donaCtx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Solicitudes', 'Modificaciones'],
                                datasets: [{
                                    label: 'Total',
                                    data: [solicitudes, modificaciones],
                                    backgroundColor: [
                                        'rgba(57, 169, 0, 0.5)',
                                        'rgba(100, 44, 120, 0.5)'
                                    ],
                                    borderColor: [
                                        'rgba(57, 169, 0, 0.5)',
                                        'rgba(100, 44, 120, 0.5)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {}
                        });
                    } else {
                        grafico_solicitudes_modificaciones.data.datasets[0].data = [solicitudes, modificaciones];
                        grafico_solicitudes_modificaciones.update();
                    }

                    // Gráfico de tipo dona para tipos de solicitudes
                    var otroDonaCtx = document.getElementById('grafico_tipos_solicitudes').getContext('2d');
                    if (tiposDeSolicitudes && tiposDeSolicitudes.length > 0) {
                        var etiquetasTipos = tiposDeSolicitudes.map(function(tipo) {
                            return tipo.nombre;
                        });
                        var datosTipos = tiposDeSolicitudes.map(function(tipo) {
                            return tipo.total;
                        });
                    } else {
                        var etiquetasTipos = etiquetasDefault;
                        var datosTipos = valoresDefault;
                    }

                    if (!grafico_tipos_solicitudes) {
                        grafico_tipos_solicitudes = new Chart(otroDonaCtx, {
                            type: 'doughnut',
                            data: {
                                labels: etiquetasTipos,
                                datasets: [{
                                    label: 'Cantidad de Solicitudes',
                                    data: datosTipos,
                                    backgroundColor: [
                                        'rgba(57, 169, 0, 0.5)',
                                        'rgba(54, 162, 235, 0.5)',
                                    ],
                                    borderColor: [
                                        'rgba(57, 169, 0, 0.5)',
                                        'rgba(54, 162, 235, 1)',
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {}
                        });
                    } else {
                        grafico_tipos_solicitudes.data.labels = etiquetasTipos;
                        grafico_tipos_solicitudes.data.datasets[0].data = datosTipos;
                        grafico_tipos_solicitudes.update();
                    }


                    // Función para formatear la fecha en formato "mes año"
                    function formatearFecha(anio, mes) {
                        const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                            'Octubre', 'Noviembre', 'Dicicembre'
                        ];
                        return meses[mes - 1];
                    }

                    var grafica_por_mes = document.getElementById('grafica_mes_a_mes').getContext('2d');

                    // Crear la gráfica tipo línea
                    if (!grafica_mes_a_mes) {
                        // Si no existe, crear una nueva gráfica
                        grafica_mes_a_mes = new Chart(grafica_por_mes, {
                            type: 'bar', // Tipo de gráfica
                            data: {
                                labels: datos.datos_mes_a_mes.map(function(data) {
                                    return formatearFecha(data.anio, data
                                        .mes); // Crear etiquetas en formato "mes año"
                                }),
                                datasets: [{
                                        label: 'Solicitudes', // Etiqueta del conjunto de datos de solicitudes
                                        data: datos.datos_mes_a_mes.map(function(data) {
                                            return data.total_solicitudes; // Obtener el total de solicitudes
                                        }),
                                        backgroundColor: 'rgba(57, 169, 0, 0.5)', // Color de fondo para las solicitudes
                                        borderColor: 'rgba(57, 169, 0, 0.5)', // Color del borde para las solicitudes
                                        borderWidth: 1
                                    },
                                    {
                                        label: 'Modificaciones', // Etiqueta del conjunto de datos de modificaciones
                                        data: datos.datos_mes_a_mes.map(function(data) {
                                            return data
                                                .total_modificaciones; // Obtener el total de modificaciones
                                        }),
                                        backgroundColor: 'rgba(100, 44, 120, 0.5)', // Color de fondo para las modificaciones
                                        borderColor: 'rgba(100, 44, 120, 0.5)', // Color del borde para las modificaciones
                                        borderWidth: 1
                                    }
                                ]
                            },
                            options: {
                                // Opciones de la gráfica (si es necesario)
                            }
                        });
                    } else {
                        // Si ya hay una instancia existente, actualizar los datos
                        grafica_mes_a_mes.data.labels = datos.datos_mes_a_mes.map(function(data) {
                            return formatearFecha(data.anio, data.mes);
                        });
                        grafica_mes_a_mes.data.datasets[0].data = datos.datos_mes_a_mes.map(function(data) {
                            return data.total_solicitudes;
                        });
                        grafica_mes_a_mes.data.datasets[1].data = datos.datos_mes_a_mes.map(function(data) {
                            return data.total_modificaciones;
                        });
                        grafica_mes_a_mes.update(); // Actualizar la gráfica
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
