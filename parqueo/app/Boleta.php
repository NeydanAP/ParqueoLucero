<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    protected $table = 'boletas';
    protected $fillable = ['ingreso', 'salida','total_horas','total_dias','valor','total_pagar','estacionamiento_id','empresa_id','tarifa_id'];

    public function tarifa()
    {
         return $this->belongsTo('Park\Tarifa');
    }
    public function estacionamiento()
    {
         return $this->belongsTo('Park\Estacinamiento');
    }
    public function empresa()
    {
         return $this->belongsTo('Park\Empresa');
    }
}
