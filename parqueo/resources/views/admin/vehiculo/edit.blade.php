@extends('admin.template')

@section('content')
    
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-cart"></i>
                Vehículos <small>[Editar Vehículo]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.parcial.errors')
                    @endif
                    
                     {!! Form::model($vehiculo, array('route' => array('admin.vehiculo.update', $vehiculo))) !!}
                    <input type="hidden" name="_method" value="PUT">
        
                        <div class="form-group">
                            <label class="control-label" for="cliente_id">Cliente</label>
                            {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="clase_id">Clase</label>
                            {!! Form::select('clase_id', $clases, null, ['class' => 'form-control']) !!}
                           
                        </div>
                        <div class="form-group">
                            <label for="placa">Placa</label>
                            
                            {!! 
                                Form::text(
                                    'placa', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el numero de placa...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            
                            {!! 
                                Form::text(
                                    'marca', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese la marca del vehiculo...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            
                            {!! 
                                Form::text(
                                    'color', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el color del vehiculo...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.vehiculo.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        
     <hr>
    </div>

@stop