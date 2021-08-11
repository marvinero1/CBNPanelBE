<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Extinguidor;
use PDF;

class PDFController extends Controller
{
    public function PDFExtinguidor($id){

        $extinguidor = Extinguidor::where('planta_id','=', $id)->
        where('estado', 'true')->
        where('estado', 'true')->
        where('precinto', 'true')->
        where('chaveta', 'true')->
        where('percutado', 'false')->
        where('presurizado', 'true')->
        where('acceso', 'true')->get();


        $extinguidorMalo = Extinguidor::where('planta_id','=', $id)->
        where('estado', 'true')->
        where('estado', 'true')->
        where('precinto', 'true')->
        where('chaveta', 'true')->
        where('percutado', 'true')->
        where('presurizado', 'false')->
        where('acceso', 'true')->get();
        

        $pdf = PDF::loadView('extintor/reporte', compact('extinguidor','extinguidorMalo'));

        return $pdf->setPaper('a4','landscape')-> stream('ReporteExtinguidor.pdf');
    }
}