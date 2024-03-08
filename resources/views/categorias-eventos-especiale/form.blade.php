<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $categoriasEventosEspeciale->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(Route::currentRouteName() === 'categorias-eventos-especiales.edit')
        <div class="col-md-4">
                <label for="id_estado">Estado</label>
                <select name="id_estado" id="id_estado" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar Estado" required>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado->id }}" {{ ($categoriasEventosEspeciale->id_estado ?? '') == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre }}
                        </option> 
                    @endforeach
                </select>
            </div>
        @endif


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline" href="{{ route('categorias-eventos-especiales.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center;"
        onmouseover="this.style.backgroundColor='#b2ebf2';"
        onmouseout="this.style.backgroundColor='#FFFF';">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>
</div>