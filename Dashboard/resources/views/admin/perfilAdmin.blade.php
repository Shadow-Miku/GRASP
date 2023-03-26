@extends('admin.plantillaAdmin')
@section('contenido')

<div class="container mt-5 col-md-6">

    @if ($errors->any())
    @foreach ($errors->all() as $error)

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ $error }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    @endforeach
    @endif

    <div class="card border-primary mb-5">
        <div class="card-header bg-primary text-white fw-bold">
            Actualizar Datos
        </div>

        <div class="card-body">
            <form class="m-4" method="post" action="{{route('perfilAdmin.update', $user = auth()->user()->id)}}" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT')!!}

                <div class="d-flex flex-column align-items-center">
                    <img src="{{ auth()->user()->url }} " alt="Profile Picture" width="300" height="300" class="rounded-circle mb-3">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombre y apellidos:</label>
                    <input type="text" class="form-control" name="name" value="{{$user = auth()->user()->name}}">
                    <p class="text-primary fst-italic"> {{ $errors->first('name') }} </p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen de perfil</label>
                    <input class="form-control" type="file" name="fotoadm" accept="image/*">
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary  m-1"> Actualizar Datos </button>
            <a href="{{route('priAdm')}}" class="btn btn-warning">No, hacer nada </a>
            </form>
        </div>
    </div>

@stop
