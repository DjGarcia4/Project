<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <title>Planilla de Pagos</title>
  <!-- FUENTES-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
    rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="../css/estilo.css" rel="stylesheet">
  <link href="../css/style1.css" rel="stylesheet">
  <link href="../css/style2.0.css" rel="stylesheet">
  <link rel="icon" href="../img/Moneda.png">
</head>

<body id="page-top">

  <?php
  $Usuario = $_GET['idUsuario'];
  $Empresa = $_GET['Empresas_idEmpresas'];

  include '../SqlTools/database.php';
  $auxiliar = new database();
  $auxiliar->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $auxiliar->sql;
  $name = mysqli_fetch_assoc($nombre); ?>

  <div id="wrapper">
    <!-- Envoltura de página -->

    <!-- barra lateral -->
    <?php include "../SqlTools/serviceMenu.php"; ?>
    <!-- Fin de la barra lateral -->

    <!-- Envoltorio de contenido -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main contenido -->
      <div id="content">

        <!-- Barra superior -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-0 static-top shadow">

          <!-- Alternar barra lateral (barra superior) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-1">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Barra superior Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - Información del usuario -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name['Usuario']; ?></span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
              </a>
              <!-- Desplegable - Información del usuario -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a> -->
                <a class="dropdown-item"
                  href="../Login/cambioContra.php?idUsuario=<?php echo $Usuario; ?>&Empresas_idEmpresas=<?php echo $Empresa; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-replace" width="16"
                    height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <rect x="3" y="3" width="6" height="6" rx="1" />
                    <rect x="15" y="15" width="6" height="6" rx="1" />
                    <path d="M21 11v-3a2 2 0 0 0 -2 -2h-6l3 3m0 -6l-3 3" />
                    <path d="M3 13v3a2 2 0 0 0 2 2h6l-3 -3m0 6l3 -3" />
                  </svg>
                  Cambio de contraseña
                </a>
                <a class="dropdown-item"
                  href="../Usuarios/formUsuarios.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>&action=1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="16"
                    height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 11h6m-3 -3v6" />
                  </svg>
                  Crear Usuario
                </a>
                <a class="dropdown-item"
                  href="../Usuarios/TablaUsuarios.php?idUsuario=<?php echo $Usuario; ?>&Empresas_idEmpresas=<?php echo $Empresa; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="16"
                    height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                  </svg>
                  Mostrar usuarios
                </a>
                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividad
                                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-enter" width="16"
                    height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M13 12v.01" />
                    <path d="M3 21h18" />
                    <path d="M5 21v-16a2 2 0 0 1 2 -2h6m4 10.5v7.5" />
                    <path d="M21 7h-7m3 -3l-3 3l3 3" />
                  </svg>
                  Cerrar Sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- Fin de la barra superior -->
        <!--============================Intro Section============================-->
        <div class="contex">
          <section id="intro" class="clearfix">
            <div class="container">

              <div class="intro-img">
                <img src="../img/imgi/intro-img.svg" alt="" class="img-fluid">
              </div>

              <div class="intro-info">
                <h2>Bienvenido a <br><span>COPAP</span><br>¿Listo para comenzar?</h2>
                <div>
                  <a href="#services" class="btn-services scrollto">Servicios</a>
                  <a href="#portfolio" class="btn-services scrollto">Galeria</a>
                  <a href="../Manual-del-Usuario.html" target="_blank" class=" btn-services scrollto"">Manual</a>
                </div>
              </div>

                </div>
          </section><!-- #intro -->

          <!-- #intro -->
          <main id=" main">
                    <!--OPCIONES-->
                    <section id="services" class="section-bg">
                      <div class="container">

                        <header class="section-header">
                          <h3>¿Necesitas ayuda para usar COPAP?</h3>
                          <p>Conoce mas sobre </p>
                          <p></p>
                        </header>
                        <br></br>
                        <br></br>
                        <div class="row">

                          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
                            <div class="box">
                              <div class="icon"><i class="ion-ios-paper-outline" style="color: #c5793ae0;;"></i></div>
                              <h4 class="title"><a
                                  href="../Planilla/historialPlanillas.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>">Planillas
                                  de pago</a></h4>
                              <p class="description"> Accede al registro almacenado de tus planillas de pago. </p>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
                            <div class="box">
                              <div class="icon"><i class="ion-ios-paper-outline" style="color: #e9bf06;"></i></div>
                              <h4 class="title"><a
                                  href="../Planilla/creacionPlanilla.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>">Crear
                                  Nueva Planilla</a></h4>
                              <p class="description">Generar una nueva planilla de pago es mucho mas facil de lo que te
                                imaginas
                              </p>
                            </div>
                          </div>

                          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s"
                            data-wow-duration="1.4s">
                            <div class="box">
                              <div class="icon"><i class="ion-man" style="color: #c5793ae0;"></i></div>
                              <h4 class="title"><a
                                  href="../Empleados/tablas.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>">Empleados</a>
                              </h4>
                              <p class="description">Accede al registro de tus empleados de forma, facil, rapida y sobre
                                todo
                                eficiente</p>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                            <div class="box">
                              <div class="icon"><i class="ion-woman" style="color:#c5793ae0;"></i></div>
                              <h4 class="title"><a
                                  href="../Empleados/crearEmpleado.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>">Agregar
                                  un Nuevo Empleado</a></h4>
                              <p class="description">¡Tu compañia cada dìa crece màs! ingresa la informaciòn del nuevo
                                integrante de tu grupo de empleados</p>
                            </div>
                          </div>

                          <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s"
                            data-wow-duration="1.4s">
                            <div class="box">
                              <div class="icon"><i class="ion-more" style="color: #c5793ae0;"></i></div>
                              <h4 class="title"><a
                                  href="../Cargos/TablaCargos.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>">Cargos</a>
                              </h4>
                              <p class="description">Accede a la informaciòn de los distintos cargos con los que cuenta
                                tu
                                empresa</p>
                            </div>
                          </div>
                          <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
                            <div class="box">
                              <div class="icon"><i class="ion-location" style="color: #c5793ae0;"></i></div>
                              <h4 class="title"><a
                                  href="../Ciudades/TablaCiudades.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>">Ciudades</a>
                              </h4>
                              <p class="description">Tu empresa genera funtes de ingresos para familias de Honduras,
                                explora las
                                diferentes ciudades a las que pertenecen tus empleados</p>
                            </div>
                          </div>

                        </div>

                      </div>
                    </section><!-- #services -->
                    <!--Portafolio de Infografias-->
                    <section id="portfolio" class="clearfix">
                      <div class="container">

                        <header class="section-header">
                          <h3 class="section-title">Galeria de Infografias</h3>
                        </header>

                        <div class="row">
                          <div class="col-lg-12">
                            <ul id="portfolio-flters">
                              <li data-filter="*" class="filter-active">Todo</li>
                              <li data-filter=".filter-plantilla">Planillas</li>
                              <li data-filter=".filter-empleados">Empleados</li>
                              <li data-filter=".filter-contraseña">Recuperar Contraseña</li>
                            </ul>
                          </div>
                        </div>

                        <div class="row portfolio-container">

                          <div class="col-lg-4 col-md-6 portfolio-item filter-plantilla">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/P1.jpeg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Crear una nueva planilla 1</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/planilla1.png" data-lightbox="portfolio"
                                    data-title="COPAP" class="link-preview" title="COPAP"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-plantilla" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/P2.jpeg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Crear una nueva planilla 2</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/planilla2.png" class="link-preview"
                                    data-lightbox="portfolio" data-title="COPAP" title="COPAP"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-plantilla" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/M1.png" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Razones para usar COPAP</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/planillas4.png" class="link-preview"
                                    data-lightbox="portfolio" data-title="COPAP" title="COPAP"><i
                                      class="ion ion-eye"></i></a>

                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-plantilla">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/P3.jpeg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Crear una nueva planilla 3</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/planilla3.png" class="link-preview"
                                    data-lightbox="portfolio" data-title="COPAP" title="COPAP"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-empleados" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/anexo2.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Agregar un nuevo empleado 1</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/anexo2.jpg" class="link-preview"
                                    data-lightbox="portfolio" data-title="COPAP" title="COPAP"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-empleados" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/E1.jpeg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Consejos Utiles</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/Emp1.png" class="link-preview"
                                    data-lightbox="portfolio" data-title="App 3" title="Empleados"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-contraseña">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/C1.jpeg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Reestablcer Contraseña 1</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/anexo3.jpg" class="link-preview"
                                    data-lightbox="portfolio" data-title="Contraseña" title="Preview"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-contraseña" data-wow-delay="0.1s">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/anexo1.jpg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Reestablcer Contraseña 2</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/anexo1.jpg" class="link-preview"
                                    data-lightbox="portfolio" data-title="Contraseña" title="Preview"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-md-6 portfolio-item filter-empleados" data-wow-delay="0.2s">
                            <div class="portfolio-wrap">
                              <img src="../img/imgi/portfolio/anexo4.jpeg" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                <h4>Mostrar Empleados</h4>
                                <p>Ver</p>
                                <div>
                                  <a href="../img/imgi/portfolio/anexo4.jpeg" class="link-preview"
                                    data-lightbox="portfolio" data-title="Empleados" title="Preview"><i
                                      class="ion ion-eye"></i></a>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </section><!-- #portfolio -->
                </div>

              </div>
              <!-- Envoltorio de fin de contenido -->

            </div>
            <!-- Envoltorio de fin de página -->

            <!-- Desplácese al botón superiorn-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fas fa-angle-up"></i>
            </a>

            <!-- Cierre de sesión modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que deseas salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">Selecciona "Cerrar sesión" a continuación si está listo para finalizar su
                    sesión
                    actual.</div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../Login/loginForm.php">Cerrar Sesion</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- JavaScript básico de Bootstrap-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Complemento principal de JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Scripts personalizados para todas las páginas-->
            <script src="../js/sb-admin-2.min.js"></script>

            <!-- Complementos de nivel de página -->
            <script src="../vendor/chart.js/Chart.min.js"></script>

            <!-- JavaScript básico de Bootstrap-->
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Complemento principal de JavaScript-->
            <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Scripts personalizados para todas las páginas-->
            <script src="../js/sb-admin-2.min.js"></script>

            <!-- Complementos de nivel de página -->
            <script src="../vendor/chart.js/Chart.min.js"></script>

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
            <!-- Uncomment below i you want to use a preloader -->
            <!-- <div id="preloader"></div> -->

            <script src="../lib/jquery/jquery.min.js"></script>
            <script src="../lib/jquery/jquery-migrate.min.js"></script>
            <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="../lib/easing/easing.min.js"></script>
            <script src="../lib/mobile-nav/mobile-nav.js"></script>
            <script src="../lib/wow/wow.min.js"></script>
            <script src="../lib/waypoints/waypoints.min.js"></script>
            <script src="../lib/counterup/counterup.min.js"></script>
            <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="../lib/isotope/isotope.pkgd.min.js"></script>
            <script src="../lib/lightbox/js/lightbox.min.js"></script>

            <!-- Template Main Javascript File -->
            <script src="../js/main.js"></script>
</body>

</html>