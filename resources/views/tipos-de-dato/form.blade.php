
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $tiposDeDato->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'tipos-de-datos.edit')
        <div class="col-md-4">
            <label for="id_estado">Estado</label>
            <select name="id_estado" id="id_estado" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar Estado" required>
                @foreach ($estados as $estado)
                <!-- We go through the models of the Estados that we previously passed through the controller -->
                    <option value="{{ $estado->id }}">{{ $estado-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        @endif

    
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
