<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sitios;
class ApiSitiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sitios::all();  
        
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
        $municipio=Municipios::find($id);
        return $municipio;
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
      
        $ruta=Rutas::find($id);
        $ruta->nombre_es=$request->get('nombre_es');
        $ruta->nombre_en=$request->get('nombre_en');
        $ruta->longitud_km=$request->get('longitud_km');
        $ruta->longitud_milla=$request->get('longitud_milla');
        $ruta->ubicacion=$request->get('ubicacion');
        $ruta->update();


       
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
         return Rutas::destroy($id);
    }
    public function getSitios($id){
    $sitios = DB::select("SELECT * FROM sitios WHERE id_sitio = $id");
    return $sitios;
    }
}
