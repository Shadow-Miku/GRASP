@extends('cliente.plantillaCli')

@section('contenido')
@if (session()->has('confirmacion'))
<script>
    Swal.fire(
        'Muy bien!',
        'Ticket Levantado Exitosamente',
        'success'
    );
</script>
@endif

<div class="container mt-5 col-md-6">
    <h1 class="display-2 text-center mb-5"> Levantamiento de ticket </h1>
    <div class="card mb-5">
        <div class="card-header fw-bold">
            Ticket de {{ $user = auth()->user()->name }}
        </div>
        <div class="card-body">
            <form class="m-4" method="POST" action="{{route('regTic.store')}}">
                @csrf
                <!-- Errores individuales y guardar los datos escritos -->
                <div class="mb-3" hidden>
                    <label class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="autor" value="{{ $user = auth()->user()->id }}">
                    <p class="text-primary fst-italic"> {{ $errors->first('autor') }} </p>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Seleccione el departamento en el que está: </label>
                    <select class="form-select" name="departamento" aria-label="Default select example">
                        <option disabled selected>Seleccione un departamento</option>
                        @foreach ($ConsultaD as $departamentos)
                        <option value="{{ $departamentos['idDep'] }}">{{ $departamentos['departamento'] }}</option>
                        @endforeach
                    </select>
                    <p class="text-primary fst-italic" style="color: aqua">
                        {{ $errors->first('departamento') }}
                    </p>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">Problema:</label>
                    <select class="form-select" name="clasificacion" value="{{ old('clasificacion') }}"
                        aria-label="Default select example">
                        <option disabled selected>Seleccione uno de los siguientes problemas...</option>
                        <option value="Falla de Office">Falla de Office</option>
                        <option value="Fallas en la red">Fallas en la red</option>
                        <option value="Errores de software">Errores de software</option>
                        <option value="Errores de Hardware">Errores de Hardware</option>
                        <option value="Mantenimientos Preventivos">Mantenimientos Preventivos</option>
                        <option value="Otro">Otro</option>
                    </select>
                    <p class="text-primary fst-italic" style="color: aqua">
                        {{ $errors->first('clasificacion') }}
                    </p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Detalles de la problematica:</label>
                    <input type="text" class="form-control" name="detalles" value="{{ old('detalles') }} ">
                    <p class="text-primary fst-italic"> {{ $errors->first('detalles') }} </p>
                </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success m-1"> Levantar Ticket </button>
        </div>
        </form>
    </div>
</div>
@stop
