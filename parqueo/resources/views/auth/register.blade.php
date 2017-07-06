@extends('store.template')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-success">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@include('store.parcial.errors')

					<form class="form-horizontal" role="form" method="POST" action="{{ route('register-post') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
						     <div class="col-md-4">
							    {!! Form::label('name','Nombre') !!}
							 </div>
						     <div class="col-md-6">
								{!! form::text('name',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required']) !!}
							 </div>
							</div>
						
						<div class="form-group">
							<div class="col-md-4">
							    {!! Form::label('email','Correo Electronico') !!}
							</div>   
							<div class="col-md-6"> 
								{!! form::text('email',null,['class' =>'form-control', 'placeholder' =>'example@gmail.com','required']) !!}
							</div>
						</div>

						<div class="form-group">
						 <div class="col-md-4">
							    {!! Form::label('password','Password') !!}
						 </div> 
							<div class="col-md-6">
								{!! Form::password('password',['class' =>'form-control', 'placeholder' =>'','required'])!!}
							</div>
						</div>

						<div class="form-group">
						 <div class="col-md-4">
							    {!! Form::label('password_confirmation','Confirmar password') !!}
						 </div> 
							<div class="col-md-6">
								{!! Form::password('password_confirmation',['class' =>'form-control', 'placeholder' =>'','required'])!!}
							</div>
						</div>

						<div class="form-group">
						 <div class="col-md-4">
							    {!! Form::label('type','Tipo de usuario') !!}
						 </div> 
							<div class="col-md-6">
								{!! Form:: select('type',[''=>'Seleccione tipo de usuario'  ,'member' => 'Miembro','admin'=>'Administrador'], null, ['class'=>'form-control']) !!}
							</div>
						</div>



						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-success">
									Register
								</button>
							</div>
						</div>
					</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection