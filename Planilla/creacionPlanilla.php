<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Creación de Planilla</title>
  <!-- FUENTES-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- CSS-->
  <link href="../css/estilo.css" rel="stylesheet">
  <link rel="icon" href="../img/Moneda.png">

  <!-- JQUERY-->
  <script src="../js/jquery.min.js"></script>
</head>

<body>
  <?php $Usuario = $_GET['idUsuario'];
  $Empresa = $_GET['Empresas_idEmpresas'];

  include '../SqlTools/database.php';
  $auxiliar = new database();
  $auxiliar->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $auxiliar->sql;
  $name = mysqli_fetch_assoc($nombre); ?>

  <!-- Envoltura de pagina -->
  <div id="wrapper">

    <?php include "../SqlTools/serviceMenu.php"; ?>

    <!-- Fin de la barra superior -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-20 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Fila anidada dentro del cuerpo de la tarjeta -->
              <div class="">
                <div class="p-5">
                  <!-- Inicio de Form -->
                  <form action="SQLInsert_Planilla.php" class="user" method="post">
                    <input type="hidden" name="Usuario" value="<?php echo $Usuario; ?>">
                    <input type="hidden" name="Empresa" value="<?php echo $Empresa; ?>">
                    <!--Fecha Inicio-->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="sidebar-heading">
                          Fecha de Inicio
                        </div>
                        <div class="form-group">
                          <input type="date" name="FechaInicio" id="FechaInicio" class="form-control form-control-user" placeholder="" required>
                        </div>
                      </div>

                      <!--Fecha Fin-->
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="sidebar-heading">
                          Fecha Fin
                        </div>
                        <div class="form-group">
                          <input type="date" name="FechaFin" id="FechaFin" class="form-control form-control-user" placeholder="" required>
                        </div>
                      </div>
                    </div>

                    <!--Numero Planilla-->
                    <div class="sidebar-heading">
                      Número Planilla
                    </div>
                    <div class="form-group">
                      <input type="" name="NumeroPlanilla" id="NumeroPlanilla" class="form-control form-control-user" placeholder="" value="<?php if (isset($row)) {
                                                                                                                                              echo $row['Correo'];
                                                                                                                                            } ?>" required>
                    </div>

                    <!--Submit-->
                    <div class="form-group row" style=" width: 50vw; margin-left : 7vw;">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Crear">
                      </div>
                      <!--Limpiar-->
                      <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="Reset" class="btn btn-primary btn-user btn-block" value="Limpiar">
                        </a>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0" style=" width: 50vw; margin-left : 16vw;">
                      <a href="historialPlanillas.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>" class="btn btn-primary btn-user btn-block">
                        Regresar
                      </a>
                    </div>
                  </form>
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
</body>

</html>

<script>
  function formatDate(date) {
    var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
  }

  function name(date) {
    var d = new Date(date),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('');
  }

  $("#FechaInicio").on("change", function() {
    var fecha = new Date($("#FechaInicio").val());
    var nombreP = new Date($("#FechaInicio").val());
    fecha.setDate(fecha.getDate() + 30);
    $("#FechaFin").val(formatDate(fecha));
    $("#NumeroPlanilla").val(name(nombreP) + name(fecha) + <?php echo $Empresa ?>);
  });
</script>