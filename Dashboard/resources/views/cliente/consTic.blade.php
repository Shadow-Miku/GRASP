@extends('cliente.plantillaCli')

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
<h1 class="display-4 text-center mt-4 mb-4">Tickets registrados</h1>
<div class="row justify-content-center mb-4">
    <div class="col-lg-6">
        <form action="{{route('consTic.indexCli')}}">
            <div class="input-group">
                <input type="search" placeholder="Buscar tickets..." name="filtrar" class="form-control">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-hover table-striped">
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
          <th>Acción 1</th>
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
            <td>
              @if ($consulta->status == 'Pendiente' || $consulta->status == 'Cancelado' || $consulta->status == 'Asignado')
                <button class="btn btn-warning" onclick="location.href='  '">
                  <i class="bi bi-file-earmark-person"></i> Cancelar Ticket
                </button>
              @else
                <button type="button" class="btn btn-warning" disabled>
                  <i class="bi bi-file-earmark-person"></i> Cancelar Ticket
                </button>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>


@stop






