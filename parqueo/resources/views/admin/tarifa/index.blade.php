@extends('admin.template')

@section('content')

<div class="container text-center">
<div class="page-header">
<h1>
        <i class="fa fa-car"></i>
        TARIFAS <a href="{{route('admin.tarifa.create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tarifa</a>
</h1>
</div>
<div class="page">
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
                <tr>
                        <th>Clase Vehiculo</th>
                        <th>Val. por hora</th>
                        <th>Val. por dia</th>
                        <th>Val. por mes</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                </tr>
        </thead>
        <tbody>
            @foreach($tarifas as $tarifa)
                <tr>
                        <td>{{ $tarifa->clase->descripcion }}</td>
                        <td>{{ $tarifa->val_hora }}</td>
                        <td>{{ $tarifa->val_dia }}</td>
                        <td>{{ $tarifa->val_mes }}</td>
                        <td>
                                <a href="{{ route('admin.tarifa.edit', $tarifa) }}" class="btn btn-success">
                                        <i class="fa fa-pencil-square"></i>
                                </a>
                        </td>
                        <td>
                                {!! Form::open(['route' => ['admin.tarifa.destroy', $tarifa]]) !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <button onClick="return confirm('Esta seguro que desa Eliminar registro?')" class="btn btn-danger">
                                        <i class="fa fa-trash-o"></i>
                                </button>
                        {!! Form::close() !!}
                        </td>
                </tr>
            @endforeach
        </tbody>
        </table>
   </div>
   
</div>
<hr>

</div>
        
@stop