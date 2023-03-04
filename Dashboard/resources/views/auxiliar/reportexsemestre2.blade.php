<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Reporte Tickets - Laravel Framework</title>
<style>
    table {
        font-famiy: arial, sans-serif;
        border-colapse: collapse;
        width: 100%
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #dddddd:
    }
</style>

</head>
<body>
<h2>Reporte ticekts asignados en el primer semestre</h2>

<div>
<table class="table table-borderless table-striped table-hover" >
            <thead>
              <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Clasificación</th>
		            <th scope="col">Detalles</th>
                    <th scope="col">Fecha de levantamiento</th>
                    <th scope="col">Respuesta</th>
                    <th scope="col">Status</th>
        		    <th scope="col">Observación</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($consultaSem2 as $consulta)
                <tr>
                    <th scope="row">{{$consulta->idTk}}</th>
                    <td>{{$consulta->autor_name}}</td>
                    <td>{{$consulta->departamento}}</td>
                    <td>{{$consulta->clasificacion}}</td>
                    <td>{{$consulta->detalles}}</td>
                    <td>{{$consulta->created_at}}</td>
                    <td>{{$consulta->respuesta}}</td>
                    <td>{{$consulta->status}}</td>
		            <td>{{$consulta->observacion}}</td>
              </tr>
            </tbody>
              @endforeach
          </table>
    </div>
</body>
</html>
