<?php

namespace App\Http\Controllers;

use App\Informe;
use App\Planta;
use App\asignacion;
use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class InformeController extends Controller
{   

    public function getInforme(){
        // colocar el id del usuario logueado

        // $carrito = Carrito::where('estado','false')
        // ->where('carritos.user_id', '=', $id)
        // ->first();
        
        $planta = Planta::all();    
        $informe = Informe::all();
        $user = User::all();

        return response()->json($informe, 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $id = Auth::id();
        $planta = Planta::all();

        $asignacion = asignacion::where('user_id',  $id)->get();
        $informe = Informe::where('user_id',  $id)->paginate(10);
        
        return view('informe.index', compact('asignacion','planta','informe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $requestData = $request->all();

        if($request->hasFile('file')) {
            $file = $request->file('file');
            $requestData['file'] = auth()->id() .'_'. time() .'_'. $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('files', $requestData['file']);
        }

        Informe::create($requestData);

        $mensaje= 'Informe Guardado Exitosamente';

        Session::flash('message',$mensaje);

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit(Informe $informe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Informe $informe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $informe = Informe::find($id);

        $informe->delete();

        Session::flash('message','Informe Eliminado Exitosamente!!!');
        return redirect()->route('informe.index');
    }
}
