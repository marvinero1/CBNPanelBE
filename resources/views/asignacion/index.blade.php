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
                        </div>
                        &nbsp;&nbsp;&nbsp;<lable>Los campos marcados con (*) son requeridos</lable><br>
                        <form action="{{route('asignacion.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row" style="border: outset;">
                                    {{-- <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label for="nombre">Código Producto *</label>
                                            <input type="text" class="form-control" name="codigo"
                                                placeholder="Código Artículo" required>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Usuarios *</strong> </label>
                                            <select name="user_id" class="form-control select2"
                                                data-live-search="true" required>
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
                            <th style="text-align:center;">Usuario</th>
                            <th style="text-align:center;">Nombre Planta</th>
                            <th style="text-align:center;">Ubicacion Planta</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asignacion as $asignacions)
                        <tr>
                            <td style="text-align:center;">{{ $asignacions->user->name }}</td>
                            <td style="text-align:center;">{{ $asignacions->planta->nombre }}</td>                       
                            <td style="text-align:center;">{{ $asignacions->planta->ubicacion }}</td>                       
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>
    </section>
</div>
@endsection