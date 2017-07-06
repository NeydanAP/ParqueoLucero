<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['nit', 'nombre','ciudad','direccion','telefono','nrocohera'];

    public function boletas()
    {
        return $this->hasMany('Park\Boleta');
    }
     public function tickets()
    {
        return $this->hasMany('Park\Ticket');
    }
}

