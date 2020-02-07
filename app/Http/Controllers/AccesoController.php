<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
use Session;
use Redirect;
use Cookie;
use Cache;

class AccesoController extends Controller
{
      public function validar(Request $request){


    	$email=$request->email;
    	$password=$request->password;


    	$resp = Usuarios::where('email','=',$email)
    	->where('password','=',$password)
    	->get();

        
    if (count($resp)>0){
        $user=$resp[0]->nombre_usuario.' '.$resp[0]->apellido_usuario;
        Session::put('usuario',$user);
        Session::put('rol',$resp[0]->tipousuario->nombre_tipo);
        if ($resp[0]->tipousuario->nombre_tipo =="administrador") {
            return Redirect::to('bienvenida');
        }else if ($resp[0]->tipousuario->nombre_tipo =="verificador") {
            return Redirect::to('bienvenida');
        }else{
            return Redirect::to('bienvenida');
        } 
    }else {
            return Redirect::to('error');
        }
    	
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);
        return Redirect::to('/');
    }
}
