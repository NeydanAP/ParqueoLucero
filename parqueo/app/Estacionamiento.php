<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    protected $table = 'estacionamientos';
    protected $fillable = ['fechaingreso','horaigreso','espacio_id','vehiculo_id'];
     

    public function vehiculo()
    {
         return $this->belongsTo('Park\Vehiculo');
    }
     public function boletas()
    {
         return $this->hasMany('Park\Boleta');
    }
     public function tickets()
    {
         return $this->hasMany('Park\Ticket');
    }
    public function espacio()
    {
        return $this->belongsTo('Park\Espacio');
    }
}
