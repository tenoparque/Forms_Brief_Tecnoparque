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
                    <div style="margin-bottom: 20px" id="valor1">
                        {{-- Acá se cargará el contador en tiempo real de las solicitudes y el historial de las modificaciones  --}}
                    </div>
                    <div style="margin-bottom: 20px" id="valor2">
                        {{-- Acá se cargará el contador en tiempo real de las solicitudes y el historial de las modificaciones  --}}
                    </div>
                    <div style="margin-bottom: 20px" id="valor3">
                        {{-- Acá se cargará el contador en tiempo real de las solicitudes y el historial de las modificaciones  --}}
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

                        <h4>Bienvenido a BRIEF, Gestión de Formularios Tecnoparque!</h4>
                    </div>

                    <!-- Tarjetas de estadísticas -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitudes</h5>
                                    <p class="card-text">Coloca aquí el número de solicitudes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitudes en Espera</h5>
                                    <p class="card-text">Coloca aquí el número de solicitudes en espera.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitudes Finalizadas</h5>
                                    <p class="card-text">Coloca aquí el número de solicitudes finalizadas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin de las tarjetas de estadísticas -->

                    <!-- Gráfico con Chart.js -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <canvas id="grafica_mes_a_mes"  width="400" height="100"></canvas>
                        </div>
                    </div>
                    
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <canvas id="garfica_nodos_solicitudes" width="400" height="100"></canvas>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <canvas id="grafica_cantidades_asignadas" width="400" height="100"></canvas>
                            </div>
                        </div>
                    
                    <!-- Fin del Gráfico con Chart.js -->

                    <!-- Tarjetas con graficos -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card bg-crema"                                 
                            style="display: flex;justify-content: center;align-items: center;flex-direction: column;text-align: center;">
                                <div class="card-body">
                                    <h5 class="card-title">Proporción Solicitudes </h5>
                                    <canvas id="grafico_solicitudes_modificaciones" style="width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-crema" 
                            style="display: flex;justify-content: center;align-items: center;flex-direction: column;text-align: center;">
                                <div class="card-body">
                                    <h5 class="card-title">Tipos de solicitudes</h5>
                                    <canvas id="grafico_tipos_solicitudes" style="width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    document.getElementById('valor3').textContent = "Total: " + data.total;
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

            if (datos.cantidades_asignadas && datos.cantidades_asignadas.length > 0) {
                var barraCtx = document.getElementById('grafica_cantidades_asignadas').getContext('2d');
                // Crear la gráfica de barras
                if (!grafica_cantidades_asignadas) {
                    grafica_cantidades_asignadas = new Chart(barraCtx, {
                        type: 'bar', // Tipo de gráfica
                        data: {
                            labels: datos.etiquetas, // Etiquetas para el eje X
                            datasets: [{
                                label: 'Solicitudes Asignadas', // Etiqueta del conjunto de datos
                                data: datos.cantidades_asignadas, // Datos para el eje Y
                                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo de las barras
                                borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
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
                    // Si ya existe una instancia de la gráfica, actualizar los datos
                    grafica_cantidades_asignadas.data.labels = datos.etiquetas;
                    grafica_cantidades_asignadas.data.datasets[0].data = datos.cantidades_asignadas;
                    grafica_cantidades_asignadas.update(); // Actualizar la gráfica
                }
            }


            

            if (datos.data && datos.data.length > 0) {
                var barraCtx = document.getElementById('garfica_nodos_solicitudes').getContext('2d');
                // Crear la gráfica de barras
                if (!garfica_nodos_solicitudes) {
                    garfica_nodos_solicitudes = new Chart(barraCtx, {
                    type: 'bar', // Tipo de gráfica
                    data: {
                        labels: datos.data.map(function(item) { return item.nombre; }), // Etiquetas para el eje X
                        datasets: [{
                            label: 'Solicitudes por Nodo', // Etiqueta del conjunto de datos
                            data: datos.data.map(function(item) { return item.total_solicitudes; }), // Datos para el eje Y
                            backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo de las barras
                            borderColor: 'rgba(75, 192, 192, 1)', // Color del borde de las barras
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
                    // Si ya existe una instancia de la gráfica, actualizar los datos
                    garfica_nodos_solicitudes.data.labels = datos.data.map(function(item) { return item.nombre; });
                    garfica_nodos_solicitudes.data.datasets[0].data = datos.data.map(function(item) { return item.total_solicitudes; });
                    garfica_nodos_solicitudes.update(); // Actualizar la gráfica
                }
            }   



            // Obtener el contexto del lienzo de la gráfica tipo dona
            var donaCtx = document.getElementById('grafico_solicitudes_modificaciones').getContext('2d');

                // Crear la gráfica tipo dona
                if (!grafico_solicitudes_modificaciones) {
                    grafico_solicitudes_modificaciones = new Chart(donaCtx, {
                    type: 'doughnut', // Tipo de gráfica
                    data: {
                        labels: ['Solicitudes', 'Modificaciones'], // Etiquetas
                        datasets: [{
                            label: 'Total', // Etiqueta del conjunto de datos
                            data: [datos.solicitudes, datos.modificaciones], // Datos
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)', // Color para solicitudes
                                'rgba(54, 162, 235, 0.5)' // Color para modificaciones
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)', // Color del borde para solicitudes
                                'rgba(54, 162, 235, 1)' // Color del borde para modificaciones
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        // Opciones de la gráfica (si es necesario)
                    }
                });
                }else {
                    // Si ya hay una instancia existente, actualiza los datos
                    grafico_solicitudes_modificaciones.data.datasets[0].data = [datos.solicitudes, datos.modificaciones];
                    grafico_solicitudes_modificaciones.update(); // Actualizar la gráfica
                }
            

            // Crear la gráfica de tipo dona para otro conjunto de datos (reemplaza esto con tus datos)
            var otroDonaCtx = document.getElementById('grafico_tipos_solicitudes').getContext('2d');
            if (!grafico_tipos_solicitudes) {
                grafico_tipos_solicitudes = new Chart(otroDonaCtx, {
                type: 'doughnut',
                data: {
                    labels: tiposDeSolicitudes.map(function(tipo) { return tipo.nombre; }),
                    datasets: [{
                        label: 'Cantidad de Solicitudes',
                        data: tiposDeSolicitudes.map(function(tipo) { return tipo.total; }),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)', // Color para Tipo 1
                            'rgba(54, 162, 235, 0.5)', // Color para Tipo 2
                            // Agrega más colores según sea necesario
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)', // Color del borde para Tipo 1
                            'rgba(54, 162, 235, 1)', // Color del borde para Tipo 2
                            // Agrega más colores según sea necesario
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    // Opciones de la gráfica (si es necesario)
                }
            });
        }else {
        // Si ya hay una instancia existente, actualiza los datos
        grafico_tipos_solicitudes.data.labels = tiposDeSolicitudes.map(function(tipo) { return tipo.nombre; });
        grafico_tipos_solicitudes.data.datasets[0].data = tiposDeSolicitudes.map(function(tipo) { return tipo.total; });
        grafico_tipos_solicitudes.update(); // Actualizar la gráfica
    }


    // Función para formatear la fecha en formato "mes año"
    function formatearFecha(anio, mes) {
        const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Dicicembre'];
        return meses[mes - 1] ;
    }

    var grafica_por_mes = document.getElementById('grafica_mes_a_mes').getContext('2d');

    // Crear la gráfica tipo línea
    if (!grafica_mes_a_mes) {
    // Si no existe, crear una nueva gráfica
    grafica_mes_a_mes = new Chart(grafica_por_mes, {
        type: 'bar', // Tipo de gráfica
        data: {
            labels: datos.datos_mes_a_mes.map(function(data) {
                return formatearFecha(data.anio, data.mes); // Crear etiquetas en formato "mes año"
            }),
            datasets: [{
                label: 'Solicitudes', // Etiqueta del conjunto de datos de solicitudes
                data: datos.datos_mes_a_mes.map(function(data) {
                    return data.total_solicitudes; // Obtener el total de solicitudes
                }),
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Color de fondo para las solicitudes
                borderColor: 'rgba(255, 99, 132, 1)', // Color del borde para las solicitudes
                borderWidth: 1
            },
            {
                label: 'Modificaciones', // Etiqueta del conjunto de datos de modificaciones
                data: datos.datos_mes_a_mes.map(function(data) {
                    return data.total_modificaciones; // Obtener el total de modificaciones
                }),
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo para las modificaciones
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde para las modificaciones
                borderWidth: 1
            }]
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

</script>
@endsection
