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

    <h1 class="display-1 mt-4 mb-4 text-center"> Tickets registrados </h1>

      <form action=" {{route('adminTic.index')}} ">
          <input type="search" placeholder="Buscar tickets..." name="filtrar" class="form-control">
            <button type="submit" class="btn btn-primary">
              <i class="bi bi-search"></i> Buscar </button>
      </form>
  
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
                  <th scope="col">Acción 1</th>
        		  <th scope="col">Acción 2</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($consultaTic as $consulta)
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
                    <td>
                    <button class="btn btn-warning" onclick="location.href=' {{route('asigTic.create')}} '">
                    <i class="bi bi-file-earmark-person"></i> Asignar Ticket
                    </button></td>
                    <td>
                    <button type="button" class="btn btn-danger" onclick="location.href=' {{route('adminTic.edit', $consulta->idTk)}} '">
                    <i class="bi bi-vector-pen"></i>  Realizar comentarios y observaciones
                    </button></td>
              </tr>
            </tbody> 
              @endforeach
          </table>


          <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir3'">
          <i class="bi bi-file-pdf"></i>  Generar Reporte
        </button>
        </div>
    </div>
    
@stop