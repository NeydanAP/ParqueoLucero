@extends('admin.template')

@section('content')
    
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-cart"></i>
                CLIENTES <small>[Editar Cliente]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.parcial.errors')
                    @endif
                    
                    {!! Form::model($cliente, array('route' => array('admin.cliente.update', $cliente))) !!}
                    <input type="hidden" name="_method" value="PUT">
        
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            
                              {!! 
                                Form::text(
                                    'nombre', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el nombre...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            
                            {!! 
                                Form::text(
                                    'apellido', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese la descripcion...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            
                            {!! 
                                Form::text(
                                    'telefono', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese la descripcion...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.cliente.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        

    </div>

@stop