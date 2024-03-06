@extends('layouts.app')

@section('template_title')
    User
@endsection

@section('content')
<div class="container-fluid" style="background-image: url('{{ asset('images/fondoBrief4.jpg') }}'); background-position: center; height: 100vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-container mt-3"> <!-- Contenedor para aplicar el margen superior -->
                    <div class="card-index">
                    
                            <div style="display: flex; justify-content: space-between; align-items: center;">

                                <div class="d-flex">
                                    <div class="">
                                        <h1 class="UsuariosFlex">{{ __('USUARIOS ') }}</h1>
                                    </div>
                                    <div class="">
                                        <h1 class="RegisterFlex">{{ __('REGISTRADOS ') }}</h1>
                                    </div>
                        
                                </div>
                                <div class="float-right">
                                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <thead class="thead">
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
                                                    @foreach($user->roles as $role)
                                                        {{ $role->name }}
                                                        @if (!$loop->last)
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <td>
                                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('users.show',$user->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                       
                    </div>
                </div>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection