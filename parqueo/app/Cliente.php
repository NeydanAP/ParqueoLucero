<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre', 'apellido','telefono'];

    public function vehiculos()
    {
        return $this->hasMany('Park\Vehiculo');
    }
}
