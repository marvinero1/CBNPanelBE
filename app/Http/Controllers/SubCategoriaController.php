<?php

namespace App\Http\Controllers;

use App\SubCategoria;
use App\Categoria;
use Session;
use Illuminate\Http\Request;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        
        $nombre = $request->get('buscarpor');
        $categoria = Categoria::all();
        $subcategoria = subcategoria::where('nombre','like',"%$nombre%")->latest()->paginate(10);
        
        return view('sub-categorias.index', compact('categoria','subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        return view('sub-categorias.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
                   ]);
        
        subcategoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'categorias_id' => $request->categorias_id,
        ]);
        
        Session::flash('message','Sub-Categoria creado exisitosamente!');
        return redirect()->route('sub-categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategoria $subCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::all(); 
        $subcategoria = subcategoria::findOrFail($id);
        return view(('sub-categorias.edit'), compact('subcategoria','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::all();

        $requestData = $request->all();

        //dd($requestData);
        
        $subcategoria = subcategoria::find($id);

        $subcategoria->nombre = $request->get('nombre');
        $subcategoria->descripcion = $request->get('descripcion');

        $subcategoria->update(); 
        
        Session::flash('message','Sub-Categoria Editado Exisitosamente!');
        return redirect()->route('sub-categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategoria  $subCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria = subcategoria::findOrFail($id);

        $subcategoria->delete();

        Session::flash('message','Subcategoria eliminado exitosamente!');
        return redirect()->route('sub-categorias.index');
    }
}
