@extends('admin.plantillaAdmin')

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
        <form action="{{route('adminTic.index')}}">
            <div class="input-group">
                <input type="search" placeholder="Buscar tickets..." name="filtrar" class="form-control">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Autor</th>
            <th>Departamento</th>
            <th>Clasificación</th>
            <th>Detalles</th>
            <th>Fecha de levantamiento</th>
            <th>Respuesta</th>
            <th>Estado</th>
            <th>Observaciones</th>
            <th>Acción 1</th>
            <th>Acción 2</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($consultaTic as $consulta)
          <tr>
            <td>{{ $consulta->idTk }}</td>
            <td>{{ $consulta->autor_name }}</td>
            <td>{{ $consulta->departamento }}</td>
            <td>{{ $consulta->clasificacion }}</td>
            <td>{{ $consulta->detalles }}</td>
            <td>{{ $consulta->created_at }}</td>
            <td>{{ $consulta->respuesta }}</td>
            <td>{{ $consulta->status }}</td>
            <td>{{ $consulta->observacion }}</td>
            <td>
              @if ($consulta->status == 'Completado' || $consulta->status == 'Cancelado')
              <button type="button" class="btn btn-warning" disabled>
                <i class="bi bi-file-earmark-person"></i> Asignar Ticket
              </button>
              @else
              <button class="btn btn-warning" onclick="location.href='{{ route('asigTic.create') }}'">
                <i class="bi bi-file-earmark-person"></i> Asignar Ticket
              </button>
              @endif
            </td>
            <td>
              <button class="btn btn-danger" onclick="location.href='{{ route('adminTic.edit', $consulta->idTk) }}'">
                <i class="bi bi-vector-pen"></i> Realizar comentarios y observaciones
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

<div class="d-flex justify-content-end mb-4">
      <button class="btn btn-outline-success" onclick="location.href='/imprimir3'">
        <i class="bi bi-file-pdf"></i> Generar Reporte
      </button>
    </div>
</div>

@stop
