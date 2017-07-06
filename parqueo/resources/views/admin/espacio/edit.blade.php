@extends('admin.template')

@section('content')
    
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-id-card"></i>
                ESPACIOS <small>[Agregar Espacio]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.parcial.errors')
                    @endif
                    
                     {!! Form::model($espacio, array('route' => array('admin.espacio.update', $espacio))) !!}
                    <input type="hidden" name="_method" value="PUT">
        
                        <div class="form-group">
                            <label for="numero">Numero</label>
                            
                              {!! 
                                Form::text(
                                    'numero', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el numero de espacio...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="medida">Medida</label>
                            
                            {!! 
                                Form::text(
                                    'medida', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese la madida...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            
                            {!! 
                                Form::text(
                                    'estado', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Especifique el estado...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="piso_id">Piso</label>
                            {!! Form::select('piso_id', $pisos, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.espacio.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}

                    
                </div>
                
            </div>
        </div>
        

    </div>

@stop