<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold ; margin-left: 35px;']) }}
            {{ Form::text('nombre', $departamento->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre','style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px; margin-left: 25px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20" style="text-align: right;">
        <button type="submit" class="btn btn-outline"
            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; border-radius: 35px; margin-top:15px; justify-content: center; justify-items: center; margin-right: 40px;" 
            onmouseover="this.style.backgroundColor='#b2ebf2';"
            onmouseout="this.style.backgroundColor='#FFFF';">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i>
        </button>
    </div>

</div>