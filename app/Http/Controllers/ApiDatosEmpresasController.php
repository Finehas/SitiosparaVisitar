<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Empresas;
use App\Tipos;
use Session;

class ApiDatosEmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $empresas = DB::select("SELECT id_empresa,nombre,rfc,direccion,telefono,correo,representante, horario,logo FROM empresas");
        // return $empresas;
         $empresa=Empresas::first();
         Session::put('nom',$empresa->nombre);
         Session::put('eslo',$empresa->eslogan);
         Session::put('corto',$empresa->nombre_corto);
         Session::put('rfc',$empresa->rfc);
         Session::put('direccion',$empresa->direccion);
         Session::put('telefono',$empresa->telefono);
         Session::put('correo',$empresa->correo);
         Session::put('representante',$empresa->representante);
         Session::put('horario',$empresa->horario);
         Session::put('logo',$empresa->logo);

         $datos=Tipos::all();
         // return $datos;

         // Session::put('menu',$datos);
      

         
        return view('layouts.bienvenida')->with('menu',$datos);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        //
        // Empresas::findOrFail($id)->update($request->all());

        // $empresa = Empresas::find($id);

        // $empresa->nombre=$request->get('nombre');
        // $empresa->rfc=$request->get('rfc');
        // $empresa->direccion=$request->get('direccion');
        // $empresa->telefono=$request->get('telefono');
        // $empresa->correo=$request->get('correo');
        // $empresa->representante=$request->get('representante');
        // $empresa->horario=$request->get('horario');


        // $empresa->update();
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
         // return Empresas::destroy($id);
    }
}
