<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $datosUnicosPorSolicitude->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="id_tipos_de_datos">Tipo de Dato</label>
            <select name="id_tipos_de_datos" id="id_tipos_de_datos" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Tipo de Dato" required>
                @foreach ($tiposDatos as $dato)
                <!-- We go through the models of the tiposDatos that we previously passed through the controller -->
                    <option value="{{ $dato->id }}">{{ $dato-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_tipos_de_solicitudes">Tipo de Solicitud</label>
            <select name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Tipo de Solicitud" required>
                @foreach ($solicitudes as $solicitud)
                <!-- We go through the models of the solicitudes that we previously passed through the controller -->
                    <option value="{{ $solicitud->id }}">{{ $solicitud-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_estados">Estado</label>
            <select name="id_estados" id="id_estados" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Estado" required>
                @foreach ($estados as $estado)
                <!-- We go through the models of the estados that we previously passed through the controller -->
                    <option value="{{ $estado->id }}">{{ $estado-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

