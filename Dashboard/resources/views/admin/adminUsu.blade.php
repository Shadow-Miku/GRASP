@extends('admin.plantillaAdmin')

@section('contenido')

@if (session()->has('actualizar'))
    {!!" <script> Swal.fire(
        'Siuuuuuuuu!',
        'Usuario actualizado',
        'success'
    ) </script>"!!}
@endif

@if (session()->has('elimina'))
    {!!" <script> Swal.fire(
        'F',
        'Usuario eliminado',
        'success'
    ) </script>"!!}
@endif

@if (session()->has('confirmacion'))
    {!!" <script> Swal.fire(
        'Siuuuuuuuu!',
        'Usuario registrado',
        'success'
    ) </script>"!!}
@endif

<div class="container">
<h1 class="display-4 text-center mt-4 mb-4">Usuarios registrados</h1>
<div class="row justify-content-center mb-4">
    <div class="col-lg-6">
        <form action="{{route('adminUsu.index')}}">
            <div class="input-group">
                <input type="search" placeholder="Buscar usuario..." name="filtrar" class="form-control">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form>
    </div>
</div>

    <div class="container my-5">
      <button class="btn btn-success" onclick="location.href='{{ route('adminUsu.create') }}'">
        <i class="bi bi-plus"></i> Registrar otro usuario
      </button>

      <table class="table table-borderless table-striped table-hover mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Foto</th>
            <th scope="col">Email</th>
            <th scope="col">Usuario</th>
            <th scope="col">Rol</th>
            <th scope="col">Modificar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($consultaUsu as $consulta)
            <tr>
              <th scope="row">{{ $consulta->id }}</th>
              <td>{{ $consulta->name }}</td>
              <td><img src="{{ $consulta->url }}" alt="Foto del usuario" width="100"></td>
              <td>{{ $consulta->email }}</td>
              <td>{{ $consulta->username }}</td>
              <td>{{ $consulta->roll }}</td>
              <td hidden>
                @if($consulta->roll == 'cliente')
                  Cliente
                @elseif($consulta->roll == 'auxiliar')
                  Auxiliar
                @else
                  Sin rol
                @endif
              </td>
              <td>
                <button class="btn btn-warning" onclick="location.href='{{ route('adminUsu.edit', $consulta->id) }}'">
                  <i class="bi bi-pen"></i> Actualizar datos del {{ $consulta->roll }}
                </button>
              </td>

              <td>
                @if ($consulta->roll == 'Cliente' || $consulta->roll == 'Auxiliar' )
                <button type="button" class="btn btn-danger" onclick="location.href='{{ route('adminUsu.show', $consulta->id) }}'">
                  <i class="bi bi-trash2"></i> Dar de baja {{ $consulta->roll }}
                </button>
                @else
                <button type="button" class="btn btn-danger" disabled>
                  <i class="bi bi-trash2"></i> Dar de baja {{ $consulta->roll }}
                </button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir'">
        <i class="bi bi-file-pdf"></i> Generar Reporte
      </button>
    </div>
  </div>

@stop
