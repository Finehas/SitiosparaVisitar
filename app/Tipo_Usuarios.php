<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Usuarios extends Model
{
    protected $table='tipo_usuario';
    protected $primaryKey='id_tipo';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_tipo',
    	'nombre_tipo'
    ];
}
