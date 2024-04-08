@extends('layouts.app')

@section('template_title')
    Reportes y Estadisticas
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">
                            <div style="d-flex justify-content-between align-items-center">
                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('REPORTES Y') }}</h1>
                                    </div>
                                    <div>
                                        <h1 class="segundaPalabraFlex" style="font-size: 200%">{{ __('ESTADÍSTICAS') }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-between align-items-center">
                        <input class="form-control" id="search"
                            placeholder="Ingrese el nombre del dato único por tipo de solicitud..."
                            style="width: 70%; border-radius: 50px; border-style: solid; border-width:3px; border-color: #DEE2E6 ">
                        <a href="{{ route('solicitudes.pdf') }}" class="btnCrear">{{ __('CREAR') }}
                            <i class="fa-solid fa-circle-play iconDCR"></i></a>
                    </div>
                </div>
            </div>


        </div>
    </section>


    </div>

    </div>
    </div>
    </section>

    <!-- JS Scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // javascript and ajax code
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.dataSearched').show();
            } else {
                $('.alldata').show();
                $('.dataSearched').hide();
            }

            $.ajax({
                type: 'get',
                url: "{{ URL::to('') }}",
                data: {
                    'search': $value
                },

                success: function(data) {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection
