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

              <a href=" # " class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">

                  <span class="fs-5 d-none d-sm-inline">Jefe de soporte</span>

              </a>

              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                <!--enlace menu-->

                  <li class="nav-item">


                      <a href=" {{route('priAdm')}} " class="nav-link align-middle px-0"> 

                          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"> Menu </span>
                      </a>

                  </li>

                  <!-- Menu de registros -->

                  <li>
                      <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">

                          <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline"> Registrar </span> </a>

                          <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">

                          <li>

                            <a href=" {{route('adminUsu.create')}} " class="nav-link px-0"> <span class="d-none d-sm-inline"> &nbsp; &nbsp; Registrar usuarios </span> </a>

                          </li>

                          <li class="w-100">

                              <a href=" {{route('adminDep.create')}} " class="nav-link px-0"> <span class="d-none d-sm-inline"> &nbsp; &nbsp; Registrar departamentos </span> </a>

                          </li>

                      </ul>
                  </li>

        
                 
                  <!-- submenu de administración -->

                  <li>

                      <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">

                          <i i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline"> Administración </span> </a>

                          <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">

                          <li class="w-100">

                              <a href=" {{route('adminUsu.index')}} " class="nav-link px-0"> <span class="d-none d-sm-inline"> &nbsp; &nbsp; Administrar usuarios </span> </a>

                          </li>


                          <li>

                              <a href=" {{route('adminDep.index')}} " class="nav-link px-0"> <span class="d-none d-sm-inline"> &nbsp; &nbsp; Administrar departamentos </span> </a>

                          </li>

                          <li>

                              <a href=" {{route('adminTic.index')}} " class="nav-link px-0"> <span class="d-none d-sm-inline"> &nbsp; &nbsp; Administrar tickets </span> </a>

                          </li>

                      </ul>

                  </li>

              </ul>

              <hr>

              <!--enlace testeo tickets-->

              <li>
                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">

                    <i class="bi bi-fullscreen"></i> <span class="ms-1 d-none d-sm-inline">Testeo tickets</span> </a>

                    <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">

                    <li>

                      <a href="" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp; &nbsp; Registrar Ticket</span> </a>

                    </li>

                    <li class="w-100">

                      <a href="" class="nav-link px-0"> <span class="d-none d-sm-inline">&nbsp; &nbsp; Vista ticket auxiliar</span> </a>

                    </li>

                </ul>

            </li>

              <div class="dropdown pb-4">
                  <a href="  " class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="https://avatars.githubusercontent.com/u/108553512?v=4" alt="hugenerd" width="30" height="30" class="rounded-circle">
                      <span class="d-none d-sm-inline mx-1"> Jefe soporte </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                      <!--<li><a class="dropdown-item" href="#">New project...</a></li>-->

                      <!--<li><a class="dropdown-item" href="#">Settings</a></li>-->

                      <li><a class="dropdown-item" href="">Perfil</a></li>

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