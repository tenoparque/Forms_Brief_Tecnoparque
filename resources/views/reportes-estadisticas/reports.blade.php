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
            <div class="row ">
                <div class="col-md-3">
                    <div class="d-flex align-items-center" style="position: relative; height: 100%;">
                        <select id="slcReport" title="Seleccionar Reporte" required class="form-control"
                            style="border-radius: 50px; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px;margin-top:8px;  padding-left: 5px">
                            <option value="" disabled selected>Seleccione el reporte a generar...</option>
                            <option value="Solicitud">Solicitud</option>
                        </select>
                        <div class="icono" style="right: 2%; margin-bottom: 10px;">
                            <div class="circle-play">
                                <div class="circle"></div>
                                <div class="triangle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex align-items-center" style="position: relative; height: 100%;">
                        <select title="Seleccionar DatoxTipo" required id="selectReport4" class="form-control"
                            style="border-radius: 50px; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px; margin-top:8px; padding-left: 5px">
                            <option value="" disabled selected>Seleccione tipo de dato...</option>
                            <option value="Nodo">Nodo</option>
                            <option value="Estados De Las Solictudes">Estados De Las Solictudes</option>
                            <option value="Categorias">Categorias</option>
                            <option value="Tipos De Solicitud">Tipos De Solicitudes</option>
                            <option value="Todo">Todo</option>
                        </select>
                        <div class="icono" style="right: 2%; margin-bottom: 10px;">
                            <div class="circle-play">
                                <div class="circle"></div>
                                <div class="triangle"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex align-items-center" style="position: relative; height: 100%;">
                        <select id="cuartoCombo" name="cuartoCombo" class="form-control selectpicker"
                            data-style="btn-primary" title="Seleccionar la Ciudad" required
                            style="height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; padding-right: 30px;">
                            <option value="" disabled selected>Seleccionar...</option>
                            {{-- @foreach ($tiposSolicitudes as $ciudad)
                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                            @endforeach --}}
                        </select>
                        <div class="icono" style="right: 2%">
                            <div class="circle-play">
                                <div class="circle"></div>
                                <div class="triangle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="javascript:void(0);" class="btnpdf" style="color: #642c78;" onclick="generarPDF()">
                        <i class="fa-solid fa-file-pdf fa-2xl"></i>
                    </a>
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
        // Esperar a que el DOM esté cargado
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener el select de reporte y el select de tipo de dato
            var slcReport = document.getElementById("selectReport4");
            var slcTipoDato = document.getElementById("cuartoCombo");

            // Agregar un event listener para el cambio en el select de reporte
            slcReport.addEventListener("change", function() {
                // Limpiar el select de tipo de dato
                slcTipoDato.innerHTML =
                    "<option value='' disabled selected>Seleccione el tipo de dato a filtrar...</option>";

                // Obtener el valor seleccionado en el select de reporte
                var selectedReport = slcReport.value;

                // Recuperar las opciones según el reporte seleccionado
                if (selectedReport === "Nodo") {
                    var nodos = {!! json_encode($nodos) !!};
                    nodos.forEach(function(nodo) {
                        var option = document.createElement("option");
                        option.text = nodo.nombre;
                        option.value = nodo.id;
                        slcTipoDato.add(option);
                    });
                } else if (selectedReport === "Estados De Las Solictudes") {
                    var estados = {!! json_encode($estados) !!};
                    estados.forEach(function(estado) {
                        var option = document.createElement("option");
                        option.text = estado.nombre;
                        option.value = estado.id;
                        slcTipoDato.add(option);
                    });
                } else if (selectedReport === "Categorias") {
                    var eventos = {!! json_encode($categoriaSolicitud) !!};
                    eventos.forEach(function(evento) {
                        var option = document.createElement("option");
                        option.text = evento.nombre;
                        option.value = evento.id;
                        slcTipoDato.add(option);
                    });
                } else if (selectedReport === "Tipos De Solicitud") {
                    var eventos = {!! json_encode($tiposSolicitudes) !!};
                    eventos.forEach(function(tiposSolicitudes) {
                        var option = document.createElement("option");
                        option.text = tiposSolicitudes.nombre;
                        option.value = tiposSolicitudes.id;
                        slcTipoDato.add(option);
                    });
                } else if (selectedReport === "Todo") {
                    // var eventos = {!! json_encode($tiposSolicitudes) !!};
                    var option = document.createElement("option");
                    option.text = "Todo";
                    option.value = 1;
                    slcTipoDato.add(option);

                }
            });

            // Obtener referencia al botón de PDF
            var btnGenerarPDF = document.getElementById("btnGenerarPDF");

            // Agregar un event listener al botón de PDF para generar el PDF
            btnGenerarPDF.addEventListener("click", function() {
                // Obtener el valor seleccionado en el select de tipo de dato
                var selectedDataId = slcTipoDato.value;
                // Obtener el nombre seleccionado en el select de reporte
                var selectedReportName = slcReport.options[slcReport.selectedIndex].text;
                console.log("ID del dato seleccionado:", selectedDataId);
                console.log("Nombre del reporte seleccionado:", selectedReportName);
                generarPDF(selectedReportName);
            });

        });

        // Función para generar el PDF
        function generarPDF() {
           // Obtener los elementos de los selectores
        const cuartoCombo = document.getElementById('cuartoCombo').value;
        const slcReport = document.getElementById('slcReport').value;
        const selectReport4 = document.getElementById('selectReport4').value;

        // Validar si todos los campos tienen un valor seleccionado
        if (!cuartoCombo || !slcReport || !selectReport4) {
            alert('Por favor, seleccione todos los campos antes de generar el PDF.');
            return;
        }

        // Generar URL para el PDF con los valores seleccionados
        const selectedReportName = document.getElementById("selectReport4").options[document.getElementById("selectReport4").selectedIndex].text;
        const url = "{{ route('solicitudes.pdf') }}?cuartoComboValue=" + encodeURIComponent(cuartoCombo) +
            "&nombre=" + encodeURIComponent(selectedReportName);

        // Abrir el PDF en una nueva pestaña
        window.open(url, '_blank');
        }
    </script>
@endsection
