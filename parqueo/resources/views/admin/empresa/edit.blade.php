@extends('admin.template')

@section('content')
    
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-building-o"></i>
                EMPRESAS <small>[Editar Empresa]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.parcial.errors')
                    @endif
               
                    {!! Form::model($empresa, array('route' => array('admin.empresa.update', $empresa))) !!}
                    <input type="hidden" name="_method" value="PUT">
        
                        <div class="form-group">
                            <label for="nit">Nit</label>
                            
                              {!! 
                                Form::text(
                                    'nit', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingresa el numero de nit...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            
                            {!! 
                                Form::text(
                                    'nombre', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el nombre...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            
                            {!! 
                                Form::text(
                                    'ciudad', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el nombre de ciudad...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            
                            {!! 
                                Form::text(
                                    'direccion', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese direccion...',
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
                                        'placeholder' => 'Ingrese el numero telefonico...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
  

                        <div class="form-group">
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.empresa.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}

                    
                </div>
                
            </div>
        </div>
          <hr>
    </div>

@stop