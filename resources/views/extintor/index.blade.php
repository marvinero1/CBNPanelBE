@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <h1 style="text-align: center" class="mb-4">Extinguidores</h1>
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
                        type="search" placeholder="Buscador Codigo Extinguidor" aria-label="Search"
                        style="width: 65% !important;">&nbsp;&nbsp;
                    <button class="btn btn-outline-success " type="submit" style="border: 1px #3097D1 solid;">
                        <span class="search"></span>&nbsp;Buscar</button>
                </form>
            </div>
        </div>
        {{-- @if(Auth::user()->role == 'admin' || Auth::user()->role == 'empresa') --}}
        <div class="float-right">
            <a href="{{ route('extintor.create')}}"><button class="btn btn-primary">
                    <i class="fa fa-plus">&nbsp;&nbsp;</i>Crear Extintor</button></a>
        </div>
        {{-- @endif --}}
        <br><br><br>

        <div class="card-header border-0">
            <h3 class="card-title">Extintores</h3>
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
                        <th style="text-align:center;">Codigo</th>
                        <th style="text-align:center;">Nombre</th>
                        <th style="text-align:center;">Tipo</th>
                        <th style="text-align:center;">Peso</th>
                        <th style="text-align:center;">Proveedor</th>
                        <th style="text-align:center;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($extinguidor as $extinguidors)
                    <tr>
                        <td style="text-align:center;">{{ $extinguidors->codigo }}</td>
                        <td style="text-align:center;">{{ $extinguidors->nombre }}</td>
                        <td style="text-align:center;">{{ $extinguidors->tipo }}</td>
                        <td style="text-align:center;">{{ $extinguidors->peso }} Kg.</td>
                        <td style="text-align:center;">{{ $extinguidors->proveedor }}</td>
                        <td style="text-align: center;">
                            <div class="card-body">
                                {{-- <a class="btn btn-app" data-toggle="modal"
                                    data-target="#modalFavoritos{{$extinguidors->id}}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-heart"></i> Favoritos
                                </a> --}}

                                {{-- <a class="btn btn-app " href="{{ route('extintor.show',$extinguidors->id ) }}">
                                    <i class="fas fa-eye"></i> Ver
                                </a> --}}

                                <a class="btn btn-app " href="{{ route('generateQR',$extinguidors->id ) }}">
                                    <i class="fas fa-eye"></i> Ver
                                </a>

                                @if($extinguidors->user == Auth::user()->name)

                                    <form action="{{ route('extintor.destroy',$extinguidors->id ) }}" method="POST"
                                        accept-charset="UTF-8" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-app" title="Delete Image"
                                        class="btn btn-danger btn-sm"
                                        title="Delete Image" onclick="return confirm(&quot;¿Desea eliminar?&quot;)"><i class="fa fas fa-trash"
                                                aria-hidden="true"></i> Eliminar</button>
                                    </form>
                                @endif
                            </div>
                        </td>      
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="text-align: center;">
            {{ $extinguidor->links() }}
        </div>
    </div>
</div>
@endsection