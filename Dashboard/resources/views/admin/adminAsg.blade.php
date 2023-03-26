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

<div class="container">
<h1 class="display-4 text-center mt-4 mb-4">Asignaciones registradas</h1>
<div class="row justify-content-center mb-4">
    <div class="col-lg-6">
        <form action="{{route('adminAsg.index')}}">
            <div class="input-group">
                <input type="search" placeholder="Buscar una asignación..." name="filtrar" class="form-control">
                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form>
    </div>
</div>

<div class="row justify-content-center mb-4">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-hover">
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
                        <td>{{$consulta->idAsg}}</td>
                        <td>{{$consulta->encargado}}</td>
                        <td>{{$consulta->detalles}}</td>
                        <td>{{$consulta->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#" onclick="location.href='/imprimir4'">
            <i class="bi bi-file-pdf"></i>  Generar Reporte
        </button>
    </div>
</div>
</div>

@stop
