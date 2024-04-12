@extends('layouts.app')

@section('template_title')
@endsection


@section('content')
    <link rel="stylesheet" href="{{ asset('css/slayouts.css') }}">


    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="d-flex mt-3 mb-4">
                    <div>
                        <h1 class="primeraPalabraFlex"
                            style="margin-right: 0; font-size: 200%; font-weight: 900; color: rgb(0, 49, 77)">
                            {{ __('MI PERFIL') }}</h1>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('nombres', null, ['style' => 'font-size: 16px;  color:black']) }}
                        <input value="{{ $user->name }}" type="text" name="name"
                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombres"
                            style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec ; margin-bottom: 10px; margin-top:8px">
                        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label style="font-size: 16px;  color:black">Correo</label>
                        <input value="{{ $user->email }}" type="text" name="email" class="form-control"
                            placeholder="Correo"
                            style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px">
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label style="font-size: 16px;  color:black">Apellidos</label>
                        <input value="{{ $user->apellidos }}" type="text" name="apellidos" class="form-control"
                            placeholder="Apellidos"
                            style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px">
                    </div>

                    <div class="form-group">
                        <label style="font-size: 16px;  color:black">Celular</label>
                        <input value="{{ $user->celular }}" type="text" name="celular" class="form-control"
                            placeholder="Celular"
                            style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px">
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">

                            {{ Form::label('nodo', null, ['style' => 'font-size: 16px;  color: ; font-weight: bold']) }}
                            <div style="position: relative;">
                                {{ Form::select('id_nodo', $nodos->pluck('nombre', 'id'), $user->nodo->id, ['class' => 'form-control' . ($errors->has('id_nodo') ? ' is-invalid' : ''), 'style' => 'width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px']) }}
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
                            {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-md-4">
                            <label style="font-size: 16px; color:black; font-weight: bold" for="role">Roles</label>
                            <div style="position: relative; width: 100%;">
                                <select
                                    style="width: 100%; height:45px; border-radius: 50px; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; padding-right: 30px; -webkit-appearance: none; -moz-appearance: none; appearance: none;"
                                    name="role" id="role" class="form-control">
                                    {{-- @foreach ($roles as $id => $role)
                                <option value="{{ $role }}" {{ $user->hasRole($role) ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach --}}
                                </select>
                                <div class="icono" onclick="toggleSelect()">
                                    <div class="circle-play">
                                        <div class="circle"></div>
                                        <div class="triangle"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12"
                            style="align-content: center; margin-block-end: 15px; margin-block-start: 5px">
                            <input type="checkbox" id="chkPassw" style="cursor: pointer;"> ¿Desea actualizar su contraseña
                            actual?</input>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="lblPassw" style="font-size: 16px; display: none; color:black">Contraseña</label>
                                <input type="text" id="txtPassw" class="form-control" placeholder="Contraseña" disabled
                                    style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; display: none">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="lblCPassw" style="font-size: 16px; display: none; color:black">Confirmar
                                    contraseña</label>
                                <input type="text" id="txtCPassw" class="form-control" placeholder="Confirmar contraseña"
                                    disabled
                                    style="width: 100%; height:45px; border-radius: 50px; border-style: solid; border-color: #ececec; background-color:  #ececec; margin-bottom: 10px; margin-top:8px; display: none">
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
    </section>

    <!-- CSS Style -->

    <style>
        .table-bordered> :not(caption)>*>* {
            border-width: 0;
            border-bottom-width: 1px;
            border-color: #dee2e6;
        }

        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>td {
            border-width: 0;
            border-right-width: 1px;
            border-left-width: 1px;
            border-color: #dee2e6;
        }

        .table-bordered>thead>tr>th:first-child,
        .table-bordered>tbody>tr>td:first-child {
            border-left-width: 0;
        }

        .table-bordered>thead>tr>th:last-child,
        .table-bordered>tbody>tr>td:last-child {
            border-right-width: 0;
        }
    </style>

    <script>
        document.getElementById('chkPassw').addEventListener('click', function() {
            var txtPassw = document.getElementById('txtPassw');

            if (this.checked) {
                txtPassw.disabled = false;
                txtPassw.style.display = 'block';
                lblPassw.style.display = 'block';
            } else {
                txtPassw.disabled = true;
                txtPassw.style.display = 'none';
                lblPassw.style.display = 'none';
                txtPassw.value = '';
            }
        });

        document.getElementById('chkPassw').addEventListener('click', function() {
            var txtCPassw = document.getElementById('txtCPassw');

            if (this.checked) {
                txtCPassw.disabled = false;
                txtCPassw.style.display = 'block';
            } else {
                txtCPassw.disabled = true;
                txtCPassw.style.display = 'none';
                txtCPassw.value = '';
            }
        });

        document.getElementById('chkPassw').addEventListener('click', function() {
            var lblPassw = document.getElementById('lblPassw');

            if (this.checked) {
                lblPassw.style.display = 'block';
            } else {
                lblPassw.style.display = 'none';
            }
        });

        document.getElementById('chkPassw').addEventListener('click', function() {
            var lblCPassw = document.getElementById('lblCPassw');

            if (this.checked) {
                lblCPassw.style.display = 'block';
            } else {
                lblCPassw.style.display = 'none';
            }
        });
    </script>
@endsection
