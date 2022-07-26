<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ciudad</title>
  <!-- FUENTES-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- CSS-->
  <link href="../css/estilo.css" rel="stylesheet">
  <link rel="icon" href="../img/Moneda.png">
  <link rel="stylesheet" href="../css/estilosValidacion.css">

  <!--JAVASCRIPT-->
  <script src="https://code.jquery.com/jquery-1.12.1.js">
  type = "text/javascript"
  </script>

</head>

<script src="../SqlTools/confirmationInsert.js"></script>

<body id="page-top">

  <?php
  include '../SqlTools/database.php';
  $Usuario = $_GET['idUsuario'];
  $Empresa = $_GET['Empresas_idEmpresas'];
  $action = $_GET['action'];
  $idCiudades = 0;

  if (isset($_GET['idCiudades'])) {
    $idCiudades = $_GET['idCiudades'];
  }

  $auxiliar = new database();
  $auxiliar->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $auxiliar->sql;
  $name = mysqli_fetch_assoc($nombre);

  $auxiliar->select('ciudades', '*', "idCiudades= '$idCiudades'");
  $table = $auxiliar->sql;
  $row = mysqli_fetch_assoc($table);
  ?>

  <!-- Envoltura de pagina -->
  <div id="wrapper">

    <!-- barra lateral -->
    <?php include "../SqlTools/serviceMenu.php"; ?>
    <!-- Fin de la barra lateral -->

    <!-- Envoltorio de contenido -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main contenido -->
      <div id="content">

        <!-- Barra superior -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Alternar barra lateral (barra superior) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Barra superior Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

            </li>

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

        <!-- Contenido de la página de inicio -->
        <div class="container-fluid">
          <h1 class="h3 mb-1 text-gray-800"><?php if ($action == 1) echo 'Creacion de Ciudad';
                                            else if ($action == 2) echo 'Modificacion de Ciudad';
                                            else echo 'Lectura de Ciudad' ?></h1>
        </div>
        <div class="container">

          <!-- Fila exterior -->
          <div class="row justify-content-center">

            <div class="col-xl-20 col-lg-12 col-md-9">

              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Fila anidada dentro del cuerpo de la tarjeta -->
                  <div class="">
                    <div class="p-5">
                      <!--Inicio de Form-->
                      <form class="formulario" action=<?php if ($action == 1) {
                                                        echo "SQLInsert_Ciudades.php";
                                                      } else if ($action == 2) {
                                                        echo "SQLUpdate_Ciudades.php";
                                                      } ?> id="formulario" method="post">
                        <input type="hidden" name="Usuario" value="<?php echo $Usuario; ?>">
                        <input type="hidden" name="Empresa" value="<?php echo $Empresa; ?>">
                        <input type="hidden" name="idCiudades" value="<?php echo $idCiudades; ?>">

                        <!--Grupo: Descripcion de Ciudades-->
                        <div class="formulario__grupo" id="grupo__DescripcionCiudad">
                          <label for="DescripcionCiudad" class="formulario__label">Nombre de la Ciudad</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="DescripcionCiudad" id="DescripcionCiudad"
                              title="Nombre de la ciudad" <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              onkeypress="return soloLetras(event)" onblur="upperCase('DescripcionCiudad')"
                              placeholder="Nombre de la Ciudad"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                                                                          echo $row['DescripcionCiudad'];
                                                                                                                                                                                                                                                                                                                                        } ?>"
                              required minlength="5" maxlength="30">
                          </div>
                          <p class="formulario__input-error">La descripción de la ciudad solo acepta letras y el máximo
                            son 30.</p>
                        </div>

                        <!--Grupo: Estado-->
                        <div class="formulario__grupo" id="grupo__estado">
                          <label for="estado" class="formulario__label">Estado</label>
                          <div class="formulario__grupo">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="radio" name="Estados_idEstado" title="Seleciona si esta activo"
                                <?php if ($action != 1 && $action != 2) echo "readonly" ?> value="1"
                                <?php if (isset($row)) if ($row['Estados_idEstado'] == 1) : ?> checked="checked"
                                <?php endif ?> required>
                              <label for="contactChoice1">Activo</label>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="radio" name="Estados_idEstado" title="Selecciona si esta inactivo"
                                <?php if ($action != 1 && $action != 2) echo "readonly" ?> value="2"
                                <?php if (isset($row)) if ($row['Estados_idEstado'] == 2) : ?> checked="checked"
                                <?php endif; ?> required>
                              <label for="contactChoice2">Inactivo</label>
                            </div>
                          </div>
                        </div>

                        <?php if ($action == 1 || $action == 2) { ?>

                        <!--Submit-->
                        <div class="formulario__grupo" id="grupo__departamento">
                          <input type="submit" class="btn btn-primary btn-user btn-block" name="submit"
                            title="Click si el formulario esta listo para guardar"
                            value=<?php if ($action == 1) {
                                                                                                                                                                          echo "Crear";
                                                                                                                                                                        } else if ($action == 2) {
                                                                                                                                                                          echo "Modificar";
                                                                                                                                                                        } else {
                                                                                                                                                                          echo "Leer";
                                                                                                                                                                        } ?>>
                        </div>
                        <!--Limpiar-->
                        <div class="formulario__grupo" id="grupo__departamento">
                          <input type="Reset" class="btn btn-primary btn-user btn-block"
                            title="Click si desea limpiar todos los campos" value="Limpiar">
                        </div>

                        <?php } ?>

                        <!--Cancelar-->
                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                          <div class="col-sm-6 mb-3 mb-sm-0" style=" width: 50vw; margin-left : 0vw;">
                            <a title="Click si no desea hacer ni una acción"
                              href="TablaCiudades.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>"
                              class="btn btn-primary btn-user btn-block">
                              Cancelar
                            </a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bandersnatch 2022 </span>
          </div>
        </div>
      </footer>
      <!-- Fin del Footer -->

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
        <div class="modal-body">Selecciona "Cerrar sesión" a continuación si está listo para finalizar su sesión
          actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../Login/loginForm.php">Cerrar Sesión</a>
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

  <!-- Scripts personalizados a nivel de página -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>
  <!-- Scripts Validacion de Formulario -->
  <script src="../js/formulario.js"></script>

</body>

</html>