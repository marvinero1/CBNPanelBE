@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3 p-3">
    @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Plantas Asignadas: </h5>
            <div class="row">
                <div class="col">
                    @foreach($asignacion as $informes)
                        <a class="btn btn-success" href="{{ route('ReporteExtinguidor', $informes->planta->id )}}"><i class="nav-icon fas fa-industry"></i>
                            {{$informes->planta->nombre }} <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                    @endforeach 
                </div>
            </div><br>
            <div class="text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Guardar Informe
                </button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Guardar Informe </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('informe.store')}}" method="POST" enctype="multipart/form-data">
                              {{ csrf_field() }}             
                              <div class="col-md-12 p-2">
                                  <div class="form-group">
                                    <div class="col-md-12 p-2">
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
                                        <div class="col-md-12">
                                            <p><strong>PDF</strong></p>
                                            <label for="file-upload" class="custom-file-upload" style="text-align: center;">
                                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                            <strong>Seleccionar PDF...</strong>
                                            </label>
                                            <input id="file-upload" type="file" name="file">
                                        </div> <br>

                                       <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="descripcion">Descripción</label>
                                                <textarea class="form-control" name="descripcion" rows="4" cols="4"></textarea>
                                            </div>
                                       </div>     
              
                                        <input type="text" class="form-control" name="user_id"
                                          value="{{ Auth::user()->id }}" hidden="true">
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                      <i class="fa fa-close" aria-hidden="true"></i> Cerrar</button>
                                  <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Enviar</button>
                              </div>
                          </form>
                        </div>
                      </div>
                </div>
              </div>
        </div>
        {{-- TABLA --}}
        <div>
            <div class="card-header border-0">
                <h3 class="card-title">Mis Informes</h3>
                {{-- <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a>
                  </div> --}}
            </div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-striped table-valign-middle ">
                    <thead>
                        <tr>
                            {{-- <th>Id</th>  --}}
                            {{-- <th style="text-align:center;">Id</th> --}}
                            <th class="text-center">Planta</th>
                            <th class="text-center">Ubicacion Planta</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Fecha de Creacion Informe</th>
                            <th class="text-center">Acciones </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($informe as $informes)
                        <tr>
                            <td style="text-align:center;">{{ $informes->planta->nombre }}</td> 
                            <td style="text-align:center;">{{ $informes->planta->ubicacion }}</td> 
                            <td style="text-align:center;">{{ $informes->descripcion }}</td>

                            <td style="text-align:center;">{{ $informes->created_at }}</td>
                                                  
                             

                            <td style="text-align:center;">
                                <a href="{{ route('downloads', $informes->file ) }}" class="btn btn-success">
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Descargar PDF
                                </a>
                                <form action="{{ route('asignacion.destroy',$informes->id ) }}" method="POST"
                                    accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Image"
                                        onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                            aria-hidden="true"></i> Eliminar</button>
                                </form>
                            </td>                     
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>
@endsection