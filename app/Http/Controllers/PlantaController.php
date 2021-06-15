<?php

namespace App\Http\Controllers;

use App\Planta;
use Session;
use Illuminate\Http\Request;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');
        $planta = Planta::where('nombre','like',"%$nombre%")->latest()->paginate(10);
        
        return view('plantas.index', compact('planta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plantas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request);
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'ciudad' => 'required',
            'ubicacion' => 'required',
            'descripcion' => 'nullable',
        ]);
        
        Planta::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'ciudad' => $request->ciudad,
            'ubicacion' => $request->ubicacion,
            'descripcion' => $request->descripcion,
        ]);
        
        Session::flash('message','Planta creada exisitosamente!');
        return redirect()->route('plantas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function show(Planta $planta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('plantas.edit', ['planta' =>Planta::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->all();
        
        $planta = Planta::find($id);

        $planta->codigo = $request->get('codigo');
        $planta->nombre = $request->get('nombre');
        $planta->ciudad = $request->get('ciudad');
        $planta->ubicacion = $request->get('ubicacion');
        $planta->descripcion = $request->get('descripcion');
        
        $planta->update(); 
        
        Session::flash('message','Planta Editado Exisitosamente!');
        return redirect()->route('plantas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Planta  $planta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planta = Planta::findOrFail($id);

        $planta->delete();

        Session::flash('message','Planta eliminado exitosamente!');
        return redirect()->route('plantas.index');
    }
}
