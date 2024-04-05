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
    </script>
@endsection
