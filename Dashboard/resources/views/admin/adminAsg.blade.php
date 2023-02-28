@extends('admin.plantillaAdmin')

@section('contenido')


@if (session()->has('actualizar'))
        {!!" <script> Swal.fire(
            'Siuuuuuuuu!',
            'Departamento fresco!',
            'success'
          ) </script>"!!}        
@endif

@if (session()->has('elimina'))
        {!!" <script> Swal.fire(
            'F',
            'El departamento murio',
            'success'
          ) </script>"!!}        
@endif

@if (session()->has('confirmacion'))
        {!!" <script> Swal.fire(
            'Siuuuuuuuu!',
            'Asignación registrada',
            'success'
          ) </script>"!!}        
    @endif

    <h1 class="display-1 mt-4 mb-4 text-center"> Asignaciones registradas </h1>

    <form action="{{route('adminAsg.index')}}">
      <input type="search" placeholder="Buscar una asiganción..." name="filtrar" class="form-control">
        <button type="submit" class="btn btn-primary">
          <i class="bi bi-search"></i> Buscar </button>
    </form>
  
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
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir4'">
          <i class="bi bi-file-pdf"></i>  Generar Reporte
        </button>
        </div>
    </div>
    
@stop