@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card">
                        <div class="card-header">
                            <h3 class="card-title">Registro Asignación</h3>
                            <label class="card-text" style="display: block;"><strong>Los campos marcados con (*) son requeridos</strong></label>
                        </div>
                        <form action="{{route('asignacion.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row" style="border: outset;">
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Usuarios *</strong> </label>
                                            <select name="user_id" class="form-control select2" style="width: 100%;" required>
                                                @foreach ($user as $users)
                                                <option value="{{ $users->id }}">{{$users->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                             

                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Plantas *</strong> </label>
                                            <select name="planta_id" class="form-control select2"
                                                data-live-search="true" required>
                                                @foreach ($planta as $plantas)
                                                <option value="{{ $plantas->id }}">{{$plantas->nombre}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="text" name="role" value="admin_planta" hidden>
                                    
                                </div><br>
                                <div class="card-footer">
                                    {{-- <a type="button" class="btn btn-secondary float-right"
                                        href="{{url('/mis-productos')}}">Cerrar</a> --}}
                                    <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Guardar</button>
                                </div>    
                            <p>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="card-header border-0">
                <h3 class="card-title">Asignaciones</h3>
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
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Nombre Planta</th>
                            <th class="text-center">Ubicacion Planta</th>
                            <th class="text-center">Acciones </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asignacion as $asignacions)
                        <tr>
                            <td style="text-align:center;">{{ $asignacions->user->name }}</td>
                            <td style="text-align:center;">{{ $asignacions->planta->nombre }}</td>                       
                            <td style="text-align:center;">{{ $asignacions->planta->ubicacion }}</td>  

                            <td style="text-align:center;">
                                <form action="{{ route('asignacion.destroy',$asignacions->id ) }}" method="POST"
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
            {{ $asignacion->links() }}
        </div>
    </section>
</div>
@endsection