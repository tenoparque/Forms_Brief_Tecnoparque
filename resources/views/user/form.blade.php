<section class="">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <div class="row p-3">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('nombres', null, ['style' => 'font-size: 16px;  color:black']) }}
                {{ Form::text('name', $user->name, [
                    'class' => 'form-control ' . ($errors->has('name') ? ' is-invalid' : ''),
                    'placeholder' => 'Nombres',
                    'style' =>
                        'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec ; margin-bottom: 10px; margin-top:8px',
                ]) }}
                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('correo', null, ['style' => 'font-size: 16px;  color:black']) }}
                {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo', 'style' => 'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px']) }}
                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-md-6">

            <div class="form-group">
                {{ Form::label('apellidos', null, ['style' => 'font-size: 16px;  color:black']) }}
                {{ Form::text('apellidos', $user->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos', 'style' => 'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px']) }}
                {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
            </div>

            <div class="form-group">
                {{ Form::label('celular', null, ['style' => 'font-size: 16px;  color:black']) }}
                {{ Form::text('celular', $user->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular', 'style' => 'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px']) }}
                {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
            </div>

        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">

                    <div style="position: relative;">
                        {{ Form::label('nodo', null, ['style' => 'font-size: 16px;  color: ; font-weight: bold']) }}
                        <div style="position: relative;">
                            {{ Form::select(
                                'id_nodo',
                                $nodos->pluck('nombre', 'id'),
                                $user->nodo ? $user->nodo->id : 'Sin nodo', // O cualquier otro valor o mensaje
                                [
                                    'class' => 'form-control' . ($errors->has('id_nodo') ? ' is-invalid' : ''),
                                    'disabled' => 'true',
                                    'style' =>
                                        'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color: #ececec; margin-bottom: 10px; margin-top:8px; cursor: default',
                                ],
                            ) }}
                            <div class="icono" onclick="toggleSelect()">
                                <div class="circle-play">
                                    <div class="circle"></div>
                                    <div class="triangle"></div>
                                </div>
                            </div>
                        </div>
                        {!! $errors->first('id_nodo', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('estado', null, ['style' => 'font-size: 16px;  color:black']) }}
                            <div style="position: relative;">
                                {{ Form::select('id_estado', $estados->pluck('nombre', 'id')->toArray(), $user->estado->id, ['class' => 'form-control' . ($errors->has('id_estado') ? ' is-invalid' : ''), 'style' => 'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px']) }}
                                <div class="icono" onclick="toggleSelect()">
                                    <div class="circle-play">
                                        <div class="circle"></div>
                                        <div class="triangle"></div>
                                    </div>
                                </div>
                            </div>
                            {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-size: 16px;  color:black" for="role">Roles</label>
                            <div style="position: relative; width: 100%;">
                                <select
                                    style="width: 100%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                    name="role" id="role" class="form-control">
                                    @foreach ($roles as $id => $role)
                                        <option value="{{ $role }}"
                                            {{ $user->hasRole($role) ? 'selected' : '' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="icono" onclick="toggleSelect()">
                                    <div class="circle-play">
                                        <div class="circle"></div>
                                        <div class="triangle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12" style="text-align: right;">
            <button type="submit" class="btnGuardar">
                {{ __('GUARDAR') }}
                <i class="fa-solid fa-circle-plus fa-sm iconDCR"></i>
            </button>
        </div>
    </div>
</section>


<script>
    document.getElementById('chkPassw').addEventListener('click', function() {
        var txtPassw = document.getElementById('txtPassw');
        if (this.checked) {
            // txtPassw.disabled = false;
            txtPassw.style.display = 'block'
        } else {
            //txtPassw.disabled = true;
            txtPassw.style.display = 'none'
            txtPassw.value = '';
        }
    });

    document.getElementById('chkPassw').addEventListener('click', function() {
        var txtCPassw = document.getElementById('txtCPassw');
        if (this.checked) {
            txtCPassw.disabled = false;
        } else {
            txtCPassw.disabled = true;
            txtCPassw.value = '';
        }
    });
</script>
