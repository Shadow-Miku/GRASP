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

    <h1 class="display-1 mt-4 mb-4 text-center"> Usuarios registrados </h1>

      <form action=" {{route('adminUsu.index')}} ">
          <input type="search" placeholder="Buscar usuario..." name="filtrar" class="form-control">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-pen"></i> Buscar usuario </button>
      </form>
    
      <div class="container mb-5 mt-5  gap-2">
        <button  class="btn btn-success"  onclick="location.href=' {{route('adminUsu.create')}} '">
          <i class="bi bi-plus"></i>  Registrar otro usuario
        </button> 
  
          <table class="table table-borderless table-striped table-hover" >
            <thead>
              <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Email</th>
                  <th scope="col">Usuario</th>
		              <th scope="col">roll</th>
                  <th scope="col">Modificar</th>
                  <th scope="col">Eliminar</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($consultaUsu as $consulta)
                <tr>
                    <th scope="row">{{$consulta->id}}</th>  
                    <td>{{$consulta->name}}</td> 
                    <td>{{$consulta->email}}</td> 
                    <td>{{$consulta->username}}</td>
                    <td>{{$consulta->roll}}</td>  
                    <td hidden>@if($consulta->roll == 'cliente')
                          Cliente
                        @elseif($consulta->roll == 'auxiliar')
                          Auxiliar
                        @else
                          Sin rol
                        @endif</td>
                    <td>
                      <button class="btn btn-warning" onclick="location.href=' {{route('adminUsu.edit', $consulta->id)}} '">
                    <i class="bi bi-pen"></i> Actualizar datos del {{$consulta->roll}}
                    </button></td>
                    <td>
                    <button type="button" class="btn btn-danger" onclick="location.href=' {{route('adminUsu.show', $consulta->id)}}  '">
                    <i class="bi bi-trash2"></i>  Dar de baja {{$consulta->roll}}
                    </button></td>
              </tr>
            </tbody> 
              @endforeach
          </table>
          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='  '">
          <i class="bi bi-file-pdf"></i>  Generar Reporte
        </button>
        </div>
    </div>
    
@stop
