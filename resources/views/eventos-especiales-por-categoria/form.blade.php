<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $eventosEspecialesPorCategoria->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="id_estado">Estado</label>
            <select name="id_estado" id="id_estado" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar Estado" required>
                @foreach ($estados as $estado)
                <!-- We go through the models of the estados that we previously passed through the controller -->
                    <option value="{{ $estado->id }}">{{ $estado-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_categoria">categoria</label>
            <select name="id_categoria" id="id_categoria" class="form-control selectpicker"
            data-style="btn-primary" title="Seleccionar Categoria" required>
                @foreach ($categorias as $categoria)
                <!-- We go through the models of the categorias that we previously passed through the controller -->
                    <option value="{{ $categoria->id }}">{{ $categoria-> nombre }}</option> <!-- We obtain the id and the value -->
                @endforeach
            </select>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>