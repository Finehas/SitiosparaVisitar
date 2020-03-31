<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitios extends Model
{
    protected $table='sitios';
    protected $primaryKey='id_sitio';
    public $incrementing=true;
    public $timestamps=false;
    protected $with=['localidad'];
    protected $fillable=[
    	'id_localidad',
        'id_sitio',
        'id_tipo_turismo',
    	'nombre_es',
    	'nombre_en',
        'descripcion_es',
        'descripcion_en',
        'historia_es',
        'historia_en',
        'cantidad_visitantes',
        'valoracion_final',
        'id_valor'
    ];
    public function localidad(){
        return $this->belongsTo(Municipios::class,'id_localidad','id_localidad');
    }
}
