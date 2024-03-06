@extends('layouts.app')

@section('template_title')
@endsection


@section('content')
    <link rel="stylesheet" href="{{ asset('css/slayouts.css') }}">

    <header class="container-fluid-users">
        <div class="row d-flex justify-content-between" style="align-items: center; margin-top:60px; position:initial">
            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                <div class="text-wel">
                    <h5 class="welcoRe">BIENVENIDO</h5>
                    <div class="d-flex">
                        <h2 class="supereh">SUPER - ‎ </h2>
                        <h2 class="adminreh"> ADMIN</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 ">
                <img class="redtecnocol" src="/images/recursos/redtecnocol.png" alt="Red Tecnológica"></img>
            </div>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" style="">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <div class="d-flex">
                                <div>
                                    <h1 class="primeraPalabraFlex" style="margin-right: 0; font-size:180%">
                                        {{ __('USUARIOS ‎') }}</h1>
                                </div>
                                <div>
                                    <h1 class="segundaPalabraFlex" style="margin-left: 0; font-size:180%">
                                        {{ __('REGISTRADOS') }}</h1>
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <div class="card-header">
                                    <tr>
                                        <th>No</th>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Celular</th>
                                        <th>Apellidos</th>
                                        <th>Nodo</th>
                                        <th>Estado</th>
                                        <th>Rol</th>

                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->celular }}</td>
                                                <td>{{ $user->apellidos }}</td>
                                                <td>{{ $user->nodo->nombre }}</td>
                                                <td>{{ $user->estado->nombre }}</td>
                                                <td>
                                                    @foreach ($user->roles as $role)
                                                        {{ $role->name }}
                                                        @if (!$loop->last)
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <td>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('users.show', $user->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('users.edit', $user->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i>
                                                            {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {!! $users->links() !!}
        </div>
    </div>
@endsection
