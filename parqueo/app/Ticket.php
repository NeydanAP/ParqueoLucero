<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    protected $fillable = ['nrocochera','nropiso','ingreso','estacionamiento_id','empresa_id'];
     

    public function estacionamiento()
    {
         return $this->belongsTo('Park\Estacionamiento');
    }
    public function empresa()
    {
         return $this->belongsTo('Park\Empresa');
    }
}
