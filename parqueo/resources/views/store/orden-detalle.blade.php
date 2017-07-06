@extends('store.template')

@section('content')

     <div class="cotainer text-center">
     	<div class="page-header">
     		<h1><i class="fa fa-shopping-cart"> Detalle del pedido</i></h1>
     	</div>
     	<div class="page">
     		<div class="table-responsive">
     			<h3>Datos del usuario</h3>
     			<table class="table table-striped table-hover table-borderd">
     				<tr><td>Nombre:</td><td>{{ Auth::user()->name}}</td></tr>
     				<tr><td>Usuario:</td><td>{{ Auth::user()->type}}</td></tr>
     				<tr><td>Correo:</td><td>{{ Auth::user()->email}}</td></tr>
     			</table>
     		</div>
     		<div class="table-responsive">
     			<h3>Datos del pedido</h3>
     			<table class="table table-striped table-hover table-borderd">
     				<tr>
     					<td>Foto</td>
     					<td>Precio</td>
     					<td>Cantidad</td>
     					<td>Subtotal</td>
     				</tr>
     				@foreach ($cart as $item)
     					<tr>
     						<td>{{ $item->nombre }}</td>
     						<td>{{ number_format($item->precio,2) }}</td>
     						<td>{{ $item->cantidad }}</td>
     						<td>{{ number_format($item->precio*$item->cantidad,2) }}</td>
     					</tr>
     				@endforeach
     			</table><hr>
     			<h3>
     		        <span class="label label-success">
     		        	Total: ${{ number_format($total,2) }}
     		        </span>
     			</h3><hr>
     			 <p>
     			 	<a href="{{ route('cart-show') }}" class="btn btn-primary">
     			 		<i class="fa fa-chevron-circle-left"></i> Regresar
     			 	</a>
     			 	<a href="{{ route('payment') }}" class="btn btn-warning">
     			 		Pagar con <i class="fa fa-cc-paypal fa-2x"></i>
     			 	</a>
     			 </p>
     		</div>
     	</div>
     </div>
@stop   
