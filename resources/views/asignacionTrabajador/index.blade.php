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
                            <h3 class="card-title">Registro Asignación de Trabajadores</h3>
                            <lable class="card-text" style="display: block;"><strong>Los campos marcados con (*) son requeridos</strong></lable>
                              
                        </div>
                        <form action="{{route('asignacionTrabajador.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row" style="border: outset;">
                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Responsable Planta *</strong> </label>
                                            <select name="asignacion_id" class="form-control select2" style="width: 100%;" required>
                                                @foreach ($asignacion as $asignacions)
                                                <option value="{{ $asignacions->id }}">{{$asignacions->user->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 p-2">
                                        <div class="form-group">
                                            <label><strong>Trabajador *</strong> </label>
                                            <select name="user_id" class="form-control select2" style="width: 100%;" required>
                                                @foreach ($user as $users)
                                                <option value="{{ $users->id }}">{{$users->name}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <input type="text" name="role" value="trabajador" hidden>
                                    
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
            </div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-striped table-valign-middle ">
                    <thead>
                        <tr>
                            {{-- <th>Id</th>  --}}
                            {{-- <th style="text-align:center;">Id</th> --}}
                            <th class="text-center">Responsable Planta</th>
                            <th class="text-center">Trabajador asignado</th>
                            <th class="text-center">Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asignacionTrabajador as $asignacionTrabajadors)
                        <tr>
                            {{-- este es el asignado --}}
                           <td style="text-align:center;">{{ $asignacionTrabajadors->asignacion->user->name }}</td> 

                           {{-- este el trabajador --}}

                            <td style="text-align:center;">{{ $asignacionTrabajadors->user->name }}</td>                                          
                          
                            <td style="text-align:center;">
                                <form action="{{ route('asignacionTrabajador.destroy', $asignacionTrabajadors->id ) }}" method="POST"
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
            {{ $asignacionTrabajador->links() }}
        </div>
    </section>
</div>
@endsection