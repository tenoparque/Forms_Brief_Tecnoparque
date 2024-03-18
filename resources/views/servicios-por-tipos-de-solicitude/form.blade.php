<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold;margin-left: 35px']) }}
            {{ Form::text('nombre', $serviciosPorTiposDeSolicitude->nombre, [
                'class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''),
                'placeholder' => 'Nombre',
                'style' =>
                    'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;margin-left: 25px; margin-bottom: 10px;',
            ]) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if (Route::currentRouteName() === 'servicios-por-tipos-de-solicitudes.create')
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold;margin-left: 35px;"for="id_tipo_de_solicitud">Tipo de
                    Solicitud</label>
                <div style="position: relative;">
                    <select
                        style="width: 95%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                        name="id_tipo_de_solicitud" id="id_tipo_de_solicitud" class="form-control selectpicker"
                        data-style="btn-primary" title="Seleccionar Tipo de Solicitud" required>
                        <option value="" disabled selected>Seleccionar solicitud...</option>
                        @foreach ($solicitudes as $solicitud)
                            <!-- We go through the models of the solicitudes that we previously passed through the controller -->
                            <option value="{{ $solicitud->id }}">{{ $solicitud->nombre }}</option>
                            <!-- We obtain the id and the value -->
                        @endforeach
                    </select>
                    <div class="icono" style="right: 4%">
                        <div class="circle-play">
                            <div class="circle"></div>
                            <div class="triangle"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Route::currentRouteName() === 'servicios-por-tipos-de-solicitudes.edit')
            <div class="form-group row">
                <div class="col-6">
                    <label style="font-size: 18px; font-weight: bold;margin-left: 35px;" for="id_tipo_de_solicitud">Tipo
                        de
                        Solicitud</label>
                    <div style="position: relative;">
                        <select
                            style="width: 90%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                            name="id_tipo_de_solicitud" id="id_tipo_de_solicitud" class="form-control selectpicker"
                            data-style="btn-primary" title="Seleccionar Tipo de Solicitud" required
                            style="margin-bottom: 10px;">
                            @foreach ($solicitudes as $solicitud)
                                <option value="{{ $solicitud->id }}"
                                    {{ ($serviciosPorTiposDeSolicitude->id_tipo_de_solicitud ?? '') == $solicitud->id ? 'selected' : '' }}>
                                    {{ $solicitud->nombre }}
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
        @endif

        @if (Route::currentRouteName() === 'servicios-por-tipos-de-solicitudes.edit')
            <div class="col-6">
                <label style="font-size: 18px; font-weight: bold;margin-left: 35px;" for="id_estado">Estado</label>
                <div style="position: relative;">
                    <select
                        style="width: 90%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; margin-left: 25px;padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                        name="id_estado" id="id_estado" class="form-control selectpicker" data-style="btn-primary"
                        title="Seleccionar el Estado" required>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}"
                                {{ ($serviciosPorTiposDeSolicitude->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
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
        @endif

    </div>
    <div class="box-footer mt20" style="text-align: right; margin-right:3%;">
        <button type="submit" class="btnGuardar">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm iconDCR"></i>
        </button>
    </div>
</div>
