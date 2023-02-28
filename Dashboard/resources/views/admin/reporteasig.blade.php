<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Reporte Asignaciones - Laravel Framework</title>
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
<h2>Reporte de Asignaciones</h2>

<div>
<table class="table table-borderless table-striped table-hover" >
                  <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Encargado</th>
                          <th scope="col">Ticket</th>
                          <th scope="col">Fecha asignado</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($consultaAsg as $consulta)
                        <tr>
                            <th scope="row">{{$consulta->idAsg}}</th>  
                            <td>{{$consulta->encargado}}</td>         
                            <td>{{$consulta->detalles}}</td>
		            <td>{{$consulta->created_at}}</td>
                      </tr>
                    </tbody> 
                  @endforeach
    
        </table>
    </div> 
</body>
</html>