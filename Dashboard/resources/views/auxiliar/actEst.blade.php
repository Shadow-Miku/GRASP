
@extends('auxiliar.plantillaAux')

@section('contenido')



    <div class="container mt-5 col-md-6">

        <h1 class="display-1 text-center mb-5"> Comentarios y cambio de estado del ticket </h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>

                @endforeach

            @endif

        <div class="card  mb-5 fw-bold">

            <div class="card-header fw-bold">
                Comentarios y observaciones del ticket
            </div>

            <div class="card-body">
            <form class="m-4" method="post" action="{{route('contrTic.update', $consultaId->idTk)}}">
                @csrf

                {!! method_field('PUT')!!}
                <div>
                    <div class="mb-3">
                        <label class="form-label">Comentario para el cliente:</label>
                        <input type="text" class="form-control" name="respuesta" value="{{$consultaId->respuesta}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('respuesta') }} </p>
                    </div>

                <div class="mb-3">
                        <label for="text" class="form-label">Status:</label>
                        <select class="form-select" name="status" value="{{old('status')}}" aria-label="Default select example">
                            <option disabled selected> Seleccione el status del ticket...</option>
                                <option value="Completado"> Completado </option>
                                <option value="Asignado"> Asignado </option>
				                <option value="En proceso"> En proceso </option>
                                <option value="Nunca solucionado"> Nunca solucionado </option>
				                <option value="Cancelado por el cliente"> Cancelado por el cliente </option>
                        </select>
                    <p class="text-primary fst-italic" style="color: aqua">
                        {{ $errors->first('status') }} </p>
                    </div>

            </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary  m-1"> Enviar comentarios y observaciones </button>
            </form>
            </div>

        </div>

    </div>

@stop
