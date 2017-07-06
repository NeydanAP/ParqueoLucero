@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-building-o"></i>
                EMPRESA 
                <a href="{{ route('admin.empresa.create') }}" class="btn btn-warning">
                    <i class="fa fa-plus-circle"></i> Empresa
                </a>
            </h1>
        </div>
        <div class="page">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nit</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($empresas as $empresa)
                            <tr>

                                <td>{{ $empresa->nit }}</td>
                                <td>{{ $empresa->nombre }}</td>
                                <td>{{ $empresa->ciudad }}</td>
                                <td>{{ $empresa->direccion }}</td>
                                <td>{{ $empresa->telefono }}</td>

                               
                                <td>
                                    <a href="{{ route('admin.empresa.edit', $empresa) }}" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['admin.empresa.destroy', $empresa]]) !!}
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
            
             <?php echo $empresas->render(); ?>
            
        </div>
     <hr>
    </div>
    
@stop