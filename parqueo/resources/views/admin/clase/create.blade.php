@extends('admin.template')

@section('content')
	
	<div class="container text-center">
		<div class="page-header">
			<h1>
				<i class="fa fa-cart"></i>
				CLASES <small>[Agregar Clase]</small>
			</h1>
		</div>

		<div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.parcial.errors')
                    @endif
                    
                    {!! Form::open(['route'=>'admin.clase.store']) !!}
        
                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            
                            {!! 
                                Form::text(
                                    'descripcion', 
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
                            {!! Form::submit('Guardar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.clase.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        

	</div>

@stop