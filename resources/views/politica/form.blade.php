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
            {{ Form::label('qr') }}
            {{ Form::text('qr', $politica->qr, ['class' => 'form-control' . ($errors->has('qr') ? ' is-invalid' : ''), 'placeholder' => 'Qr']) }}
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

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>