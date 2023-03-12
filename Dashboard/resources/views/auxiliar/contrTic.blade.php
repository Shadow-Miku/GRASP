
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

    <h1 class="display-1 mt-4 mb-4 text-center"> Tickets registrados </h1>

    <form action=" {{route('contrTic.index')}} ">
        <input type="search" placeholder="Buscar tickets..." name="filtrar" class="form-control">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Buscar </button>
    </form>
    <br>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='{{route('mostrar-formulario')}}' ">
            <i class="bi bi-file-pdf"></i>  Generar reporte x fecha
        </button>

        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir7' ">
            <i class="bi bi-file-pdf"></i>  Generar reportes x departamento
        </button>

        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir8' ">
            <i class="bi bi-file-pdf"></i>  Generar reportes x status
        </button>

        <br>

        <br>
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
                    <th scope="col">Comunicación y cambio de estado</th>
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
                            @if ($consulta->status != 'Completado')
                                <button type="button" class="btn btn-light" onclick="location.href=' {{route('contrTic.edit', $consulta->idTk)}} '">
                                    <i class="bi bi-vector-pen"></i> Atender ticket
                                </button>
                            @else
                                <button type="button" class="btn btn-light" disabled>
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
