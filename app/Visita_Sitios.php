<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita_Sitios extends Model
{
    protected $table='visita_sitios';
    protected $primaryKey='id_visita_sitios';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_visita_sitios',
    	'id_sitio',
    	'id_usuario',
    	'valoracion'
    ];
}
