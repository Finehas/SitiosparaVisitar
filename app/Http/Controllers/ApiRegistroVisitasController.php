<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Visita_Sitios;
use App\Sitios;
use App\Municipios;
use App\Regiones;
use App\Paises;
class ApiRegistroVisitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $records=[];
        $visitas=$r->get('visitas');

        for ($i=0;$i<count($visitas);$i++) 
        { 
            $records[]=[
                'id_usuario'=>$r->get('id_usuario'),
                'id_sitio'=>$visitas[$i]['id_sitio'],
                'valoracion'=>$visitas[$i]['valoracion']
            ];
            $cant=$visitas[$i]['cantidad_visitantes'];
            $id=$visitas[$i]['id_sitio'];

            DB::update("UPDATE sitios 
                SET cantidad_visitantes=cantidad_visitantes+$cant                
                WHERE id_sitio='$id'");
        }

         Visita_Sitios::insert($records);

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
      
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
