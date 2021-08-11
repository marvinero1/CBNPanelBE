<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte Extinguidores QRCBN</title>
   
    <style>
       @page {
            margin: 0cm 0cm;
        }

        body {
            margin: 3cm 2cm 2cm;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 110%;
        }
        th, td {
            text-align: left;
            padding: 10px;
        }
        tr:nth-child(even){background-color: #d3d1d1}

        th {
        background-color: #183e77;
        color: white;
        }           
        .th-red{
            background-color: red;
            color: black;
        }
        .th-green{
            background-color: green;
            color: white;
        }
        header {
            font-size: 2em;
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #183e77;
            color: white;
            text-align: center;
            line-height: 20px;
        }
    </style>
</head>
<body>
    <header>
        <br>
        <p><strong>EXTINTORES QRCBN</strong></p>
    </header>
    <main>
        <div class="container">
            <h5 class="th-green">Extintores Buenos</h5>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        {{-- <th scope="col" class="text-center">Id</th> --}}
                        <th scope="col" class="text-center" style="text-align:center;">Codigo</th>
                        <th scope="col" class="text-center">Tipo</th>
                        <th scope="col" class="text-center">Planta</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Precinto</th>
                        <th scope="col" class="text-center">Presurizado</th>
                        <th scope="col" class="text-center">Chaveta</th>
                        <th scope="col" class="text-center">Percutado</th>
                        <th scope="col" class="text-center">Acceso</th>
                        <th scope="col" class="text-center">Fecha Recarga</th>
                        <th scope="col" class="text-center">Fecha Prox. Recarga</th>

                    </tr>
                </thead>
               <tbody>
                    @foreach($extinguidor as $extinguidors)
                    <tr>
                        {{-- <td>{{ $extinguidors->id }}</td> --}}
                        <td>{{ $extinguidors->codigo }}</td>
                        <td>{{ $extinguidors->tipo }}</td>
                        <td>{{ $extinguidors->planta->nombre }}</td>
                        <td>{{ $extinguidors->estado }}</td>
                        <td>{{ $extinguidors->precinto }}</td>
                        <td>{{ $extinguidors->presurizado }}</td> 
                        <td>{{ $extinguidors->chaveta }}</td>                    
                        <td>{{ $extinguidors->percutado }}</td>                    
                        <td>{{ $extinguidors->acceso }}</td>                    
                        <td>{{ $extinguidors->fecha_recarga }}</td>                    
                        <td>{{ $extinguidors->fecha_prox_recarga }}</td>                    

                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container">
                <h5 class="th-red">Extintores Malos</h5>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            {{-- <th scope="col" class="text-center" class="">Id</th> --}}
                            <th scope="col" class="text-center">Codigo</th>
                            <th scope="col" class="text-center">Tipo</th>
                            <th scope="col" class="text-center">Planta</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">Precinto</th>
                            <th scope="col" class="text-center">Presurizado</th>
                            <th scope="col" class="text-center">Chaveta</th>
                            <th scope="col" class="text-center">Percutado</th>
                            <th scope="col" class="text-center">Acceso</th>
                            <th scope="col" class="text-center">Fecha Recarga</th>
                            <th scope="col" class="text-center">Fecha Prox. Recarga</th>
                        </tr>
                    </thead>
                   <tbody>
                    @foreach($extinguidorMalo as $extinguidorMalos)
                    <tr>
                       
                        {{-- <td>{{ $extinguidorMalos->id }}</td> --}}
                        <td>{{ $extinguidorMalos->codigo }}</td>
                        <td>{{ $extinguidorMalos->tipo }}</td>
                        <td>{{ $extinguidorMalos->planta->nombre }}</td>
                        <td>{{ $extinguidorMalos->estado }}</td>
                        <td>{{ $extinguidorMalos->precinto }}</td>
                        <td>{{ $extinguidorMalos->presurizado }}</td> 
                        <td>{{ $extinguidorMalos->chaveta }}</td>                    
                        <td>{{ $extinguidorMalos->percutado }}</td>                    
                        <td>{{ $extinguidorMalos->acceso }}</td> 
                        <td>{{ $extinguidorMalos->fecha_recarga }}</td>                    
                        <td>{{ $extinguidorMalos->fecha_prox_recarga }}</td>  
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
