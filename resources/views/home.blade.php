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
                    <!-- Fin del Gráfico con Chart.js -->

                    <!-- Tarjetas con graficos -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card bg-crema">
                                <div class="card-body">
                                    <h5 class="card-title">Proporción Solicitudes </h5>
                                    <canvas id="grafico_solicitudes_modificaciones" style="width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-crema">
                                <div class="card-body">
                                    <h5 class="card-title">Tipos de solicitudes</h5>
                                    <canvas id="grafico_tipos_solicitudes" style="width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-crema">
                                <div class="card-body">
                                    <h5 class="card-title">Solicitudes Finalizadas</h5>
                                    <canvas id="donaChartInCard" style="width: 100%;"></canvas>
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
        var ctx = document.getElementById('garfica_nodos_solicitudes').getContext('2d');
        var garfica_nodos_solicitudes = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! $data->pluck('nombre') !!},
                datasets: [{
                    label: 'Cantidad de Solicitudes por Nodo',
                    data: {!! $data->pluck('total_solicitudes') !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
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
        

        var intervalo = setInterval(hacerSolicitud, 5000);
      
        function hacerSolicitud() {

            clearInterval(intervalo);
            var xhr = new XMLHttpRequest(); // Crear un nuevo objeto XMLHttpRequest
            // Configurar la solicitud
            xhr.open("GET", "{{ 'datosGraficas' }}", true);
            // Manejar la respuesta
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) { // Si la solicitud ha terminado
                    if (xhr.status === 200) { // Si la solicitud ha tenido éxito
                        var respuesta = JSON.parse(xhr.responseText); // Parsear la respuesta JSON
    
                        // Actualizar el valor en el elemento HTML
                       
                        document.getElementById('valor3').textContent = "Total: " + respuesta.total;
                        actualizarGraficos(respuesta, respuesta.tiposDeSolicitudes);


                    } else {
                        console.error('Error en la solicitud: ' + xhr
                            .status); // Imprimir el estado del error en la consola
                    }
                    intervalo = setInterval(hacerSolicitud, 5000);
                }
            };
            // Enviar la solicitud con un cuerpo vacío
            xhr.send();
        }


        hacerSolicitud();

        var grafico_solicitudes_modificaciones = null;
        var grafico_tipos_solicitudes = null;
        var grafica_mes_a_mes = null;
        // Función para actualizar la gráfica tipo dona con los nuevos datos
        function actualizarGraficos(datos, tiposDeSolicitudes) {
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
        grafica_mes_a_mes = new Chart(grafica_por_mes, {
            type: 'bar', // Tipo de gráfica
            data: {
                labels: datos.datos_mes_a_mes.map(function(data) {
                    return formatearFecha(data.anio, data.mes); // Crear etiquetas en formato "mes año"
                }),
                datasets: [{
                    label: 'Solicitudes Mes a Mes', // Etiqueta del conjunto de datos
                    data: datos.datos_mes_a_mes.map(function(data) {
                        return data.total_solicitudes; // Obtener el total de solicitudes
                    }),
                    backgroundColor: 'rgba(255, 206, 86, 0.2)', // Color de fondo
                    borderColor: 'rgba(255, 206, 86, 1)', // Color del borde
                    borderWidth: 1
                }]
            },
            options: {
                // Opciones de la gráfica (si es necesario)
            }
        });
    } else {
        // Si ya hay una instancia existente, actualiza los datos
        grafica_mes_a_mes.data.labels = datos.datos_mes_a_mes.map(function(data) {
            return formatearFecha(data.anio, data.mes);
        });
        grafica_mes_a_mes.data.datasets[0].data = datos.datos_mes_a_mes.map(function(data) {
            return data.total_solicitudes;
        });
        grafica_mes_a_mes.update(); // Actualizar la gráfica
    }

    }
        
    window.addEventListener('resize', function() {
        // Verifica si la gráfica está definida
        if (garfica_nodos_solicitudes) {
            garfica_nodos_solicitudes.resize();
        }
        if (grafica_mes_a_mes) {
            grafica_mes_a_mes.resize();
        }
    });

</script>
@endsection
