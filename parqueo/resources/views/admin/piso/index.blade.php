@extends('admin.template')

@section('content')

<div class="container text-center">
<div class="page-header">
<h1>
        <i class="fa fa-car"></i>
        PISOS <a href="{{route('admin.piso.create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Piso</a>
</h1>
</div>
<div class="page">
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
                <tr>
                        <th>Rno. Piso</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                </tr>
        </thead>
        <tbody>
            @foreach($pisos as $piso)
                <tr>
                        <td>{{ $piso->numero }}</td>
                        <td>{{ $piso->categoria }}</td>
                        <td>
                                <a href="{{ route('admin.piso.edit', $piso) }}" class="btn btn-success">
                                        <i class="fa fa-pencil-square"></i>
                                </a>
                        </td>
                        <td>
                                {!! Form::open(['route' => ['admin.piso.destroy', $piso]]) !!}
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