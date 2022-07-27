<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registro</title>

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
  include '../SqlTools/database.php';
  $grid = new database();
  $grid->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $grid->sql;
  $name = mysqli_fetch_assoc($nombre); ?>
  <!-- Envoltura de pagina -->
  <div id="wrapper">

    <?php include "../SqlTools/serviceMenu.php"; ?>

    <!-- Contenido de la página de inicio -->
    <div class="container-fluid">

      <!-- Encabezado de página -->
      <h1 class="h3 mb-2 text-gray-800">Registro de Planillas</h1>

      <!-- Tablas-->
      <div class="card shadow mb-4">
        <div class="table-body">
          <div class="table-responsive" id="pdfDiv">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $grid->select('registros', '*');
                $table = $grid->sql;
                ?>

                <?php while ($row = mysqli_fetch_assoc($table)) { ?>

                  <tr>
                    <td><?php echo $row['id_Planilla']; ?></td>
                    <td><?php echo $row['Nombre_Planilla']; ?></td>
                    <td><?php echo $row['url']; ?></td>
                  </tr>
                <?php } ?>

              <tfoot>
                <tr>
                  <th>id</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                </tr>
              </tfoot>
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
  $("td").on("click", function() {
    var url = $(this).html();
    console.log(url);
    window.open(url);
  })
</script>