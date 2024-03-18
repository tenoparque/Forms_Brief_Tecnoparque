<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold;margin-left: 35px;']) }}
            {{ Form::text('nombre', $datosUnicosPorSolicitude->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px;  border-color: #ececec; background-color:  #ececec; margin-left: 25px; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_tipos_de_datos" style="font-size: 18px; font-weight: bold; margin-left: 35px;">Tipo de
                        Dato</label>
                    <div style="position: relative;">

                        <select
                            style="width: 90%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                            name="id_tipos_de_datos" id="id_tipos_de_datos" class="form-control selectpicker"
                            data-style="btn-primary" title="Seleccionar un Tipo de Dato" required">
                            <option value="" disabled selected>Seleccionar Dato...</option>
                            @foreach ($tiposDatos as $dato)
                                <!-- We go through the models of the tiposDatos that we previously passed through the controller -->
                                <option value="{{ $dato->id }}">{{ $dato->nombre }}</option>
                                <!-- We obtain the id and the value -->
                            @endforeach
                        </select>
                        <div class="icono" style="right: 7%">
                            <div class="circle-play">
                                <div class="circle"></div>
                                <div class="triangle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_tipos_de_solicitudes"
                        style="font-size: 18px; font-weight: bold; margin-left: 35px;">Tipo de Solicitud</label>
                    <div style="position: relative;">
                        <select
                            style="width: 90%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                            name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes"
                            class="form-control selectpicker" data-style="btn-primary"
                            title="Seleccionar un Tipo de Solicitud" required style="margin-bottom: 10px;">
                            <option value="" disabled selected>Seleccionar Solicitud...</option>
                            @foreach ($solicitudes as $solicitud)
                                <!-- We go through the models of the solicitudes that we previously passed through the controller -->
                                <option value="{{ $solicitud->id }}">{{ $solicitud->nombre }}</option>
                                <!-- We obtain the id and the value -->
                            @endforeach
                        </select>
                        <div class="icono" style="right: 7%">
                            <div class="circle-play">
                                <div class="circle"></div>
                                <div class="triangle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Route::currentRouteName() === 'datos-unicos-por-solicitudes.edit')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-size: 18px; font-weight: bold; margin-left: 35px;" for="id_estados">Estado</label>
                        <div style="position: relative;">
                            <select
                                style="width: 90%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                name="id_estados" id="id_estados" class="form-control selectpicker"
                                data-style="btn-primary" title="Seleccionar un Estado" required">

                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}"
                                        {{ ($datosUnicosPorSolicitude->id_estados ?? '') == $estado->id ? 'selected' : '' }}>
                                        {{ $estado->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="icono" style="right: 7%">
                                <div class="circle-play">
                                    <div class="circle"></div>
                                    <div class="triangle"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        @endif

    </div>
    <div class="box-footer mt20" style="text-align: right;margin-right:3%;">
        <button type="submit" class="btnGuardar">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm iconDCR" ></i>
        </button>
    </div>
