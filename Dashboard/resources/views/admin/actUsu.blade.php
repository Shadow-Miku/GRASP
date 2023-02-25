@extends('admin.plantillaAdmin')

@section('contenido')



    <div class="container mt-5 col-md-6">

        <h1 class="display-1 text-center mb-5"> Actualizar Datos del usuario </h1>

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
                Actualizar info del usuario
            </div>

            <div class="card-body">
            <form class="m-4" method="post" action=" {{route('adminUsu.update', $consultaId->id)}} ">    
                @csrf

                {!! method_field('PUT')!!}
                <div class="mb-3">
                        <label class="form-label">Nombre y apellidos:</label>
                        <input type="text" class="form-control" name="name" value="{{$consultaId->name}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('name') }} </p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Correo Electronico:</label>
                        <input type="email" class="form-control"  name="email" value="{{$consultaId->email}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('email') }} </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Usuario:</label>
                        <input type="text" class="form-control" name="username" value="{{$consultaId->username}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('username') }} </p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña:</label>
                        <input type="text" class="form-control" name="password" value="{{$consultaId->password}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('password') }} </p>
                    </div>
		
		    <div class="mb-3">
                        <label for="text" class="form-label">Roles:</label>
                        <select class="form-select" name="roll" value="{{old('roll')}}" aria-label="Default select example">
                            <option disabled selected> Seleccione el roll del usuario...</option>
                                <option value="Auxiliar">Auxiliar</option>
                                <option value="Cliente">Cliente</option>
                        </select>
                    <p class="text-primary fst-italic" style="color: aqua"> 
                        {{ $errors->first('roll') }} </p>
                    </div>

                    
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary  m-1"> Actualizar datos </button>
            </form>
            </div>

        </div>

    </div>

@stop