<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ventas;
use App\Pedidos;
use Carbon\Carbon;
use App\Comidas_pedidos;

class ApiVentaFinalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $pedidos=Pedidos::all();
      $folio=$pedidos->last();
      $polio=$folio->folio_venta;
      $comidas = DB::select("SELECT
    comidas.id_comida AS id,
    comidas_pedidos.id_pv as idpedido,
    comidas.nombre AS nombre,
    comidas.costo as costo,
    comidas_pedidos.cantidad as cantidad,
    comidas_pedidos.total as total
FROM
    comidas_pedidos
JOIN pedidos ON comidas_pedidos.id_pedido=pedidos.id_pedido
JOIN comidas ON comidas.id_comida=comidas_pedidos.id_comida
WHERE pedidos.folio_venta=$polio;");
      return $comidas;
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta= new Ventas;
        $ventanueva = $request->get('ventanueva');
        $ventanueva=$ventanueva+1;
        $venta->folio_venta=$ventanueva;
        $ventahora =Carbon::now('America/Merida');
        $venta->hora_venta=$ventahora->toDateTimeString();
        $venta->save();
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
        $pedido=Comidas_pedidos::find($id);

        $pedido->cantidad=$request->get('cantidad');
        $pedido->total=$request->get('total');
        $pedido->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Comidas_pedidos::destroy($id);
    }
}
