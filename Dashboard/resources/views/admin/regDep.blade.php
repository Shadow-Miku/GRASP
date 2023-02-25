@extends('admin.plantillaAdmin')

@section('contenido')

@if (session()->has('confirmacion'))
        {!!" <script> Swal.fire(
            'Muy bien!',
            'Departamento registrado',
            'success'
          ) </script>"!!}        
    @endif

    <div class="container mt-5 col-md-6">

        <h1 class="display-2 text-center mb-5">Departamentos</h1>

        <div class="card mb-5">

            <div class="card-header fw-bold">
                Registro de Departamentos
            </div>

            <div class="card-body">

                <form class="m-4" method="post" action="{{route('adminDep.store')}}">
                    @csrf
                    <!--Errores individuales y guardar los datos escritos-->

                    <div class="mb-3">
                        <label class="form-label">Nombre del departamento:</label>
                        <input type="text" class="form-control" name="departamento" value="{{old('departamento')}}">
                        <p class="text-primary fst-italic"> {{ $errors->first('departamento') }} </p>
                    </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-success m-1"> Registrar Departamento </button>
            
            </form>

            </div>
        </div>
    </div>

    
@stop