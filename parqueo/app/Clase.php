<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'Clases';
    protected $fillable = ['descripcion'];

    public function vehiculos()
    {
        return $this->hasMany('Park\Vehiculo');
    }
     public function tarifas()
    {
        return $this->hasMany('Park\Tarifa');
    }
}
