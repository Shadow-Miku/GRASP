




@extends('admin.plantillaAdmin')

@section('contenido')



    <div class="container mt-5 col-md-6">

        <h1 class="display-1 text-center mb-5"> Comentarios y observaciones al ticket </h1>

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
            <form class="m-4" method="post" action="{{route('adminTic.update', $consultaId->idTk)}}">    
                @csrf

                {!! method_field('PUT')!!}
                <div>
                    <div class="mb-3">
                        <label class="form-label">Comentario para el cliente:</label>
                        <input type="text" class="form-control" name="respuesta" value="{{$consultaId->respuesta}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('respuesta') }} </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Observaciones al auxiliar:</label>
                        <input type="text" class="form-control" name="observacion" value="{{$consultaId->observacion}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('observacion') }} </p>
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