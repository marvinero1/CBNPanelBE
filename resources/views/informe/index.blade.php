@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3 p-3">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Plantas Asignadas: </h5>
            <div class="row">
                <div class="col">
                    @foreach($asignacion as $asignacions)
                        <a class="btn btn-success" ><i class="nav-icon fas fa-industry"></i>
                            {{$asignacions->planta->nombre }} <i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection