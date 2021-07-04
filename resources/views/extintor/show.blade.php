@extends('layouts.main')

@section('content')
<div class="content-wrapper pt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="card p-3">
                <div class="card__body">
                    <div class="half container-fluid">
                        <div class="row">
                            <div class="featured_text" style="padding-right: 700px;">
                                <h2>{{ $extinguidor->nombre }}</h2><br>
                            </div>
                            <div class="featured_text float-right">
                                <h2>Cod. Extinguidor</h2>
                                <h3>{{ $extinguidor->codigo }}</h3><br>
                            </div>  
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <div class="image">
                                    <img src="/{{$extinguidor->imagen }}" class="img-thumbnail" alt="extinguidor" 
                                        style="display: block;margin: 0 auto;width: 100%;">
                                </div>
                            </div>
                            
                            <div class="row" style="text-align: center;padding-left: 8px;">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="col-md">
                                           <i class="fa fa-qrcode" aria-hidden="true" style="font-size:2.5rem;"></i>
                                           
                                           <div id="areaImprimir">
                                              <h4 class="text-center"><strong>Imagen QR</strong></h4>
                                              <p class="text-center">{{ $extinguidor->codigo }}</p>
                                                {{-- <img src="/{{$extinguidor->imagen_qr }}" class="img-thumbnail" alt="extinguidorQR" 
                                                style="display: block;margin: 0 auto;width: 75%;"> --}}
                                            <div class="visible-print text-center" >
                                                {!! QrCode::size(200)->margin(0)->errorCorrection('H')->generate($extinguidor->id.'/'.$extinguidor->codigo);
                                                 !!}
                                                {{-- <p>Escaneame para ver la URL.</p> --}}
                                            </div>  
                                           </div><hr>
                                            <div class="col-md">
                                                <h4><strong>Categoria</strong></h4>
                                                <h5> {{ $extinguidor->categoria->nombre }}</h5>
                                            </div><hr>

                                            <div class="col-md">
                                                <h4><strong>Fecha Recarga</strong></h4>
                                                <h5> 
                                                    {{ date('d-M-y', strtotime($extinguidor->fecha_recarga))  }}</h5>
                                            </div><hr>
                                            <div class="col-md">
                                                <h4><strong>Fecha Proxima Recarga</strong></h4>
                                                <h5> {{ date('d-M-y', strtotime($extinguidor->fecha_prox_recarga))  }}</h5>
                                            </div>                                            
                                            {{-- <div class="col-md">
                                                <h4><strong>Sub-Categoria</strong></h4>
                                                <h5> {{ $extinguidor->subcategoria->nombre }}</h5>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="card">
                                    <div class="card-body">
                                        <i class="fa fa-industry" aria-hidden="true" style="font-size:2.5rem;"></i>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="col-md">
                                                    <div class="half">
                                                        <h4><strong>Tipo</strong></h4>
                                                        <h5> {{ $extinguidor->tipo }}</h5> 
                                                    </div><hr>
                                                    
                                                    <div class="col-md">
                                                        <h4><strong>Peso</strong></h4>
                                                        <h5> {{ $extinguidor->peso }}</h5> 
                                                    </div><hr>
                                                    
                                                    <div class="col-md">
                                                        <h4><strong>Proveedor</strong></h4>
                                                        <h5> {{ $extinguidor->proveedor }}</h5>
                                                    </div><hr>
        
                                                    <div class="col-md">
                                                        <h4><strong>Area</strong></h4>
                                                        <h5> {{ $extinguidor->area }}</h5>
                                                    </div><hr>
        
                                                    <div class="col-md">
                                                        <h4><strong>Ubicación</strong></h4>
                                                        <h5> {{ $extinguidor->ubicacion }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md">
                                                    <div class="half">
                                                        <h4><strong>Planta</strong></h4>
                                                        <h5> {{ $extinguidor->planta->nombre }}</h5> 
                                                    </div><hr>
                                                    
                                                    <div class="col-md">
                                                        <h4><strong>Estado</strong></h4>
                                                        @if($extinguidor->estado == 'false')
                                                            <h5>No</h5> 
                                                        @else
                                                            <h5>Si</h5> 
                                                        @endif
                                                    </div><hr>
                                                    
                                                    <div class="col-md">
                                                        <h4><strong>Precinto</strong></h4>
                                                        @if($extinguidor->precinto == 'false')
                                                            <h5>No</h5> 
                                                        @else
                                                            <h5>Si</h5> 
                                                        @endif
                                                    </div><hr>
        
                                                    <div class="col-md">
                                                        <h4><strong>Chaveta</strong></h4>
                                                        @if($extinguidor->chaveta == 'false')
                                                            <h5>No</h5> 
                                                        @else
                                                            <h5>Si</h5> 
                                                        @endif
                                                    </div><hr>
        
                                                    <div class="col-md">
                                                        <h4><strong>Percutado</strong></h4>
                                                        @if($extinguidor->estado == 'false')
                                                        <h5>No</h5> 
                                                    @else
                                                        <h5>Si</h5> 
                                                    @endif
                                                    </div><hr>

                                                    <div class="col-md">
                                                        <h4><strong>Acceso</strong></h4>
                                                        @if($extinguidor->acceso == 'false')
                                                        <h5>No</h5> 
                                                    @else
                                                        <h5>Si</h5> 
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row" style="width: 230px;">
                                    <div class="reviews">
                                      
                                    </div>
                                </div>
                            <div class="half">
                                <div class="description" style="width: 280px;">
                                    <h3><strong>Observaciones</strong></h3>
                                    <p>{{ $extinguidor->observaciones }}</p>
                                </div>
                            </div>
                            <a type="button" class="btn btn-secondary"
                                href="{{url('/extintor')}}">Atras</a>
                                
                            <button type="button" class="btn btn-success" onclick="printDiv('areaImprimir')" value="imprimir div">
                                <i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<script>
    function printDiv(nombreDiv) {
        var contenido = document.getElementById(nombreDiv).innerHTML;
        var contenidoOriginal = document.body.innerHTML;
        document.body.innerHTML = contenido;
        window.print();
        document.body.innerHTML = contenidoOriginal;
    }
</script>
<style>
    .mtform {
        width: 100%;
    }

    table {
        width: 100%;
    }

    h3 {
        margin-block-end: 0em !important;
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
        /* margin-bottom: 3.0rem !important; */
    }

    p,
    h4 {

        main {
            max-width: 720px;
            margin: 5% auto;
        }

        .card {
            box-shadow: 0 6px 6px rgba(#000, 0.3);
            transition: 200ms;
            background: #fff;

            .card__title {
                display: flex;
                align-items: center;
                padding: 30px 40px;

                h3 {
                    flex: 0 1 200px;
                    text-align: right;
                    margin: 0;
                    color: #252525;
                    font-family: sans-serif;
                    font-weight: 600;
                    font-size: 20px;
                    text-transform: uppercase;
                }

                .icon {
                    flex: 1 0 10px;
                    background: #115dd8;
                    color: #fff;
                    padding: 10px 10px;
                    transition: 200ms;

                    >a {
                        color: #fff;
                    }

                    &:hover {
                        background: #252525;
                    }
                }
            }

            .card__body {
                padding: 0 40px;
                display: flex;
                flex-flow: row no-wrap;
                margin-bottom: 25px;

                >.half {
                    box-sizing: border-box;
                    padding: 0 15px;
                    flex: 1 0 50%;
                }

                .featured_text {
                    h1 {
                        margin: 0;
                        padding: 0;
                        font-weight: 800;
                        font-family: "Montserrat", sans-serif;
                        font-size: 64px;
                        line-height: 50px;
                        color: #181e28;
                    }

                    p {
                        margin: 0;
                        padding: 0;

                        &.sub {
                            font-family: "Montserrat", sans-serif;
                            font-size: 26px;
                            text-transform: uppercase;
                            color: #686e77;
                            font-weight: 300;
                            margin-bottom: 5px;
                        }

                        &.price {
                            font-family: "Fjalla One", sans-serif;
                            color: #252525;
                            font-size: 26px;
                        }
                    }
                }

                .image {
                    padding-top: 15px;
                    width: 5%;

                    img {
                        display: block;
                        max-width: 0%;
                        height: auto;
                    }
                }

                .description {
                    margin-bottom: 25px;

                    p {
                        margin: 0;
                        font-family: "Open Sans", sans-serif;
                        font-weight: 300;
                        line-height: 27px;
                        font-size: 16px;
                        color: #555;
                    }
                }

                span.stock {
                    font-family: "Montserrat", sans-serif;
                    font-weight: 600;
                    color: #a1cc16;
                }

                .reviews {
                    .stars {
                        display: inline-block;
                        list-style: none;
                        padding: 0;

                        >li {
                            display: inline-block;

                            .fa {
                                color: #f7c01b;
                            }
                        }
                    }

                    >span {
                        font-family: "Open Sans", sans-serif;
                        font-size: 14px;
                        margin-left: 5px;
                        color: #555;
                    }
                }
            }

            .card__footer {
                padding: 30px 40px;
                display: flex;
                flex-flow: row no-wrap;
                align-items: center;
                position: relative;

                &::before {
                    content: "";
                    position: absolute;
                    display: block;
                    top: 0;
                    left: 40px;
                    width: calc(100% - 40px);
                    height: 3px;
                    background: #115dd8;
                    background: linear-gradient(to right, #115dd8 0%, #115dd8 20%, #ddd 20%, #ddd 100%);
                }

                .recommend {
                    flex: 1 0 10px;

                    p {
                        margin: 0;
                        font-family: "Montserrat", sans-serif;
                        text-transform: uppercase;
                        font-weight: 600;
                        font-size: 14px;
                        color: #555;
                    }

                    h3 {
                        margin: 0;
                        font-size: 20px;
                        font-family: "Montserrat", sans-serif;
                        font-weight: 600;
                        text-transform: uppercase;
                        color: #115dd8;
                    }
                }

                .action {
                    button {
                        cursor: pointer;
                        border: 1px solid #115dd8;
                        padding: 14px 30px;
                        border-radius: 200px;
                        color: #fff;
                        background: #115dd8;
                        font-family: "Open Sans", sans-serif;
                        font-size: 16px;
                        transition: 200ms;

                        &:hover {
                            background: #fff;
                            color: #115dd8;
                        }
                    }
                }
            }
        }

</style>
@endsection
