<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    protected $table='estados_provincias';
    protected $primaryKey='id_provincia';
    public $incrementing=true;
    public $timestamps=false;
    protected $with=['pais'];
    protected $fillable=[
    	'id_provincia',
    	'nombre_es',
        'nombre_en',
        'nombre_largo_es',
        'nombre_largo_en',
        'ubicacion',
        'capital_es',
        'capital_en',
    	'id_pais',
        'cantidad_visitantes',
    ];
    public function pais(){
        return $this->belongsTo(Paises::class,'id_pais','id_pais');
    }
}
