<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Usuarios;
class ApiUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuarios::all();  
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario = new Usuarios;
        $usuario->nombre_usuario=$request->get('nombre_usuario');
        $usuario->apellido_usuario=$request->get('apellido_usuario');
        $usuario->password=$request->get('password');
        $usuario->email=$request->get('email');

        $usuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usuario=Usuarios::find($id);
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update(Request $request, $id)
    {
      
        $usuario=Usuarios::find($id);
        $usuario->nombre_usuario=$request->get('nombre_usuario');
        $usuario->apellido_usuario=$request->get('apellido_usuario');
        $usuario->password=$request->get('password');
        $usuario->email=$request->get('email');
        $usuario->id_tipo=$request->get('id_tipo');
        $usuario->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         return Usuarios::destroy($id);
    }
}
