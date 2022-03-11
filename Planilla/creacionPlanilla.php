<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Planilla de Pagos</title>
    <!-- FUENTES-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- CSS-->
    <link href="../css/estilo.css" rel="stylesheet">
    <link rel="icon" href="../icon.png">

</head>
<body>
<?php $Usuario = $_GET['idUsuario'];
  $Empresa = $_GET['Empresas_idEmpresas'];

  include '../SqlTools/database.php';
  $auxiliar = new database();
  $auxiliar ->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $auxiliar->sql;
  $name = mysqli_fetch_assoc($nombre);?>

  <!-- Envoltura de páginar -->
  <div id="wrapper">

    <!-- barra lateral -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Barra lateral - Marca -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">
        <div class="sidebar-brand-text mx-3">Planilla de Pago</div>
      </a>

      <!-- Divisor -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Menu-->
      <li class="nav-item active">
        <a class="nav-link" href="../index.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">
          <span>Menu</span></a>
      </li>

      <!-- Divisor -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Planillas Plegar Menú -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlanillas"
            aria-expanded="true" aria-controls="collapsePlanillas">
            <span>Planillas</span>
          </a>
          <div id="collapsePlanillas" class="collapse" aria-labelledby="headingPlanillas" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="../historialPlanillas.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Registro</a>
              <a class="collapse-item" href="../Planilla/creacionPlanilla.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Crear Planilla</a>
            </div>
          </div>
        </li>

      <!-- Nav Item -Empleados Cerrar menú -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmpleados" aria-expanded="true"
          aria-controls="collapseEmpleados">
          <span>Empleados</span>
        </a>
        <div id="collapseEmpleados" class="collapse" aria-labelledby="headingEmpleados" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../crearEmpleado.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Crear Empleado</a>
            <a class="collapse-item" href="../tablas.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Mostrar Empleados</a>
          </div>
        </div>
      </li>

            <!-- Nav Item - Cargos Plegar Menú -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCargos"
          aria-expanded="true" aria-controls="collapseCargos">
          <span>Cargos</span>
        </a>
        <div id="collapseCargos" class="collapse" aria-labelledby="headingCargos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../Cargos/TablaCargos.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Mostrar Cargos</a>
            <a class="collapse-item" href="../Cargos/CreacionCargos.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Crear Cargo Nuevo</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Ciudades Plegar Menú -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCiudades"
          aria-expanded="true" aria-controls="collapseCiudades">
          <span>Ciudades</span>
        </a>
        <di id="collapseCiudades" class="collapse" aria-labelledby="headingCiudades" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../Ciudades/TablaCiudades.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Mostrar Ciudades</a>
            <a class="collapse-item" href="../Ciudades/CreacionCiudades.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Crear Ciudad Nueva</a>
          </div>
      </li>

      <!-- Nav Item - Departamentos Plegar Menú -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartamentos"
          aria-expanded="true" aria-controls="collapseDepartamentos">
          <span>Departamentos</span>
        </a>
        <di id="collapseDepartamentos" class="collapse" aria-labelledby="headingDepartamentos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../Departamentos/TablaDepartamentos.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Mostrar Departamentos</a>
            <a class="collapse-item" href="../Departamentos/CreacionDepartamentos.php?idUsuario=<?php echo $Usuario?>&Empresas_idEmpresas=<?php echo $Empresa?>">Crear Departamento Nuevo</a>
          </div>
      </li>

      <!-- Barra lateral cerrar (Barra lateral) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
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

          <!-- Búsqueda en la barra superior -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name['Usuario']?></span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
              </a>
              <!-- Desplegable - Información del usuario -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="../nuevoUsuario.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Crear usuario
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Actividad
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesion
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- Fin de la barra superior -->

        <form action="" class="user">
        <!--Fecha Inicio-->
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="sidebar-heading">
                Fecha de Inicio
            </div>
            <div class="form-group">
                <input type="date" name="FechaInicio" class="form-control form-control-user" placeholder="" 
                required>
            </div>
            </div>
            <!--Fecha Fin-->
            <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="sidebar-heading">
                Fecha de Fin
            </div>
            <div class="form-group">
                <input type="date" name="FechaFin"class="form-control form-control-user" placeholder=""
                value="<?php if(isset($row)) { echo $row['FechaIngreso']; } ?>" required>
            </div>
            </div>
        </div>
        <!--Numero Planilla-->
        <div class="sidebar-heading">
            Numero Planilla
        </div>
        <div class="form-group">
            <input type="email" name = "NumeroPlanilla" class="form-control form-control-user" placeholder=""
            value="<?php if(isset($row)) { echo $row['Correo']; } ?>" required readonly>
        </div>
    </form>

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; Bandersnatch 2022</span>
            </div>
          </div>
        </footer>
        <!-- Fin del Footer -->

      </div>
      <!-- Envoltorio de fin de contenido -->

    </div>
    <!-- Envoltorio de fin de página -->

    <!-- Desplácese al botón superior-->
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
            <a class="btn btn-primary" href="login.php">Cerrar Sesion</a>
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
</body>
</html>

<script type="text/javascript">
    function onchange(){
        var x = document.getElementByName("Departamentos_idDepartamentos").value;
        var y = document.getElementByName("FechaFin").value;
        element.setAttribute(FechaFin, x);
        element.setAttribute(NumeroPlanilla, x+y);
    }
</script>