<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Empresas; 
use App\Ventas;
use App\Comidas_pedidos;

class apiDetalleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $nolose=Ventas::find($id);

        $nolose->total_venta=$request->get('total');
        $nolose->update();
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
    }
    public function ticket()
    {
        $empresa=Empresas::first();
        $venta=Ventas::all();
        $folio=$pedidos->last();
        $pedidos=Pedidos::all();
      $final=$pedidos->last();
      $polio=$final->folio_venta;
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



        $pdf=new Fpdf($orientation='P',$unit='mm',$format=array(55,130));
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',5);
        $pdf->Ln(10);
        $pdf->SetFont('Arial','B',10);
        $pdf->Ln(2);
        $pdf->Cell(35,4,utf8_decode($empresa->nombre),0,0,'C');
        $pdf->Ln(2);
        $pdf->Cell(14,4,utf8_decode($folio->folio_venta),0,0,'C');
        
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(2);
        $pdf->Cell(0,14,utf8_decode('PRODUCTO'),1,0,'C');
        $pdf->Cell(0,14,utf8_decode('PRECIO'),1,0,'C');
        $pdf->Cell(0,14,utf8_decode('CANTIDAD'),1,0,'C');
        $pdf->Cell(0,14,utf8_decode('TOTAL'),1,0,'C');
        foreach ($comidas as $c) {
            $pdf->Cell(0,14,utf8_decode($c->nombre),0,0,'C');
            $pdf->Cell(0,14,utf8_decode($c->costo),0,0,'C');
            $pdf->Cell(0,14,utf8_decode($c->cantidad),0,0,'C');
            $pdf->Cell(0,14,utf8_decode($c->total),0,0,'C');
        }
        $pdf->Cell(35,4,utf8_decode('--------------------------------------------------'),0,0,'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(6);
        $pdf->Cell(16,2,utf8_decode('TOTAL :$'),0,0,'C');
        $pdf->Cell(16,2,utf8_decode($folio->total_venta),0,1,'C');
        $pdf->Ln(5);
        $pdf->Cell(35,4,utf8_decode('--------------------------------------------------'),0,0,'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Ln(4);
        $pdf->Cell(35,4,utf8_decode($empresa->representante),0,1,'C');
        $pdf->Cell(35,4,utf8_decode('--------------------------------------------------'),0,0,'C');
        $pdf->Ln(15);
        $pdf->Cell(35,4,utf8_decode('____________________'),0,0,'C');
        $pdf->Ln(4);
        $pdf->Cell(35,4,utf8_decode('Firma'),0,0,'C');

        $pdf->SetFont('Arial','',6);
        $pdf->Ln(10);
        $pdf->Cell(30,2,utf8_decode($folio->hora_venta),0,1,'C');

        $pdf->Output();
        exit;
    }
}
