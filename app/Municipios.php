<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table='localidades';
    protected $primaryKey='id_localidad';
    public $incrementing=true;
    public $timestamps=false;
    protected $with=['estado'];
    protected $fillable=[
    	'id_localidad',
    	'nombre_es',
    	'nombre_en',
    	'ubicacion',
        'poblacion',
        'dato1_es',
        'dato1_en',
        'dato2_es',
        'dato2_en',
        'dato3_es',
        'dato3_en',
        'id_provincia',
        'cantidad_visitantes',
    ];
    public function estado(){
        return $this->belongsTo(Regiones::class,'id_provincia','id_provincia');
    }
}
