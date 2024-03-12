<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold; margin-bottom:10px']) }}
            {{ Form::text('nombre', $departamento->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre','style' => 'width: 85%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline"  href="{{ route('roles.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px;margin-top:15px; justify-content: center; justify-items: center; " 
        onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>

</div>