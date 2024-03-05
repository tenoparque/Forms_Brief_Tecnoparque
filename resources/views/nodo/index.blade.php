@extends('layouts.app')

@section('template_title')
    Nodo
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Nodo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('nodos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    <input class="form-control" id="search" placeholder="Ingrese el nombre del Nodo...">
                                </div>
                            
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombre</th>
										<th>Id Estado</th>
										<th>Id Ciudad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                    @foreach ($nodos as $nodo)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $nodo->nombre }}</td>
											<td>{{ $nodo->estado->nombre }}</td>
											<td>{{ $nodo->ciudade->nombre }}</td>

                                            <td>
                                                    <a class="btn btn-sm btn-primary " href="{{ route('nodos.show',$nodo->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('nodos.edit',$nodo->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $nodos->links() !!}
            </div>
        </div>
    </div>

    <!-- JS Scripts -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // javascript and ajax code
        $('#search').on('keyup',function()
        {
            $value=$(this).val();

            if ($value) {
                $('.alldata').hide();
                $('.dataSearched').show();
            } else {
                $('.alldata').show();
                $('.dataSearched').hide(); 
            }

            $.ajax({
                type: 'get',
                url: "{{ URL::to('searchNodo') }}",
                data:{'search': $value},

                success:function(data)
                {
                    $('#Content').html(data);
                }
            });
        })
    </script>
    
@endsection
