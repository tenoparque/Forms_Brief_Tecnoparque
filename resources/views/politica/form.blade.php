<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('link') }}
            {{ Form::text('link', $politica->link, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link']) }}
            {!! $errors->first('link', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $politica->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('qr', 'Seleccionar imagen') }}
            <input type="file" name="qr" id="qr" class="form-control-file{{ $errors->has('qr') ? ' is-invalid' : '' }}">
            {!! $errors->first('qr', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'politicas.edit')
            <div class="form-group">
                <label for="id_estado">Estado</label>
                <select name="id_estado" id="id_estado" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Estado" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ ($politica->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $politica->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'politicas.edit')
        <div class="form-group">
            <label for="qr">Imagen QR:</label>
            @if($politica->qr)
                <!-- Si hay datos binarios en el campo qr, los convertimos a una representación base64 y los mostramos como una imagen -->
                <img src="data:image/png;base64,{{ base64_encode($politica->qr) }}" alt="QR" width="200">
            @else
                <!-- Si no hay datos binarios en el campo qr, mostramos un mensaje indicando que no hay imagen -->
                <p>No hay imagen QR disponible.</p>
            @endif
        </div>
        @endif

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline"  href="{{ route('politicas.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; ">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>
</div>