<?php

namespace App\Http\Controllers;

use App\asignacion;
use App\User;
use App\Planta;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

       
        $user = User::all();
        $planta = Planta::all();
        
        $asignacion = asignacion::all();

         return view('asignacion.index', compact('user','planta', 'asignacion'));
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

        // dd($request);

        $request->validate([
            'plantas_id' => 'required',
            'users_id' => 'required',
        ]);
        
        asignacion::create([
            'plantas_id' => $request->plantas_id,
            'users_id' => $request->users_id,
        ]);
        
        Session::flash('message','Asignacion creada exisitosamente!');
        return redirect()->route('asignacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function show(asignacion $asignacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit(asignacion $asignacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asignacion $asignacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignacion $asignacion)
    {
        //
    }
}
