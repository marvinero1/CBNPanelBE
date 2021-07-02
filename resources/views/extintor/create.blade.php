@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card">
                        <div class="card-header">
                            <h3 class="card-title">Registro Extinguidor</h3>
                        </div>
                        <form action="{{route('extintor.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row" style="border: outset;">
                                    <div class="col-md-4 p-2">
                                        <div class="form-group">
                                            <label for="nombre">Código Extinguidor *</label>
                                            <input type="text" class="form-control" name="codigo"
                                                placeholder="Código Extinguidor" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <div class="form-group">
                                            <label for="nombre">Planta *</label>
                                            <select name="planta_id" class="form-control select2"
                                            data-live-search="true" required>
                                            @foreach ($planta as $plantas)
                                            <option value="{{ $plantas->id }}">{{$plantas->nombre}}
                                            </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <div class="form-group">
                                            <label><strong>Categoria *</strong> </label>
                                            <select name="categorias_id" class="form-control select2"
                                                data-live-search="true" required>
                                                @foreach ($categoria as $categorias)
                                                <option value="{{ $categorias->id }}">{{$categorias->nombre}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    &nbsp;&nbsp;&nbsp; <p> <strong>Los campos marcados con (*) son requeridos</strong> </p><br>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Cilindro *</label>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Nombre Cilindro" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Peso *</label>
                                            <input type="number" step="0.01" class="form-control" placeholder="Peso en Kg." name="peso" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">                   
                                            <label>Tipo *</label>
                                            <div class="select2-blue">
                                                 <select class="select2" data-dropdown-css-class="select2-blue"
                                                    data-placeholder="Seleccione Tipo" style="width: 100%;"
                                                    name="tipo"> 
                                                    <option value="Polvo_Seco">Polvo Seco</option>
                                                    <option value="CO2">CO2</option>                                         
                                                    <option value="Agua">Agua</option>                          
                                                </select>
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                                <div class="row">                          
                                    <!-- <div class="col-md-4 text-center">
                                        <label class="text-center">Estado</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="Disponible" name="estado">
                                            <label class="form-check-label" for="inlineCheckbox1">Disponible</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="No-Disponible" name="estado">
                                            <label class="form-check-label" for="inlineCheckbox2">No Disponible</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="Pendiente" name="estado">
                                            <label class="form-check-label" for="inlineCheckbox3">Pendiente</label>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Proveedor *</label>
                                            <input type="text" class="form-control" placeholder="Proveedor" name="proveedor" required>
                                        </div>
                                    </div>  
                                      
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ubicación *</label>
                                            <input type="text" class="form-control" placeholder="Ubicación" name="ubicacion" required> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Area *</label>
                                            <input type="text" class="form-control" placeholder="Area" name="area" required>
                                        </div>
                                    </div>  


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Feha de Recarga *</label>
                                            <input type="date" class="form-control" placeholder="Feha de Recarga" name="fecha_recarga" required>
                                        </div>
                                    </div>  
                                      
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fecha Proxima Recarga *</label>
                                            <input type="date" class="form-control" placeholder="Fecha Proxima Recarga" name="fecha_prox_recarga" required>
                                        </div>
                                    </div>
                                </div>


                                <hr style="border-top: 1px solid dark;"><br>
                                <div class="row" style="text-align: center;padding-left: 5px;"> 

                                    <div class="col-md-2">
                                        <i class="fa fa-fire-extinguisher" aria-hidden="true" style="font-size: 4.5rem;"></i>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="text-center"><strong>Estado</strong></div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Estado1" name="estado" value="true" class="custom-control-input">
                                                <label class="custom-control-label" for="Estado1">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Estado2" name="estado" value="false" class="custom-control-input">
                                                <label class="custom-control-label" for="Estado2">No</label>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="text-center"><strong>Precinto</strong></div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Precinto1" name="precinto" value="true" class="custom-control-input">
                                                <label class="custom-control-label" for="Precinto1">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Precinto2" name="precinto" value="false" class="custom-control-input">
                                                <label class="custom-control-label" for="Precinto2">No</label>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="text-center"><strong>Chaveta</strong></div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Chaveta1" name="chaveta" value="true" class="custom-control-input">
                                                <label class="custom-control-label" for="Chaveta1">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Chaveta2" name="chaveta" value="false" class="custom-control-input">
                                                <label class="custom-control-label" for="Chaveta2">No</label>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="text-center"><strong>Percutado</strong></div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Percutado1" name="percutado" value="true" class="custom-control-input">
                                                <label class="custom-control-label" for="Percutado1">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Percutado2" name="percutado" value="false" class="custom-control-input">
                                                <label class="custom-control-label" for="Percutado2">No</label>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="text-center"><strong>Acceso</strong></div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Acceso1" name="acceso" value="true" class="custom-control-input">
                                                <label class="custom-control-label" for="Acceso1">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="Acceso2" name="acceso" value="false" class="custom-control-input">
                                                <label class="custom-control-label" for="Acceso2">No</label>
                                            </div>
                                        </div>
                                    </div> 
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Imagen</strong></p>
                                        <label for="file-upload" class="custom-file-upload" style="text-align: center;">
                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                        <strong>Imagen</strong>
                                        </label>
                                        <p><strong>Sugerencia:</strong> Para una mejor visualizacion se recomienda
                                        resolucion a partir de<strong> 1024 × 768 pixels</strong></p>
                                        <input id="file-upload" type="file" name="imagen">
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <textarea class="form-control" name="observaciones" rows="5"></textarea>
                                            </div>
                                    </div>
                                </div>
                                
                                    <input hidden type="text" value="{{Auth::user()->id}}" name="user_id">
                                    <input hidden type="text" value="{{Auth::user()->name}}" name="user">

                                </div>
                           
  
                                <div class="card-footer">
                                    <a type="button" class="btn btn-secondary float-right"
                                        href="{{url('/extintor')}}">Cerrar</a>
                                    <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Guardar</button>
                                </div>
                            </div>          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
<style>
    .select2{
        width: 100%;
    }
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        width: 100%;
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .container-fluid {
        padding-block-start: 20px;
    }

    .mtform {
        width: 100%;
    }
</style>