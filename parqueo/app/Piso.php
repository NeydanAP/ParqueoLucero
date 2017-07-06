<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    protected $table = 'pisos';
    protected $fillable = ['numero', 'categoria'];

    public function espacios()
    {
        return $this->hasMany('Park\Espacio');
    }
}
