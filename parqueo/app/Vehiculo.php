<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $fillable = ['placa', 'marca','color','cliente_id','clase_id'];

    public function clase()
    {
        return $this->belongsTo('Park\Clase');
    }
    public function cliente()
    {
        return $this->belongsTo('Park\Cliente');
    }
     public function estacionamiento()
    {
         return $this->belongsTo('Park\Estacionamiento');
    }
}
