{{-- <div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold; margin-left: 35px;']) }}
            {{ Form::text('nombre', $role->name, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre','style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px; margin-left: 25px;']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer " style="text-align: right;margin-right:3%;">
        <button type="submit" class="btnGuardar">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm iconDCR" ></i>
        </button>
    </div>
</div> --}}

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombres',null,['style' => 'font-size: 18px; font-weight: bold; margin-left: 35px;']) }}
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','style' => 'width: 95%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #ececec; background-color:  #ececec;height:45px; margin-bottom: 10px; margin-left: 25px;']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-outline"  href="{{ route('roles.create') }}" class="btn btn-outline"
        style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; margin-left: 90%; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; ">{{ __('GUARDAR') }}
        <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i></button>
    </div>
</div>