<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>
  <!-- FUENTES-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- CSS-->
  <link href="../css/estilo.css" rel="stylesheet">
  <link rel="icon" href="../img/Moneda.png">
  <!--JAVASCRIPT-->
  <script src="https://code.jquery.com/jquery-1.12.1.js">
    type = "text/javascript"
  </script>
  <link rel="stylesheet" href="../css/estilosValidacion.css">
</head>

<body id="page-top">
  <?php
  include '../SqlTools/database.php';
  $Usuario = $_GET['idUsuario'];
  $Empresa = $_GET['Empresas_idEmpresas'];

  $auxiliar = new database();

  $auxiliar->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $auxiliar->sql;

  $name = mysqli_fetch_assoc($nombre);

  $auxiliar->specialSelect('SELECT count(DescripcionCargo) as y, DescripcionCargo as label FROM sistema_planilla.empleados inner join cargos on idCargo = Cargos_idCargos group by DescripcionCargo;');
  $dataPosition;
  $item = array();

  while ($row = mysqli_fetch_array($auxiliar->sql)) {
    $item['y'] = $row['y'];
    $item['label'] = $row['label'];
    $dataPosition[] = $item;
  }

  $auxiliar->specialSelect('SELECT count(Nombre) as y, Nombre as label, substring(Nombre, 1, 1) as symbol FROM sistema_planilla.empleados inner join sistema_planilla.empresas on idEmpresa = Empresas_idEmpresas group by Nombre;');
  $dataPie;

  while ($row = mysqli_fetch_array($auxiliar->sql)) {
    $item['y'] = $row['y'];
    $item['label'] = $row['label'];
    $item['symbol'] = $row['symbol'];
    $dataPie[] = $item;
  }

  $auxiliar->specialSelect('SELECT count(DescripcionSexo) as y, DescripcionSexo as label FROM sistema_planilla.empleados inner join sistema_planilla.sexos on idSexo = Sexos_idSexo group by DescripcionSexo;');
  $dataSex;

  while ($row = mysqli_fetch_array($auxiliar->sql)) {
    $item['y'] = $row['y'];
    $item['label'] = $row['label'];
    $dataSex[] = $item;
  }
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
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - Información del usuario -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name['Usuario']; ?></span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
              </a>
              <!-- Desplegable - Información del usuario -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a> -->
                <a class="dropdown-item" href="../Login/cambioContra.php?idUsuario=<?php echo $Usuario; ?>&Empresas_idEmpresas=<?php echo $Empresa; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-replace" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <rect x="3" y="3" width="6" height="6" rx="1" />
                    <rect x="15" y="15" width="6" height="6" rx="1" />
                    <path d="M21 11v-3a2 2 0 0 0 -2 -2h-6l3 3m0 -6l-3 3" />
                    <path d="M3 13v3a2 2 0 0 0 2 2h6l-3 -3m0 6l3 -3" />
                  </svg>
                  Cambio de contraseña
                </a>
                <a class="dropdown-item" href="../Usuarios/formUsuarios.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>&action=1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    <path d="M16 11h6m-3 -3v6" />
                  </svg>
                  Crear Usuario
                </a>
                <a class="dropdown-item" href="../Usuarios/TablaUsuarios.php?idUsuario=<?php echo $Usuario; ?>&Empresas_idEmpresas=<?php echo $Empresa; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-door-enter" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
          <h1 class="h3 mb-1 text-gray-800">Dashboard</h1>
        </div>

        <div id="chartPosition" style="position: sticky; width: 90%; height: 50%; margin-bottom: 5%; margin-left: 5%; margin-right: 5%; border: black 1px solid;"></div>
        <div id="PieChartEmp" style="position: sticky; width: 40%; height: 30%; margin-bottom: 5%; margin-left: 5%; margin-right: 5%; border: black 1px solid;"></div>
        <div id="sexChart" style="position: sticky; width: 40%; height: 30%; margin-bottom: 5%; margin-left: 5%; margin-right: 5%; border: black 1px solid;"></div>

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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

  <!-- Scripts personalizados a nivel de página -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

  <!-- Scripts Validacion de Formulario -->
  <script src="../js/formulario.js"></script>

  <!-- Diagramas -->
  <script src="../js/canvasjs.min.js"></script>

</body>

</html>

<script>
  window.onload = function() {
    var chart1 = new CanvasJS.Chart("chartPosition", {
      animationEnabled: true,
      title: {
        text: "Cargos"
      },
      axisY: {
        title: "Empleados"
      },
      data: [{
        type: "bar",
        yValueFormatString: "#",
        indexLabel: "{y}",
        indexLabelPlacement: "inside",
        indexLabelFontWeight: "bolder",
        indexLabelFontColor: "white",
        dataPoints: <?php echo json_encode($dataPosition, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart1.render();

    var chart2 = new CanvasJS.Chart("PieChartEmp", {
      theme: "light2",
      animationEnabled: true,
      title: {
        text: "Empleados por Empresa"
      },
      data: [{
        type: "doughnut",
        indexLabel: "{symbol} - {y}",
        yValueFormatString: "#,##0.0\"%\"",
        showInLegend: true,
        legendText: "{label} : {y}",
        dataPoints: <?php echo json_encode($dataPie, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart2.render();

    var chart3 = new CanvasJS.Chart("sexChart", {
      animationEnabled: true,
      theme: "light2",
      title: {
        text: "Sexos por Empleados"
      },
      axisY: {
        title: "Empleados"
      },
      data: [{
        type: "column",
        yValueFormatString: "#,##0.## Empleados",
        dataPoints: <?php echo json_encode($dataSex, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart3.render();
  }
</script>