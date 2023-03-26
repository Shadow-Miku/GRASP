
@extends('auxiliar.plantillaAux')

@section('contenido')

<div class="container mt-5 col-md-6">
    <h1 class="display-1 text-center mb-5"> Cancelar Ticket </h1>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    @endif

    <div class="card  mb-5 fw-bold">
        <div class="card-header fw-bold"></div>

        <div class="card-body">
            <form class="m-4" method="post" action="{{route('cancelarTicket.update', $consultaId->idTk)}}">
                @csrf
                {!! method_field('PUT')!!}

                <div class="mb-3">
                    <label for="text" class="form-label">Status:</label>
                    <select class="form-select" name="status" id="status" value="{{old('status')}}" aria-label="Default select example">
                        <option disabled selected> Seleccione el status del ticket...</option>
                        <option value="Cancelado por el cliente"> Cancelado por el cliente </option>
                    </select>
                    <p class="text-primary fst-italic" style="color: aqua">{{ $errors->first('status') }}</p>
                </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary  m-1"> Cancelar mi ticket </button>
            <a href="{{route('consTic.indexCli')}}" class="btn btn-warning">No, hacer nada </a>
        </div>
        </form>
    </div>
</div>


@stop

