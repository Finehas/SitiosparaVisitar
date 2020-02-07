<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Monedas;
class ApiMonedasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Monedas::all();  
        
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
        $moneda = new Monedas;
        $moneda->nombre_moneda_es=$request->get('nombre_moneda_es');
        $moneda->nombre_moneda_en=$request->get('nombre_moneda_en');
        $moneda->cambio_dolar=$request->get('cambio_dolar');
        $moneda->cambio_euro=$request->get('cambio_euro');

        $moneda->save();
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
        $moneda=Monedas::find($id);
        return $moneda;
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
      
        $moneda=Monedas::find($id);
        $moneda->nombre_moneda_es=$request->get('nombre_moneda_es');
        $moneda->nombre_moneda_en=$request->get('nombre_moneda_en');
        $moneda->cambio_dolar=$request->get('cambio_dolar');
        $moneda->cambio_euro=$request->get('cambio_euro');

        $moneda->update();


       
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
         return Monedas::destroy($id);
    }
}
