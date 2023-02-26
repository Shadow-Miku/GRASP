
@extends('admin.plantillaAdmin')

@section('contenido')

    @if (session()->has('confirmacion'))
        {!!" <script> Swal.fire(
            'Muy bien!',
            'Asignación Levantada Exitosamente',
            'success'
          ) </script>"!!}        
    @endif

    <div class="container mt-5 col-md-6">

        <h1 class="display-2 text-center mb-5"> Asignación de tickets a auxiliares </h1>

        <div class="card mb-5">

            <div class="card-header fw-bold">
                Seleccione quien se encargara de los casos
            </div>

            <div class="card-body">

                <form class="m-4" method="POST" action="{{route('asigTic.store')}}">
                    @csrf
                    <!--Errores individuales y guardar los datos escritos-->

                    <div class="mb-3">
                        <label class="form-label">Seleccione el encargado de este ticket:</label>
                        <select class="form-select" name="encargado" aria-label="Default select example">
                            <option disabled selected >Seleccione la opcion con su nombre</option>
                       
                            @foreach ($encargado as $users)
                            <option value="{{$users['id']}}">{{$users['name']}}</option>
                            @endforeach
                            
                        </select>
                    <p class="text-primary fst-italic" style="color: aqua"> 
                        {{ $errors->first('encargado') }} </p>
                    </div>
                    
                    <div class="mb-3">
                        <label for="text" class="form-label">Seleccione el ticket que gestionara: </label>
                            <select class="form-select" name="ticket" aria-label="Default select example">
                                <option disabled selected >Seleccione un caso</option>

                                @foreach ($ticket as $tickets)
                                    <option value="{{$tickets['idTk']}}">{{$tickets['detalles']}}</option>
                                @endforeach
                                
                            </select>
                        <p class="text-primary fst-italic" style="color: aqua"> 
                            {{ $errors->first('ticket') }} </p>
                        </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-success m-1"> Registrar Asignamiento </button>
            
            </form>

            </div>
        </div>
    </div>

    
@stop