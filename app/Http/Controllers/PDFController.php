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
        where('condicion', "1")->
        where('precinto', "1")->
        where('chaveta', "1")->
        where('percutado', "0")->
        where('presurizado', "1")->
        where('acceso', "1")->get();


        $extinguidorMalo = Extinguidor::where('planta_id','=', $id)->
        where('estado', 'true')->
        where('condicion', '1')->
        where('precinto', '1')->
        where('chaveta', '1')->
        where('percutado', '1')->
        where('presurizado', '1')->
        where('acceso', '1')->get();

        // dd($extinguidor);
        $pdf = PDF::loadView('extintor/reporte', compact('extinguidor','extinguidorMalo'));

        return $pdf->setPaper('a4','landscape')-> stream('ReporteExtinguidor.pdf');
    }
}
