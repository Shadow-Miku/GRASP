<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>Reporte Departamentos - Laravel Framework</title>
    <style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even){background-color: #f2f2f2}

		th {
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>
<h2>Reporte de Departamentos</h2>

<div>
<table class="table table-borderless table-striped table-hover" >
                  <thead>
                      <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nombre del Departamento</th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($consultaDep as $consulta)
                        <tr>
                            <th scope="row">{{$consulta->idDep}}</th>
                            <td>{{$consulta->departamento}}</td>
                      </tr>
                    </tbody>
                  @endforeach

        </table>
    </div>
</body>
</html>
