<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre',null, ['style' => 'font-size: 18px; font-weight: bold']) }}
            {{ Form::text('nombre', $datosUnicosPorSolicitude->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre','style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="id_tipos_de_datos" style="font-size: 18px; font-weight: bold">Tipo de Dato</label>
            <select name="id_tipos_de_datos" id="id_tipos_de_datos" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Tipo de Dato" required style="margin-bottom: 10px;">
                @foreach ($tiposDatos as $dato)
                <!-- We go through the models of the tiposDatos that we previously passed through the controller -->
                    <option value="{{ $dato->id }}">{{ $dato-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_tipos_de_solicitudes" style="font-size: 18px; font-weight: bold">Tipo de Solicitud</label>
            <select name="id_tipos_de_solicitudes" id="id_tipos_de_solicitudes" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar un Tipo de Solicitud" required>
                @foreach ($solicitudes as $solicitud)
                <!-- We go through the models of the solicitudes that we previously passed through the controller -->
                    <option value="{{ $solicitud->id }}">{{ $solicitud-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        @if(Route::currentRouteName() === 'datos-unicos-por-solicitudes.edit')
            <div class="form-group">
                <label for="id_estados" style="font-size: 18px; font-weight: bold">Estado</label>
                <select name="id_estados" id="id_estados" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar un Estado" required style="width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;">
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ ($datosUnicosPorSolicitude->id_estados ?? '') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline"  href="{{ route('roles.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:15px; justify-content: center; justify-items: center; " 
        onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>
</div>

