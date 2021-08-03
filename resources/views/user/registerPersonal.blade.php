@extends('layouts.main')

@section('content')

<div class="content-wrapper pt-3"><br>
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <section class="content">
        <h2 class="labelTittle">Registro Personal QR CBN</h2><br><br>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container">
                            <form action="{{route('user.store')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Nombre Supervisor</label>
                                        <input type="text" class="form-control" placeholder="Nombre Supervisor"
                                            name="name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" placeholder="Apellido" name="apellido"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Cargo</label>

                                        <select class="form-control" placeholder="Cargo" name="role" required>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="admin_planta">Administrador Planta</option>
                                            <option value="user">Usuario</option>
                                        </select>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Carnet</label>
                                        <input type="text" class="form-control" placeholder="Carnet" name="carnet">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Correo Electronico</label>
                                        <input type="text" class="form-control" placeholder="Email " name="email"
                                            required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Contraseña</label>
                                        <input type="password" class="form-control" placeholder="Contraseña"
                                            name="password" required>
                                    </div>
                                    {{-- <input type="hidden" name="registrado" value="{{Auth::user()->name}}">  --}}
                                    {{-- <input type="hidden" name="subscripcion" value="false"> --}} 
                                </div>

                                {{-- <div class="form-group row">
                                    <p><strong>Imagen</strong></p>
                                    <label for="file-upload" class="custom-file-upload" style="text-align: center;">
                                        <i class="fa fa-cloud-upload" aria-hidden="true"></i>&nbsp;
                                        <strong>Imagen</strong>
                                    </label>
                                    <p><strong>Sugerencia:</strong> Para una mejor visualizacion se recomienda
                                        resolucion a partir de<strong> 1024 × 768 pixels</strong></p>
                                    <input id="file-upload" type="file" name="imagen">
                                </div> --}}
                                <button type="submit" class="btn btn-primary px-4 float-right"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;
                                    Guardar</button><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .labelTittle {
        text-align: center;
    }

    .select2 {
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

    table {
        width: 100%;
    }

    h3 {
        margin-block-end: 0em !important;
    }

    h5 {
        color: darkgray;
    }

    .mat-sort-header {
        text-align: center;
    }

    td {
        text-align: center;
    }

    .clasificacion {
        direction: rtl;
        unicode-bidi: bidi-override;
    }

    label:hover,
    label:hover~label {
        color: orange;
    }

    input[type="radio"]:checked~label {
        color: orange;
    }

    input[type="radio"] {
        display: none;
    }

    .label1 {
        padding-right: 3px;
        color: grey;
        font-size: 35px;
        margin-bottom: 3.0rem !important;
    }

    p,
    h4 {
        text-align: center;
    }

    ::ng-deep .mat-snack-bar-container {
        color: #155724 !important;
        background-color: #d4edda !important;
        border-color: #c3e6cb !important;
    }

    ::ng-deep .mat-simple-snackbar-action {
        color: #02e896;
    }

</style>
@endsection
