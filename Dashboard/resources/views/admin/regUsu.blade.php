@extends('admin.plantillaAdmin')

@section('contenido')

    @if (session()->has('confirmacion'))
        {!!" <script> Swal.fire(
            'Muy bien!',
            'Usuario registrado',
            'success'
          ) </script>"!!}
    @endif

    <div class="container mt-5 col-md-6">

        <h1 class="display-2 text-center mb-5"> Usuarios </h1>

        <div class="card mb-5">

            <div class="card-header fw-bold">
                Levantamiento de Usuarios
            </div>

            <div class="card-body">

                <form class="m-4" method="post" action="{{route('adminUsu.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!--Errores individuales y guardar los datos escritos-->

                    <div class="mb-3">
                        <label class="form-label">Nombre y apellidos:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('name') }} </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo Electronico:</label>
                        <input type="email" class="form-control"  name="email" value="{{old('email')}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('email') }} </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Usuario:</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('username') }} </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña:</label>
                        <input type="text" class="form-control" name="password" value="{{old('password')}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('password') }} </p>
                    </div>

		    <div class="mb-3">
                        <label for="text" class="form-label">Roles:</label>
                        <select class="form-select" name="roll" value="{{old('roll')}}" aria-label="Default select example">
                            <option disabled selected> Seleccione el roll del usuario...</option>
                                <option value="Auxiliar">Auxiliar</option>
                                <option value="Cliente">Cliente</option>
                                <option value="Cliente">Admin</option>
                        </select>
                    <p class="text-primary fst-italic" style="color: aqua">
                        {{ $errors->first('roll') }} </p>
                    </div>
                <div class="mb-3">
                    <label class="form-label">Imagen de perfil</label>
                    <input class="form-control" type="file" name="file" accept="image/*" required>
                </div>


            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-success m-1"> Registrar usuario </button>

            </form>

            </div>
        </div>
    </div>


@stop
