<?php

namespace App\Http\Controllers;

use App\Extinguidor;
use App\Planta;
use App\Categoria;
use File;
use DB;
use Image;
use Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ExtinguidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $codigo = $request->get('buscarpor');
        $planta = Planta::all();
        $categoria = Categoria::all();
                      
        $extinguidor = Extinguidor::where('codigo','like',"%$codigo%")->latest()->paginate(10);
        
        return view('extintor.index', compact('planta','categoria','extinguidor'));
    
    }

    public function getExtinguidor(Request $request, $id){

        // $extinguidor = Extinguidor::findOrFail($id);

        // return response()->json($extinguidor, 200);
        return Extinguidor::findOrFail($id);
    }

    public function getExtinguidorAll(){

        return Extinguidor::latest()->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $planta = Planta::all();
        $categoria = Categoria::all();

        return view('extintor.create', compact('planta','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $imagen = null;
        $mensaje= 'Extinguidor Registrado correctamente';

        DB::beginTransaction();
        
        $requestData = $request->all();

        if($request->imagen != null){
           
            $data = $request->imagen;
        
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/extinguidor', mime_content_type('images/extinguidor'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/extinguidor';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
             
            if($image->save($img)) {
                $requestData['imagen'] = $img;
               
                $mensaje = "Extinguidor Registrado correctamente";    
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }else{
            $url = "images/system/extintorDefault.png";
            $requestData['imagen'] = $url;
            $mensaje = "Extintor Registrado Correctamente Sin Imagen";
        }

        $extinguidor = Extinguidor::create($requestData);

        if($extinguidor){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
        return redirect()->route('extintor.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Extinguidor  $extinguidor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $planta = Planta::all();
        $categoria = Categoria::all();
        $extinguidor = Extinguidor::findOrFail($id);

        return view('extintor.show', compact('extinguidor','planta','categoria'));
    }

    public function generateQR($id){
        
        $extinguidor = Extinguidor::findOrFail($id);
        $json =  json_encode($extinguidor);
        
        $qrjson = QrCode::generate($json);

        return view('extintor.show', compact('extinguidor','planta','categoria'));
        // return QrCode::generate('Make me into a QrCode!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Extinguidor  $extinguidor
     * @return \Illuminate\Http\Response
     */
    public function edit(Extinguidor $extinguidor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extinguidor  $extinguidor
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Extinguidor $extinguidor)
    {
        //
    }

    public function actualizarExtinguidor(Request $request, $id){

        $extinguidor = Extinguidor::findOrFail($id);
        $extinguidor->update($request->all());

        return response()->json($extinguidor, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extinguidor  $extinguidor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        
        $extinguidor = Extinguidor::find($id);

        $extinguidor->delete();

        Session::flash('message','Extinguidor eliminado exitosamente!');
        return redirect()->route('extintor.index'); 
    }
}
