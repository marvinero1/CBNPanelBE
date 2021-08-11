<?php

namespace App\Http\Controllers;

use App\AsignacionTrabajador;
use App\asignacion;
use Session;
use App\User;
use Illuminate\Http\Request;

class AsignacionTrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $user = User::all()->sortBy('name');
        $asignacion = asignacion::all();
    

        $trabajador = $request->get('buscarpor');

        $asignacionTrabajador = AsignacionTrabajador::where('trabajador','like',"%$trabajador%")
        ->latest()->paginate(10);

        return view('asignacionTrabajador.index', compact('asignacion', 'user','asignacionTrabajador'));
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
    public function store(Request $request)
    {
        // dd($request);

        $request->validate([
            'asignacion_id' => 'required',
            'user_id' => 'required',
            'role' => 'nullable',
        ]);
        
        AsignacionTrabajador::create([
            'asignacion_id' => $request->asignacion_id,
            'trabajador' => $request->user_id,
            'user_id' => $request->user_id,
            'role' => $request->role,
        ]);
        
        Session::flash('message','Asignacion de Trabajador Creada Exisitosamente!');
        return redirect()->route('asignacionTrabajador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AsignacionTrabajador  $asignacionTrabajador
     * @return \Illuminate\Http\Response
     */
    public function show(AsignacionTrabajador $asignacionTrabajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AsignacionTrabajador  $asignacionTrabajador
     * @return \Illuminate\Http\Response
     */
    public function edit(AsignacionTrabajador $asignacionTrabajador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AsignacionTrabajador  $asignacionTrabajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AsignacionTrabajador $asignacionTrabajador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AsignacionTrabajador  $asignacionTrabajador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignacionTrabajador = AsignacionTrabajador::findOrFail($id);

        $asignacionTrabajador->delete();

        Session::flash('message','Asignacion de Trabajador eliminado exitosamente!');
        return redirect()->route('asignacionTrabajador.index');
    }
}
