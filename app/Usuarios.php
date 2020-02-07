<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table='usuarios';
    protected $primaryKey='id_usuario';
    public $incrementing=true;
    public $timestamps=false;
    protected $with=['tipousuario'];
    protected $fillable=[
    	'id_usuario',
    	'nombre_usuario',
    	'apellido_usuario',
    	'id_tipo',
        'password',
        'email'
    ];
    public function tipousuario(){
        return $this->belongsTo(Tipo_Usuarios::class,'id_tipo','id_tipo');
    }
}
