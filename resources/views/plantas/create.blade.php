@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Registro Planta</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('plantas.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Codigo *</label>
                                            <input type="text" class="form-control" name="codigo"
                                                placeholder="Codigo Planta" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Nombre *</label>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Nombre Planta" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Ciudad *</label>
                                            <select class="custom-select" id="inputGroupSelect01" name="ciudad" required>
                                                <option value="La-Paz">La Paz</option>
                                                <option value="Cochabamba">Cochabamba</option>
                                                <option value="Santa-Cruz">Santa Cruz</option>
                                                <option value="Oruro">Oruro</option>
                                                <option value="Potosi">Potosi</option>
                                                <option value="Chuquisaca">Chuquisaca</option>
                                                <option value="Tarija">Tarija</option>
                                                <option value="Pando">Pando</option>
                                                <option value="Beni">Beni</option>
                                              </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nombre">Ubicación</label>
                                            <input type="text" class="form-control" name="ubicacion"
                                                placeholder="Ubicación" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a type="button" class="btn btn-secondary float-right" href="{{url('/plantas')}}">Cerrar</a>
                                <button type="submit" class="btn btn-primary float-right mr-2"><i class="fa fas fa-save"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
    </section>
</div>
@endsection