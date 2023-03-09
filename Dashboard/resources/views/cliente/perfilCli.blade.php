@extends('cliente.plantillaCli')

@section('contenido')


    <div class="container mt-5 col-md-6">

        <h1 class="display-1 text-center mb-5"> Actualizar Nombre </h1>

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
                Actualizar mi nombre
            </div>

            <div class="card-body">
            <form class="m-4" method="post" action=" {{route('perfilCli.update', $user = auth()->user()->id)}} ">
                @csrf

                {!! method_field('PUT')!!}
                <div class="mb-3">
                        <label class="form-label">Nombre y apellidos:</label>
                        <input type="text" class="form-control" name="name" value="{{$user = auth()->user()->name}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('name') }} </p>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary  m-1"> Actualizar nombre </button>
            </form>
            </div>

        </div>

    </div>

@stop
