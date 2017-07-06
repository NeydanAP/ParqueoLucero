@extends('admin.template')

@section('content')

<div class="container text-center">
<div class="page-header">
<h1>
        <i class="fa fa-car"></i>
        VEHICULOS <a href="{{route('admin.vehiculo.create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Vehiculo</a>
</h1>
</div>
<div class="page">
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
                <tr>

                        <th>Propietario</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Color</th>
                        <th>Tipo vehículo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Parquear</th>
                </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                        
                        <td>{{ $vehiculo->cliente->nombre }}</td>
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->color }}</td>
                        <td>{{ $vehiculo->clase->descripcion }}</td>
                        <td>
                                <a href="{{ route('admin.vehiculo.edit', $vehiculo) }}" class="btn btn-success">
                                        <i class="fa fa-pencil-square"></i>
                                </a>
                        </td>
                        <td>
                                {!! Form::open(['route' => ['admin.vehiculo.destroy', $vehiculo]]) !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button onClick="return confirm('Esta seguro que desa Eliminar registro?')" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                </button>
                        {!! Form::close() !!}
                        </td>
                        <td>
                          <a href="{{ route('admin.estacionamiento.index') }}" class="btn btn-primary">
                            Meter a la cochera <i class="fa fa-chevron-circle-right"></i>
                          </a>
                        </td>
                </tr>
            @endforeach
        </tbody>
        </table>
   </div>
    <?php echo $vehiculos->render(); ?>
</div>
<hr>

</div>
        
@stop