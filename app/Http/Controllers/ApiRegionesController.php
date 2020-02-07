<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Regiones;
class ApiRegionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Regiones::all();  
        
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
        $region = new Regiones;
        $region->nombre_es=$request->get('nombre_es');
        $region->nombre_en=$request->get('nombre_en');
        $region->nombre_largo_es=$request->get('nombre_largo_es');
        $region->nombre_largo_en=$request->get('nombre_largo_en');
        $region->capital_es=$request->get('capital_es');
        $region->capital_en=$request->get('capital_en');
        $region->ubicacion=$request->get('ubicacion');
        $region->id_pais=$request->get('id_pais');

        $region->save();
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
        $region=Regiones::find($id);
        return $region;
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
      
        $region=Regiones::find($id);
        $region->nombre_es=$request->get('nombre_es');
        $region->nombre_en=$request->get('nombre_en');
        $region->nombre_largo_es=$request->get('nombre_largo_es');
        $region->nombre_largo_en=$request->get('nombre_largo_en');
        $region->capital_es=$request->get('capital_es');
        $region->capital_en=$request->get('capital_en');
        $region->ubicacion=$request->get('ubicacion');
        $region->id_pais=$request->get('id_pais');
        $region->update();


       
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
         return Regiones::destroy($id);
    }
}
