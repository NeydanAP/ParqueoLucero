@extends('store.template')
@section('content')
<div class="container text-center">
   <div class="page-header">
     <h1><i class="fa fa-shopping-cart"></i>Foto Detalle</small></h1>
   </div>
   <div class="row">
       <div class="col-md-6">
           <div class="bloque-foto">
        <img src="{{ $foto->imagen }}">
    </div>
       </div>
       <div class="col-md-6">
           <div class="bloque-foto">
        <h3>{{ $foto->nombre }}</h3><hr>
        <div class="foto-info panel">
            <p>{{ $foto->descripcion }}</p>
            <h3>
                <span class="label label-success"> Precio: ${{ number_format($foto->precio,2) }}</span>
            </h3>
            <p>
                <a class="btn btn-warning btn-block" href="{{ route('cart-add',$foto->slug) }}">
                La quiero <i class="fa fa-cart-plus fa-2x"></i>
                </a>
            </p>
        </div>
     </div>
    </div>
   </div><hr>

     <p>
         <a class="btn btn-primary" href="{{ route('home') }}">
         <i class="fa fa-chevron-circle-left"></i> Regresar</a>
     </p>
</div>  
@stop