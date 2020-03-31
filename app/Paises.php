<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table='paises';
    protected $primaryKey='id_pais';
    public $incrementing=true;
    public $timestamps=false;
    protected $with=['moneda'];
    protected $fillable=[
    	'id_pais',
    	'nombre_es',
        'nombre_en',
        'nombre_largo_es',
        'nombre_largo_en',
    	'continente_es',
        'continente_en',
        'capital_pais_es',
        'capital_pais_en',
        'idioma1_es',
        'idioma1_en',
        'idioma2_es',
        'idioma2_en',
        'id_moneda',
        'cantidad_visitantes',
    ];
    public function moneda(){
        return $this->belongsTo(Monedas::class,'id_moneda','id_moneda');
    }
}
