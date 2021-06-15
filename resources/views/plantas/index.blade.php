@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Planta</h1>
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="col-md-6 float-left">
            <div class="input-group col-md-8 float-left">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fas fa-search"></i></span>
                </div>
                <form style="display: contents !important;margin-top: 0em !important;margin-block-end: 0em !important">
                    <input type="text" aria-describedby="basic-addon1" name="buscarpor" class="form-control "
                        type="search" placeholder="Buscador Nombre Planta" aria-label="Search"
                        style="width: 55% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
            </div>
        </div>
        <div class="float-right">
            <a href="{{ route('plantas.create')}}"><button class="btn btn-primary">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Planta</button></a>
        </div>
        <br><br><br>
        <div class="table-responsive padding">
            <table class="table table-striped table-hover">
                <thead class="thead-info" style="background: linear-gradient(0deg, rgba(82,223,223,1) 0%, rgba(77,144,203,1) 94%);">
                    <tr>
                        {{-- <th>Id</th>  --}}
                        <th style="text-align:center;">Codigo</th>
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Ciudad</th>
                        <th style="text-align:center;">Ubicacion</th>
                        <th style="text-align:center;">Descripción</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planta as $plantas)
                    <tr>
                        <td style="text-align:center;">{{ $plantas->codigo }}</td>
                        <td style="text-align:center;">{{ $plantas->nombre }}</td>
                        <td style="text-align:center;">{{ $plantas->ciudad }}</td>
                        <td style="text-align:center;">{{ $plantas->ubicacion }}</td>
                        <td style="text-align:center;">{{ $plantas->descripcion }}</td>
                        <td style="text-align:center;">
                            <a href="{{ route('plantas.edit',$plantas->id ) }}">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i> Editar
                                </button></a>
                            <form action="{{ route('plantas.destroy',$plantas->id ) }}" method="POST"
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
            </table><br><br>
        </div>
        <div style="text-align: center !important;" class="justify-content-center">
            {{ $planta->links() }}
        </div>
    </div>
</div>

@endsection
<style>
    .modal-dialog {
        max-width: 780px !important;
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
</style>