@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Solicitude
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="col-sm-12">
                <div class="">
                    <div class="card-header">
                        <div class="float-left">
                            <div class="d-flex mt-3 mb-4">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="font-size: 200%">{{ __('AGREGAR CAMBIOS A') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="font-size: 200%">
                                        {{ __('LA SOLICITUD') }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="float-right" id="btnGroupAgregar">
                            <button class="btn btn-primary" id="btnAgregarModificacion">
                                {{ __('Agregar Modificación') }}
                            </button>
                        </div>
                        <div class="float-right" id="btnGroupCancelarEnviar" style="display: none;">
                            <button class="btn btn-secondary mr-2" id="btnCancelar">
                                {{ __('Cancelar') }}
                            </button>
                            <button type="submit" class="btn btn-success" id="btnEnviarModificacion">
                                {{ __('Enviar Modificación') }}
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div id="campoTexto" style="display: none;">
                            <div class="form-group">
                                <label for="modificacion">Modificación:</label>
                                <textarea class="form-control" id="modificacion" name="modificacion" rows="3"></textarea>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                        <th style="text-align: center">---</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    <tr>
                                        <td>{{ $solicitude->tiposdesolicitude->nombre }}</td>
                                        <td>{{ $solicitude->fecha_y_hora_de_la_solicitud }}</td>
                                        <td>{{ $solicitude->user->name }}</td>
                                        <td>{{ $solicitude->user->nodo->nombre }}</td>
                                        <td>{{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                                        <td>{{ $solicitude->estadosDeLasSolictude->nombre }}</td>
                                        <td>{{ $solicitude->user->nodo->nombre }}</td>
                                        <td>{{ $solicitude->eventosespecialesporcategoria->nombre }}</td>
                                        <td>{{ $solicitude->estadosDeLasSolictude->nombre }}</td>
                                    </tr>
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>

                        

                        <div class="form-group">
                            <strong>Servicios asociados:</strong>
                            <ul>
                                @foreach ($elementos as $elemento)
                                    <li>{{ $elemento->nombre }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <h5>Datos por solicitud:</h5>
                            @foreach ($datosPorSolicitud as $dato)
                                <div class="form-group">
                                    <label><strong>{{ $dato->titulo }}:</strong></label>
                                    <input type="text" class="form-control" value="{{ $dato->dato }}" readonly style="cursor: initial; outline: none;">
                                </div>
                            @endforeach

                    </div>
                </div>
                <div>
                    <a href="{{ route('solicitudes.index') }}" class="btn btn-outline"
                        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:130px; cursor: pointer; border-radius: 35px; margin-top:18px; justify-content: center; justify-items: center; margin-left: 90%;"
                        onmouseover="this.style.backgroundColor='#b2ebf2';"
                        onmouseout="this.style.backgroundColor='#FFFF';">
                        {{ __('REGRESAR') }}
                        <i class="fa-solid fa-circle-play fa-flip-both" style="color: #642c78;"></i>
                    </a>
                </div>
            </div>
        </div>

    </section>

    <form id="formEnviarModificacion" method="POST" action="{{ route('solicitudes.update', $solicitude->id) }}" style="display: none;">
        @csrf
        @method('PUT')
        <input type="hidden" name="modificacion" id="modificacionInput">
    </form>

    <script>
        document.getElementById('btnAgregarModificacion').addEventListener('click', function() {
            document.getElementById('campoTexto').style.display = 'block';
            document.getElementById('btnGroupAgregar').style.display = 'none';
            document.getElementById('btnGroupCancelarEnviar').style.display = 'block';
        });

        document.getElementById('btnCancelar').addEventListener('click', function() {
            document.getElementById('campoTexto').style.display = 'none';
            document.getElementById('btnGroupAgregar').style.display = 'block';
            document.getElementById('btnGroupCancelarEnviar').style.display = 'none';
        });

        document.getElementById('btnEnviarModificacion').addEventListener('click', function() {
            var modificacion = document.getElementById('modificacion').value;
            document.getElementById('modificacionInput').value = modificacion;
            document.getElementById('formEnviarModificacion').submit();
        });
    </script>
@endsection
