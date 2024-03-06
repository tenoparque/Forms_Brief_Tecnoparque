
        
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
                    <option value="{{ $estado->id }}" {{ ($tiposDeDato->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                        {{ $estado->nombre }}
                    </option> 
                @endforeach
            </select>
        </div>
        @endif

    
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
