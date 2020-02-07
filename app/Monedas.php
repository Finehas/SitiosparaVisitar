<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monedas extends Model
{
    protected $table='monedas';
    protected $primaryKey='id_moneda';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_moneda',
    	'nombre_moneda_es',
        'nombre_moneda_en',
        'cambio_dolar',
        'cambio_euro'
    ];
}
