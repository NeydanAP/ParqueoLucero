@extends('admin.template')

@section('content')
    
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-id-card"></i>
                ESTACIONAMIENTO <small>[Agregar Coche]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.parcial.errors')
                    @endif
                    
                    {!! Form::open(['route'=>'admin.estacionamiento.store']) !!}
        
                        <div class="form-group">
                            <label for="fechaingreso">Fecha</label>
                            
                              {!! 
                                Form::text(
                                    'fechaingreso', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese la fecha...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="horaingreso">Hora</label>
                            
                            {!! 
                                Form::text(
                                    'horaingreso', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese la hora...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="vehiculo_id">Vehiculo</label>
                            {!! Form::select('vehiculo_id', $vehiculos, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="espacio_id">Espacio</label>
                            {!! Form::select('espacio_id', $espacios, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.estacionamiento.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}

                    
                </div>
                
            </div>
        </div>
        

    </div>

@stop