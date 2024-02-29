<div class="box box-info padding-1">
    <div class="box-body">
        
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
            {{ Form::label('fecha_y_hora_de_la_solicitud') }}
            {{ Form::text('fecha_y_hora_de_la_solicitud', $solicitude->fecha_y_hora_de_la_solicitud, ['class' => 'form-control' . ($errors->has('fecha_y_hora_de_la_solicitud') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Y Hora De La Solicitud']) }}
            {!! $errors->first('fecha_y_hora_de_la_solicitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usuario_que_realiza_la_solicitud') }}
            {{ Form::text('id_usuario_que_realiza_la_solicitud', $solicitude->id_usuario_que_realiza_la_solicitud, ['class' => 'form-control' . ($errors->has('id_usuario_que_realiza_la_solicitud') ? ' is-invalid' : ''), 'placeholder' => 'Id Usuario Que Realiza La Solicitud']) }}
            {!! $errors->first('id_usuario_que_realiza_la_solicitud', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="id_eventos_especiales_por_categorias">Tipo de Solicitud</label>
            <select name="id_eventos_especiales_por_categorias" id="id_eventos_especiales_por_categorias" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Evento Especial" required>
                @foreach ($especiales as $evento)
                <!-- We go through the models of the eventos that we previously passed through the controller -->
                    <option value="{{ $evento->id }}">{{ $evento-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_estado_de_la_solicitud">Estado de la Solicitud</label>
            <select name="id_estado_de_la_solicitud" id="id_estado_de_la_solicitud" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Estado de la Solicitud" required>
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