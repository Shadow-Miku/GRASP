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

        <div class="card  mb-5 fw-bold">

            <div class="card-header fw-bold">
                Actualizar Datos
            </div>

            <div class="card-body">
            <form class="m-4" method="post" action=" {{route('perfilAdmin.update', $user = auth()->user()->id)}} " enctype="multipart/form-data">
                @csrf

                {!! method_field('PUT')!!}
                <center>
                <img src="{{ auth()->user()->url }}" alt="hugenerd" width="250" class="rounded-circle">
                </center>

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
            </form>
            </div>

        </div>

    </div>

@stop
