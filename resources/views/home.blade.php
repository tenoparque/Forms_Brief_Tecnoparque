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
                            <canvas id="myChart" width="400" height="100"></canvas>
                        </div>
                    </div>
                        
                    <!-- Fin del Gráfico con Chart.js -->
                    <!-- Tarjetas de estadísticas -->
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card bg-crema">
                                <div class="card-body">
                                    <h5 class="card-title">Proporción Solicitudes </h5>
                                    <canvas id="donaChart" style="width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-crema">
                                <div class="card-body">
                                    <h5 class="card-title">Tipos de solicitudes</h5>
                                    <canvas id="barChart" style="width: 100%;"></canvas>
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
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
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
            xhr.open("GET", "{{ 'prueba' }}", true);
            // Manejar la respuesta
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) { // Si la solicitud ha terminado
                    if (xhr.status === 200) { // Si la solicitud ha tenido éxito
                        var respuesta = JSON.parse(xhr.responseText); // Parsear la respuesta JSON
    
                        // Actualizar el valor en el elemento HTML
                       
                        document.getElementById('valor3').textContent = "Total: " + respuesta.total;
                        actualizarDonaChart(respuesta, respuesta.tiposDeSolicitudes);


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


        var donaChart = null;
        var barChart = null;
        // Función para actualizar la gráfica tipo dona con los nuevos datos
        function actualizarDonaChart(datos, tiposDeSolicitudes) {
            // Obtener el contexto del lienzo de la gráfica tipo dona
            var donaCtx = document.getElementById('donaChart').getContext('2d');

            // Crear la gráfica tipo dona
            if (!donaChart) {
            donaChart = new Chart(donaCtx, {
                type: 'doughnut', // Tipo de gráfica
                data: {
                    labels: ['Solicitudes', 'Modificaciones'], // Etiquetas
                    datasets: [{
                        label: 'Solicitudes vs. Modificaciones', // Etiqueta del conjunto de datos
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
            donaChart.data.datasets[0].data = [datos.solicitudes, datos.modificaciones];
            donaChart.update(); // Actualizar la gráfica
        }

            // Crear la gráfica de tipo dona para otro conjunto de datos (reemplaza esto con tus datos)
            var otroDonaCtx = document.getElementById('barChart').getContext('2d');
            if (!barChart) {
                barChart = new Chart(otroDonaCtx, {
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
        barChart.data.labels = tiposDeSolicitudes.map(function(tipo) { return tipo.nombre; });
        barChart.data.datasets[0].data = tiposDeSolicitudes.map(function(tipo) { return tipo.total; });
        barChart.update(); // Actualizar la gráfica
    }

    }
        // Llamar a la función hacerSolicitud cada cierto tiempo (por ejemplo, cada 5 segundos)
        // intervalo = setInterval(hacerSolicitud, 5000); // 5000 milisegundos = 5 segundos


        
</script>
@endsection
