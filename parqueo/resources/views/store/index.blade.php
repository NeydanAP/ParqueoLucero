@extends('store.template')

@section('content')


<div class="container text-center">
		<div id="fotos">
		    @foreach ($espacios as $espacio)
		      <div class="fotos white-panel">
		      	  <h3>{{ $espacio->numero }}</h3><hr>
			      
			      	
			      	
			      </div>
		      </div>
			  
		    @endforeach	
		 </div>
    </div> 
 @stop   
