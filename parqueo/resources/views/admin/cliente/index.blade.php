@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-user-circle"></i>
                CLIENTES 
                <a href="{{ route('admin.cliente.create') }}" class="btn btn-warning">
                    <i class="fa fa-plus-circle"></i> Cliente
                </a>
            </h1>
        </div>
        <div class="page">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>

                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido }}</td>
                                <td>{{ $cliente->telefono }}</td>
                               
                                <td>
                                    <a href="{{ route('admin.cliente.edit', $cliente) }}" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['admin.cliente.destroy', $cliente]]) !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <hr>
            
            <?php echo $clientes->render(); ?>
            
        </div>
     <hr>
    </div>
    
@stop