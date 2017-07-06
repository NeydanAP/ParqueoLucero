@extends('admin.template')

@section('content')
    
    <div class="container text-center">
        <div class="page-header">
            <h1>
                <i class="fa fa-cart"></i>
                TARIFAS <small>[Editar Tarifa]</small>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="page">
                    
                    @if (count($errors) > 0)
                        @include('admin.parcial.errors')
                    @endif
                    
                     {!! Form::model($tarifa, array('route' => array('admin.tarifa.update', $tarifa))) !!}
                    <input type="hidden" name="_method" value="PUT">
        
                        <div class="form-group">
                            <label class="control-label" for="clase_id">Clase</label>
                            {!! Form::select('clase_id', $clases, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label for="val_hora">Val. por hora[Bs]</label>
                            
                            {!! 
                                Form::text(
                                    'val_hora', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el valor...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="val_dia">Val. por dia[Bs]</label>
                            
                            {!! 
                                Form::text(
                                    'val_dia', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el valor...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>
                        <div class="form-group">
                            <label for="val_mes">Val. por mes[BS]</label>
                            
                            {!! 
                                Form::text(
                                    'val_mes', 
                                    null, 
                                    array(
                                        'class'=>'form-control',
                                        'placeholder' => 'Ingrese el valor...',
                                        'autofocus' => 'autofocus'
                                    )
                                ) 
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', array('class'=>'btn btn-primary')) !!}
                            <a href="{{ route('admin.tarifa.index') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    
                    {!! Form::close() !!}
                    
                </div>
                
            </div>
        </div>
        
     <hr>
    </div>

@stop