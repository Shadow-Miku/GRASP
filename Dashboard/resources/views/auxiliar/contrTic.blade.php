@extends('auxiliar.plantillaAux')

@section('contenido')

@if (session()->has('actualizar'))
    {!!" <script> Swal.fire(
        'Siuuuuuuuu!',
        'Ticket actualizado',
        'success'
    ) </script>"!!}
@endif

@if (session()->has('elimina'))
    {!!" <script> Swal.fire(
        'F',
        'Ticket eliminado',
        'success'
    ) </script>"!!}
@endif

@if (session()->has('confirmacion'))
    {!!" <script> Swal.fire(
        'Siuuuuuuuu!',
        'Ticket registrado',
        'success'
    ) </script>"!!}
@endif

<div class="container">
<h1 class="display-4 text-center mt-4 mb-4">Tickets Registrados</h1>
<div class="row justify-content-center mb-4">
    <div class="col-lg-6">
        <form action="{{route('contrTic.index')}}">
            <div class="input-group">
                <input type="search" placeholder="Buscar tickets..." name="filtrar" class="form-control">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form>
    </div>
</div>

<div class="row mb-4">
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='{{route('mostrar-formulario')}}' ">
                <i class="bi bi-file-pdf"></i> Generar reporte por fecha
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir7' ">
                <i class="bi bi-file-zip"></i> Generar reporte por departamento
            </button>
        </div>
        <div class="col">
            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir8' ">
                <i class="bi bi-file-zip"></i> Generar reporte por status
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Autor</th>
                    <th>Departamento</th>
                    <th>Clasificación</th>
                    <th>Detalles</th>
                    <th>Fecha de levantamiento</th>
                    <th>Respuesta</th>
                    <th>Status</th>
                    <th>Observación</th>
                    <th>Comunicación y cambio de estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultaTic as $consulta)
                <tr>
                    <td>{{$consulta->idTk}}</td>
                    <td>{{$consulta->autor_name}}</td>
                    <td>{{$consulta->departamento}}</td>
                    <td>{{$consulta->clasificacion}}</td>
                    <td>{{$consulta->detalles}}</td>
                    <td>{{$consulta->created_at}}</td>
                    <td>{{$consulta->respuesta}}</td>
                    <td>{{$consulta->status}}</td>
                    <td>{{$consulta->observacion}}</td>
                    <td>
                        @if ($consulta->status == 'Completado' || $consulta->status == 'Cancelado por el cliente'|| $consulta->status == 'Nunca solucionado')
                        <button type="button" class="btn btn-light" disabled>
                            <i class="bi bi-vector-pen"></i> Atender ticket
                        </button>
                        @else
                        <button type="button" class="btn btn-light" onclick="location.href='{{route('contrTic.edit', $consulta->idTk)}}'">
                            <i class="bi bi-vector-pen"></i> Atender ticket
                        </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
