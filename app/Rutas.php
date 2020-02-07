<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutas extends Model
{
    protected $table='rutas';
    protected $primaryKey='id_ruta';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_ruta',
    	'nombre_es',
    	'nombre_en',
    	'longitud_km',
    	'longitud_milla',
    	'ubicacion'
    ];
}
