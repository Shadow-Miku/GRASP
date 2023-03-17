<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Dashboard</title>


</head>

<body class="bg-blue">

<div>

<!--barra navegacion-->

<div class="container-fluid">

  <div class="row flex-nowrap">

      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">

          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

            <!--enlace /-->

              <a href="  " class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">

                  <span class="fs-5 d-none d-sm-inline">Cliente</span>

              </a>

              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                <!--enlace menu-->

                  <li class="nav-item">


                      <a href="  " class="nav-link align-middle px-0">

                          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"> Menu </span>
                      </a>

                  </li>

                  <!-- Menu de Tickets -->

                  <li>
                      <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">

                          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"> Tickets </span> </a>

                          <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">


                          <li>

                            <a href=" {{route('regTic.create')}}  " class="nav-link px-0"> <span class="d-none d-sm-inline"> &nbsp; &nbsp; Levantar Ticket </span> </a>

                          </li>

			   <li>

                            <a href=" {{route('consTic.indexCli')}} " class="nav-link px-0"> <span class="d-none d-sm-inline"> &nbsp; &nbsp; Mis tickets </span> </a>

                          </li>

                      </ul>
                  </li>

              </ul>

              <hr>

              <div class="dropdown pb-4">
                  <a href="  " class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="/img/D3LIPCdWAAAYCzW.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                      <span class="d-none d-sm-inline mx-1"> {{ auth()->user()->name }}  </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                      <!--<li><a class="dropdown-item" href="#">New project...</a></li>-->

                      <!--<li><a class="dropdown-item" href="#">Settings</a></li>-->

                      <li><a class="dropdown-item" href=" {{route('perfilCli.edit',$id = auth()->user()->id)}}  ">Perfil</a></li>

                      <li>

                          <hr class="dropdown-divider">

                      </li>

                      <li><a class="dropdown-item" href="/">Salir</a></li>

                  </ul>

              </div>

          </div>

      </div>

      <div class="col py-3">


        <!--  Contenido -->

        @yield('contenido')

      </div>

  </div>

</div>

<!--Termina Barra navegación-->

<!--Pie de Pagina-->

<!--Alertas-->

<div class="alert alert-success" role="alert">

  Macuin Dashboards.   <?php  echo date('Y');?> Copyrigth®

  <?php
  date_default_timezone_set('America/Mexico_City');

  $fechaActual = date('d/m/y h:i:s');

  echo "$fechaActual <br>";

  ?>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"> </script>

</body>

</html>
