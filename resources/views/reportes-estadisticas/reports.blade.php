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
                    <div class="col-md-4">
                        <select id="slcReport" title="Seleccionar Reporte" required
                            style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px; padding-left: 5px">
                            <option value="" disabled selected>Seleccione el tipo de reporte a generar...</option>
                            <option value="Solicitud">Solicitud</option>
                            <option value="Nodo">Nodo</option>
                            <option value="Historial de Modificaciones">Historial de Modificaciones</option>
                            <option value="Diseñador">Diseñador</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="slcTipoDato" title="Seleccionar TipoDato" required
                            style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px; padding-left: 5px">
                            <option value="" disabled selected>Seleccione el tipo de dato a filtrar...</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select title="Seleccionar DatoxTipo" required
                            style="width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px;  margin-bottom: 10px; padding-left: 5px">
                            <option value="" disabled selected>Seleccione el dato x tipo de dato...</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="cuartoCombo" name="cuartoCombo" class="form-control selectpicker" data-style="btn-primary" title="Seleccionar la Ciudad" required style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;">
                            <option value="" disabled selected>Seleccionar Ciudad...</option>
                            @foreach ($tiposSolicitudes as $ciudad)
                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-md-1">
                        <a href="#" class="btnpdf" target="_blank" onclick="generarPDF()"><i class="fa-solid fa-file-pdf fa-2xl" style="color: #642c78; margin-left: -60px;"></i></a>>
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
    function generarPDF() {
        var cuartoComboValue = document.getElementById('cuartoCombo').value;
        var url = "{{ route('solicitudes.pdf') }}?cuartoComboValue=" + encodeURIComponent(cuartoComboValue);
        window.open(url, '_blank');
    }
        document.getElementById('slcReport').addEventListener('change', function() {
            var slcReport = this.value;
            var slcTipoDato = document.getElementById('slcTipoDato');

            // Limpia las opciones existentes
            slcTipoDato.innerHTML = "";

            var opcionPorDefecto = document.createElement('option');
            opcionPorDefecto.text = 'Seleccione el tipo de dato a filtrar...';
            opcionPorDefecto.value = '';
            opcionPorDefecto.disabled = true;
            opcionPorDefecto.selected = true;
            slcTipoDato.add(opcionPorDefecto);

            if (slcReport == 'Solicitud') {
                // Definimos las opciones que queremos agregar
                var opciones = ['Tipo de Solicitud', 'Nodo', 'Evento', 'Estado'];

                // Agrega las opciones al segundo select
                for (var i = 0; i < opciones.length; i++) {
                    var opcion = document.createElement('option');
                    opcion.text = opciones[i];
                    opcion.value = opciones[i];
                    slcTipoDato.add(opcion);
                }
            }
        });
    </script>
@endsection
