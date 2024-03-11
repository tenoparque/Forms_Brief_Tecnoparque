
<section class="">

    
    <div class="row p-3">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('nombre', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','style' => 'width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('correo', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','style' => 'width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('celular', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('celular', $user->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular','style' => 'width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
                {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('apellidos', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos','style' => 'width: 100%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6; margin-bottom: 10px;']) }}
                {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                {{ Form::label('nodo', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::select('id_nodo', $nodos->pluck('nombre', 'id'), $user->nodo->id, ['class' => 'form-control' . ($errors->has('id_nodo') ? ' is-invalid' : ''),'style' => 'margin-bottom: 10px']) }}
                {!! $errors->first('id_nodo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            
            <div class="form-group">
                {{ Form::label('estado', null, ['style' => 'font-size: 18px; font-weight: bold']) }}
                {{ Form::select('id_estado', $estados->pluck('nombre', 'id'), $user->estado->id, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : '') ]) }}
                {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                <label style="font-size: 18px; font-weight: bold" for="role">Roles:</label>
                <select name="role" id="role" class="form-control">
                    @foreach($roles as $id => $role)
                        <option value="{{ $role }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                            {{ $role }}
                        </option>
                    @endforeach
                </select>
            </div>
              
        </div>
    </div>
    <div class="box-footer mt20" style="text-align: right;">
        <button type="submit" class="btn btn-outline"
            style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer; border-radius: 35px; margin-top:10px; justify-content: center; justify-items: center; margin-left: 0;"
            onmouseover="this.style.backgroundColor='#b2ebf2';" onmouseout="this.style.backgroundColor='#FFFF';">
            {{ __('GUARDAR') }}
            <i class="fa-solid fa-circle-plus fa-sm" style="color: #642c78;"></i>
        </button>
    </div>
</section>