@extends('admin.template')

@section('content')

    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-car"></i>
                ESPACIOS 
                <a href="{{ route('admin.espacio.create') }}" class="btn btn-warning">
                    <i class="fa fa-plus-circle"></i> Espacio
                </a>
            </h1>
        </div>
        <div class="page">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Medida</th>
                            <th>Estado</th>
                            <th>Nro. Piso</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($espacios as $espacio)
                            <tr>

                                <td>{{ $espacio->numero }}</td>
                                <td>{{ $espacio->medida }}</td>
                                @if ($espacio->estado=='Libre')
                                     <td><span class="label label-success">{{ $espacio->estado }}</td>
                                    @else
                             
                                 <td><span class="label label-danger">{{ $espacio->estado }}</td>
                                 @endif
                                
                                <td>{{ $espacio->piso->numero }}</td>

                               
                                <td>
                                    <a href="{{ route('admin.espacio.edit', $espacio) }}" class="btn btn-success">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </a>
                                </td>
                                <td>
                                    {!! Form::open(['route' => ['admin.espacio.destroy', $espacio]]) !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button onClick="return confirm('Eliminar registro?')" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                                <p>
                    <a href="{{ route('home') }}" class="btn btn-primary">
                        <i class="fa fa-chevron-circle-left"></i>Seguir comprando
                    </a>
                    <a href="{{ route('orden-detalle') }}" class="btn btn-primary">
                    Cotinuar <i class="fa fa-chevron-circle-right"></i>
                    </a>
                 </p>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <hr>
            
            <?php echo $espacios->render(); ?>
            
        </div>
     <hr>
    </div>
    
@stop