<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reporte de tickets asignados por departamento</title>
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
	<h2>Reporte de tickets asignados por departamento</h2>
	<table>
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
			@foreach($consultaxDep as $consulta)
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
			@endforeach
		</tbody>
	</table>
</body>
</html>
