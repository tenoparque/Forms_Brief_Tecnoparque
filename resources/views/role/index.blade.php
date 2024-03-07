@extends('layouts.app')

@section('template_title')
    Role
@endsection

@section('content')
    <section class="container shadow p-4 my-5 bg-light rounded">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-header">
                        <div style="d-flex justify-content-between align-items-center">

                            <div style="d-flex justify-content-between align-items-center">

                                <div class="d-flex mt-3 mb-4">
                                    <div>
                                        <h1 class="primeraPalabraFlex"
                                            style="margin-right: 0; font-size: 180%; font-weight: 900; color: rgb(0, 49, 77)">
                                            {{ __('ROLES') }}</h1>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-between align-items-center">
                                <input class="form-control" id="search" placeholder="Ingrese el nombre del usuario..."
                                    style="width: 70%; border-radius: 50px; border-style: solid; border-width:4px; border-color: #DEE2E6">
                                <a href="{{ route('register') }}" class="btn btn-outline"
                                    style="color:#00324D; border:2px solid #82DEF0; height: 40px; width:120px; cursor: pointer;  border-radius: 35px; justify-content: center; justify-items: center; ">{{ __('CREAR') }}
                                    <i class="fa-solid fa-circle-play" style="color: #642c78;"></i></a>
                            </div>
                        </div>
                        <div class="table-responsive"
                            style="background-color: #DEE2E6; border-radius: 18px; border-style: solid; border-width:2px; border-color: #DEE2E6">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr style="border-width: 2px">
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $role->name }}</td>
                                            <!-- <td>{{ $role->guard_name }}</td> -->

                                            <td>
                                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('roles.show', $role->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Detalle') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('roles.edit', $role->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!-- Another tbody is created for the search records -->
                                <tbody id="Content" class="dataSearched">

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                {!! $roles->links() !!}
            </div>
        </div>
    </section>

    <!-- JS Scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // javascript and ajax code
        $('#search').on('keyup', function() {
            $value = $(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.dataSearched').show();
            } else {
                $('.alldata').show();
                $('.dataSearched').hide();
            }

            $.ajax({
                type: 'get',
                url: "{{ URL::to('searchRol') }}",
                data: {
                    'search': $value
                },

                success: function(data) {
                    $('#Content').html(data);
                }
            });
        })
    </script>
@endsection
