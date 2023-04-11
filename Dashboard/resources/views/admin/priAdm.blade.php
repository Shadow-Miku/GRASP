@extends('admin.plantillaAdmin')

@section('contenido')

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            /* Estilo CSS para la imagen */
            img {
                opacity: 0.9; /* Transparencia */
            }

            /* Estilo CSS para el contenedor */
            .container {
                width: 100%;
                max-width: 800px; /* Ancho máximo de la imagen */
                margin: 0 auto; /* Alinear al centro */
                text-align: center; /* Alinear contenido al centro */
            }
        </style>

    </head>

    <body style="text-align: center;">
        <h1 align="center"> Bienvenid@ {{ auth()->user()->name }}  </h1> <br>

        <div class="container">
            <img src="{{ asset('/img/Miproyecto.png') }}" width="800" height="800">
        </div>

    </body>

</html>


@stop
