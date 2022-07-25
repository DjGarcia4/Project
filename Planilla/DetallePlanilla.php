<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vista de Planilla</title>

  <!-- FUENTES-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- CSS-->
  <link href="../css/estilo.css" rel="stylesheet">
  <link rel="icon" href="../img/Moneda.png">

  <!-- JS-->
  <script src="../js/tableexport.min.js"></script>
  <script src="../js/xlsx.full.min.js"></script>
  <script src="../js/FileSaver.min.js"></script>
  <script src="../js/jquery.min.js"></script>

</head>

<body id="page-top">
  <?php $Usuario = $_GET['idUsuario'];
  $Empresa = $_GET['Empresas_idEmpresas'];
  $idPlanillas = $_GET['idPlanillas'];
  include '../SqlTools/database.php';
  $grid = new database();
  $grid->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $grid->sql;
  $name = mysqli_fetch_assoc($nombre); ?>
  <!-- Envoltura de páginar -->
  <div id="wrapper">

    <!-- barra lateral -->
    <?php include "../SqlTools/serviceMenu.php";?>
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
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>

            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - Información del usuario -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name['Usuario'] ?></span>
                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
              </a>
              <!-- Desplegable - Información del usuario -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a> -->
                <a class="dropdown-item" href="../Login/cambioContra.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cambio de contraseña
                </a>
                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Actividad
                                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- Fin de la barra superior -->

        <!-- Contenido de la página de inicio -->
        <div class="container-fluid">

          <!-- Encabezado de página -->
          <h1 class="h3 mb-2 text-gray-800">Planilla de Pagos</h1>

          <div>
            <button class="btn btn-danger btn-sm" id="btnExportarPDF">PDF</button>
            <button class="btn btn-success btn-sm" id="btnExportar" onclick="exceller()">Excel</button>
          </div>

          <!-- Tablas-->
          <div class="card shadow mb-4">
            <div class="table-body">
              <div class="table-responsive" id="pdfDiv">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>Nombre</th>
                      <th>Salario</th>
                      <th>IHSS</th>
                      <th>RAP</th>
                      <th>ISR</th>
                      <th>Deducciones</th>
                      <th>DecimoCuarto</th>
                      <th>DecimoTercero</th>
                      <th>Bonificaciones</th>
                      <th>Sueldo Neto</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $grid->specialSelect("SELECT idEmpleados,concat(PrimerNombre, ' ', PrimerApellido) as Nombre,
                                  Salario,IHSS,RAP,ISR,Total_Deducciones,14vo,13vo,Total_Bonificaciones,Sueldo_Neto
                                  FROM sistema_planilla.empleados 
                                  inner join sistema_planilla.cargos on sistema_planilla.cargos.idCargo = sistema_planilla.empleados.Cargos_idCargos
                                  inner join sistema_planilla.detalleplanillas on sistema_planilla.detalleplanillas.Empleados_idEmpleados = sistema_planilla.empleados.idEmpleados
                                  where Planillas_idPlanilla = $idPlanillas
                                  order by 	idEmpleados;");
                    $table = $grid->sql;
                    ?>

                    <?php while ($row = mysqli_fetch_assoc($table)) { ?>

                      <tr>
                        <td><?php echo $row['idEmpleados']; ?></td>
                        <td><?php echo $row['Nombre']; ?></td>
                        <td><?php echo $row['Salario']; ?></td>
                        <td><?php echo $row['IHSS']; ?></td>
                        <td><?php echo $row['RAP']; ?></td>
                        <td><?php echo $row['ISR']; ?></td>
                        <td><?php echo $row['Total_Deducciones']; ?></td>
                        <td><?php echo $row['14vo']; ?></td>
                        <td><?php echo $row['13vo']; ?></td>
                        <td><?php echo $row['Total_Bonificaciones']; ?></td>
                        <td><?php echo $row['Sueldo_Neto']; ?></td>
                      </tr>
                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- /.container-fluid -->
      <!-- Fin del contenido principal -->
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

  <!--Desplácese al botón superior-->
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
        <div class="modal-body">Selecciona "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.
        </div>
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
  <script src="../js/FileSaver.js"></script>

</body>

</html>

<script>
  function exceller() {
    var uri = 'data:application/vnd.ms-excel;base64,',
      template =
      '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
      base64 = function(s) {
        return window.btoa(unescape(encodeURIComponent(s)))
      },
      format = function(s, c) {
        return s.replace(/{(\w+)}/g, function(m, p) {
          return c[p];
        })
      }
    var toExcel = document.getElementById("dataTable").innerHTML;
    var ctx = {
      worksheet: name || '',
      table: toExcel
    };
    var link = document.createElement("a");
    link.download = "<?php echo "Planilla $idPlanillas Empresa $Empresa"; ?>.xls";
    link.href = uri + base64(format(template, ctx))
    link.click();
  }

  function pdf(value) {
    $.ajax({
      type: "POST",
      url: "htmlPDF.php",
      data: {
        "rolex": value,
        "empresa": <?php echo $Empresa ?>,
        "planilla": <?php echo $idPlanillas ?>
      },
      success: function(response) {
        alert("Planilla Descargada con exito y guardada en Registro");
      }
    });
  }

  $("#btnExportarPDF").on("click", function() {
    var val = $("#pdfDiv").html();
    pdf(val);
  });
</script>