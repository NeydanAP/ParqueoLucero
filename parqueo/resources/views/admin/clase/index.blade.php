@extends('admin.template')

@section('content')

<div class="container text-center">
<div class="page-header">
<h1>
        <i class="fa fa-car"></i>
        CLASE AUTOS <a href="{{route('admin.clase.create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Tipo</a>
</h1>
</div>
<div class="page">
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
                <tr>
                        <th>Descripcion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                </tr>
        </thead>
        <tbody>
            @foreach($clases as $clase)
                <tr>
                        <td>{{ $clase->descripcion }}</td>
                        <td>
                                <a href="{{ route('admin.clase.edit', $clase) }}" class="btn btn-success">
                                        <i class="fa fa-pencil-square"></i>
                                </a>
                        </td>
                        <td>
                                {!! Form::open(['route' => ['admin.clase.destroy', $clase]]) !!}
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