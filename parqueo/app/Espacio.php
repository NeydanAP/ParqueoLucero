<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    protected $table = 'espacios';
    protected $fillable = ['numero', 'medida','estado','piso_id','vehiculo_id'];

    public function estacionamiento()
    {
         return $this->belongsTo('Park\Estacionamiento');
    }
    public function piso()
    {
         return $this->belongsTo('Park\Piso');
    }
}
