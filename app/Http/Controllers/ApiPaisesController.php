<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Paises;
class ApiPaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Paises::all();  
        
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
        $pais = new Paises;
        $pais->nombre_es=$request->get('nombre_es');
        $pais->nombre_en=$request->get('nombre_en');
        $pais->nombre_largo_es=$request->get('nombre_largo_es');
        $pais->nombre_largo_en=$request->get('nombre_largo_en');
        $pais->continente_es=$request->get('continente_es');
        $pais->continente_en=$request->get('continente_en');
        $pais->capital_pais_es=$request->get('capital_pais_es');
        $pais->capital_pais_en=$request->get('capital_pais_en');
        $pais->idioma1_es=$request->get('idioma1_es');
        $pais->idioma1_en=$request->get('idioma1_en');
        $pais->idioma2_es=$request->get('idioma2_es');
        $pais->idioma2_en=$request->get('idioma2_en');
        $pais->id_moneda=$request->get('id_moneda');
        $pais->save();
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
        $pais=Paises::find($id);
        return $pais;
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
      
        $pais=Paises::find($id);
        $pais->nombre_es=$request->get('nombre_es');
        $pais->nombre_en=$request->get('nombre_en');
        $pais->nombre_largo_es=$request->get('nombre_largo_es');
        $pais->nombre_largo_en=$request->get('nombre_largo_en');
        $pais->continente_es=$request->get('continente_es');
        $pais->continente_en=$request->get('continente_en');
        $pais->capital_pais_es=$request->get('capital_pais_es');
        $pais->capital_pais_en=$request->get('capital_pais_en');
        $pais->idioma1_es=$request->get('idioma1_es');
        $pais->idioma1_en=$request->get('idioma1_en');
        $pais->idioma2_es=$request->get('idioma2_es');
        $pais->idioma2_en=$request->get('idioma2_en');
        $pais->id_moneda=$request->get('id_moneda');
        $pais->update();


       
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
         return Paises::destroy($id);
    }
    public function getEstados($id){
    $estados = DB::select("SELECT * FROM estados_provincias WHERE id_pais= $id");
    return $estados;
    }
}
