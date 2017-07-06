<?php

namespace Park;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table = 'tarifas';
    protected $fillable = ['val_hora', 'val_dia','val_mes','clase_id'];

    public function boleta()
    {
        return $this->belongsTo('Park\Boleta');
    }
    public function clase()
    {
        return $this->belongsTo('Park\Clase');
    }
}
