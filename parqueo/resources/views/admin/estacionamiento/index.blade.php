@extends('admin.template')

@section('content')

<div class="container text-center">
<div class="page-header">
<h1>
        <i class="fa fa-car"></i>
        ESTADIAS <a href="{{route('admin.estacionamiento.create')}}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Estacionar</a>
</h1>
</div>
<div class="page">
  <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
                <tr>
                        <th>Nro. Cohera</th>
                        <th>Nro. Piso</th>
                        <th>Estado</th>
                        <th>Placa de vehiculo</th>
                        <th>Fecha ingreso</th>
                        <th>Hora ingreso</th>
                       
                </tr>
        </thead>
        <tbody>
       
            @foreach($estacionamientos as $estacionamiento)
                <tr>
                        <td>{{ $estacionamiento->espacio->numero }}</td>
                        <td>{{ $estacionamiento->espacio->piso->numero }}</td>
                         @if ($estacionamiento->espacio->estado=='Libre')
                                     <td><span class="label label-success">{{ $estacionamiento->espacio->estado }}</td>
                                    @else
                             
                                 <td><span class="label label-danger">{{ $estacionamiento->espacio->estado }}</td>
                        @endif

                        @if($estacionamiento->vehiculo_id <>NULL)
                        
                                <td>{{ $estacionamiento->vehiculo->placa }}</td> 
                                <td>{{ $estacionamiento->created_at->format('d-m-Y') }}</td>
                                <td>{{ $estacionamiento->created_at->format('h:i:s A') }}</td>  
                                @else
                                 <td></td>
                                 <td></td>
                                 <td></td>
                        
                        @endif
                       
                        <td>
                            <p>     
                                <a href="{{ route('admin.vehiculo.index') }}" class="btn btn-primary">
                                Meter <i class="fa fa-chevron-circle-right"></i>
                                </a>
                            </p>
                        </td>  
                        <td>
                            <p>     
                                <a href="{{ route('orden-detalle') }}" class="btn btn-primary">
                                Modificar <i class="fa fa-chevron-circle-right"></i>
                                </a>
                            </p>
                        </td>   
                        <td>
                            <p>     
                                <a href="{{ route('orden-detalle') }}" class="btn btn-primary">
                                Salir <i class="fa fa-chevron-circle-right"></i>
                                </a>
                            </p>
                        </td> 
                        <td>
                            <p>     
                                <a href="{{ route('orden-detalle') }}" class="btn btn-primary">
                                Ticket <i class="fa fa-chevron-circle-right"></i>
                                </a>
                            </p>
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