<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Empleados</title>
  <!-- FUENTES-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- CSS-->
  <link href="../css/estilo.css" rel="stylesheet">
  <link rel="icon" href="../img/Moneda.png">
  <!--JAVASCRIPT-->
  <script src="https://code.jquery.com/jquery-1.12.1.js">
  type = "text/javascript"
  </script>
  <link rel="stylesheet" href="../css/estilosValidacion.css">
</head>

<script src="../SqlTools/confirmationInsert.js"></script>

<body id="page-top">
  <?php
  include '../SqlTools/database.php';
  $Usuario = $_GET['idUsuario'];
  $Empresa = $_GET['Empresas_idEmpresas'];
  $action = $_GET['action'];
  $id = 0;

  if (isset($_GET['idEmpleados'])) {
    $id = $_GET['idEmpleados'];
  }

  $auxiliar = new database();
  $auxiliar->select('usuarios', 'Usuario', "idUsuario = '$Usuario'");
  $nombre = $auxiliar->sql;
  $name = mysqli_fetch_assoc($nombre);

  $auxiliar->select('empleados', '*', "idEmpleados= '$id'");
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
          <h1 class="h3 mb-1 text-gray-800"><?php if ($action == 1) echo 'Creacion de Empleado';
                                            else if ($action == 2) echo 'Modificacion de Empleado';
                                            else echo 'Lectura de Empleado' ?></h1>
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
                                                        echo "Insert_Employee.php";
                                                      } else if ($action == 2) {
                                                        echo "Update_Employee.php";
                                                      } ?> id="formulario" method="post">

                        <input type="hidden" name="Usuario" value="<?php echo $Usuario; ?>">
                        <input type="hidden" name="Empresa" value="<?php echo $Empresa; ?>">
                        <input type="hidden" name="idEmpleados" value="<?php echo $id; ?>">

                        <!--Grupo: Identidad-->
                        <div class="formulario__grupo" id="grupo__identidad">
                          <label for="Cedula" class="formulario__label">Identidad</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="Cedula" id="Cedula"
                              title="Ingresa el numero de identidad"
                              <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              pattern="[01]{1}[0-8]{1}[012]{1}[0-9]{1}[12]{1}[09]{1}[012789]{1}[0-9]{1}[0-9]{5}"
                              onkeypress="return soloNumeros(event)" placeholder="Identidad"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                                                                                                echo $row['Cedula'];
                                                                                                                                                                                                                                                                                                                                                              } ?>"
                              required minlength="13" maxlength="13">
                          </div>
                          <p class="formulario__input-error">El número de identidad solo puede contener números y el
                            máximo son 13.</p>
                        </div>
                        <!--Grupo: Sexo-->
                        <div class="formulario__grupo" id="grupo__sexo">
                          <label for="Sexos_idSexo" class="formulario__label">Sexo</label>
                          <div class="formulario__grupo-input">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="radio" name="Sexos_idSexo" id="Sexos_idSexo" title="Selecciona si es hombre"
                                <?php if ($action != 1 && $action != 2) echo "readonly" ?> value="1"
                                <?php if (isset($row)) if ($row['Sexos_idSexo'] == 1) : ?> checked="checked"
                                <?php endif ?> required>
                              <label for="contactChoice1">Masculino</label>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <input type="radio" name="Sexos_idSexo" id="Sexos_idSexo" title="Selecciona si es mujer"
                                <?php if ($action != 1 && $action != 2) echo "readonly" ?> value="2"
                                <?php if (isset($row)) if ($row['Sexos_idSexo'] == 2) : ?> checked="checked"
                                <?php endif ?> required>
                              <label for="contactChoice2">Femenino</label>
                            </div>
                          </div>
                        </div>
                        <!--Grupo: Primer Nombre-->
                        <div class="formulario__grupo" id="grupo__primerNombre">
                          <label for="PrimerNombre" class="formulario__label">Primer Nombre</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="PrimerNombre" id="PrimerNombre"
                              title="Ingresa primer nombre" <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              onkeypress="return soloLetras(event)" placeholder="Primer Nombre"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                    echo $row['PrimerNombre'];
                                                                                                                                                                                                                                                                                  } ?>"
                              required minlength="3" maxlength="15" onblur="upperCase('PrimerNombre')">
                          </div>
                          <p class="formulario__input-error">EL primer nombre tiene que ser de 3 a 15 dígitos y solo
                            puede contener
                            letras.</p>
                        </div>

                        <!--Grupo: Segundo Nombre-->
                        <div class="formulario__grupo" id="grupo__segundoNombre">
                          <label for="SegundoNombre" class="formulario__label">Segundo Nombre</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="SegundoNombre" id="SegundoNombre"
                              title="Ingresa segundo nombre (Es opcional, si no tiene deja vacio)"
                              <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              onkeypress="return soloLetras(event)" placeholder="Segundo Nombre"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                                                              echo $row['SegundoNombre'];
                                                                                                                                                                                                                                                                                                                            } ?>"
                              minlength="3" maxlength="15" onblur="upperCase('SegundoNombre')">
                          </div>
                          <p class="formulario__input-error">EL segundo nombre tiene que ser de 3 a 15 dígitos y solo
                            puede contener
                            letras.</p>
                        </div>

                        <!--Grupo: Primer Apellido-->
                        <div class="formulario__grupo" id="grupo__primerApellido">
                          <label for="PrimerApellido" class="formulario__label">Primer Apellido</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="PrimerApellido" id="PrimerApellido"
                              title="Ingresa primer apellido" <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              onkeypress="return soloLetras(event)" placeholder="Primer Apellido"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                            echo $row['PrimerApellido'];
                                                                                                                                                                                                                                                                                          } ?>"
                              required minlength="3" maxlength="15" onblur="upperCase('PrimerApellido')">
                          </div>
                          <p class="formulario__input-error">EL primer apellido tiene que ser de 3 a 15 dígitos y solo
                            puede contener
                            letras.</p>
                        </div>

                        <!--Grupo: Segundo Apellido-->
                        <div class="formulario__grupo" id="grupo__segundoApellido">
                          <label for="SegundoApellido" class="formulario__label">Segundo Apellido</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="SegundoApellido" id="SegundoApellido"
                              title="Ingresa segundo apellido (Es opcional, si no tiene deja vacio)"
                              <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              onkeypress="return soloLetras(event)" placeholder="Segundo Apellido"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                                                                      echo $row['SegundoApellido'];
                                                                                                                                                                                                                                                                                                                                    } ?>"
                              minlength="3" maxlength="15" onblur="upperCase('SegundoApellido')">
                          </div>
                          <p class="formulario__input-error">EL segundo apellido tiene que ser de 3 a 15 dígitos y solo
                            puede contener
                            letras.</p>
                        </div>

                        <!--Grupo: Teléfono-->
                        <div class="formulario__grupo" id="grupo__telefono">
                          <label for="Telefono" class="formulario__label">Teléfono</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="Telefono" id="Telefono"
                              title="Ingresa telefono" <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              pattern="[2389]{1}[0-9]{7}" onkeypress="return soloNumeros(event)" placeholder="Telefono"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                              echo $row['Telefono'];
                                                                                                                                                                                                                                                                                            } ?>"
                              minlength="8" required maxlength="8">
                          </div>
                          <p class="formulario__input-error">El télefono solo puede contener números, debe iniciar con
                            2, 3, 8 o 9 y el máximo son 8.</p>
                        </div>

                        <!--Grupo: Dirección-->
                        <div class="formulario__grupo" id="grupo__Direccion">
                          <label for="Direccion" class="formulario__label">Dirección</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class=" formulario__input" name="Direccion" id="Direccion"
                              title="Ingresa dirección" <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              onkeypress="return soloLetrasYespeciales(event)" placeholder="Direccion"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                  echo $row['Direccion'];
                                                                                                                                                                                                                                                                                } ?>"
                              required minlength="3" maxlength="50" onblur="upperCase('Direccion')">
                          </div>
                          <p class="formulario__input-error">La dirección tiene que ser de 3 a 50 dígitos y solo puede
                            contener
                            letras.</p>
                        </div>

                        <!--Grupo: Departamento-->
                        <?php
                        $grid = new database();
                        $grid->select('departamentos', '*');
                        $table = $grid->sql;
                        ?>
                        <div class="formulario__grupo" id="grupo__Departamentos_idDepartamentos">
                          <label for="Departamentos_idDepartamentos" class="formulario__label">Departamento</label>
                          <select class="formulario__input" name="Departamentos_idDepartamentos"
                            id="Departamentos_idDepartamentos" title="Seleciona una opcion"
                            <?php if ($action != 1 && $action != 2) echo "readonly" ?> onchange="cambio()">
                            <option value="">Seleccione un departamento</option>
                            <?php while ($ex = mysqli_fetch_assoc($table)) { ?>
                            <option value="<?php echo $ex['idDepartamentos']; ?>"><?php echo $ex['DescripcionDepto']; ?>
                            </option>
                            <?php } ?>
                          </select>
                          <p class="formulario__input-error">Debe seleccionar un departamento.</p>
                        </div>

                        <!--Grupo: Cargo-->
                        <?php
                        $grid = new database();
                        $grid->select('cargos', '*');
                        $table = $grid->sql;
                        $ex = mysqli_fetch_assoc($table)
                        ?>
                        <div class="formulario__grupo" id="grupo__Cargos_idCargos">
                          <label for="Cargos_idCargos" class="formulario__label">Cargo</label>
                          <select class="formulario__input" name="Cargos_idCargos" id="Cargos_idCargos"
                            title="Selecciona un opcion" <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                            required>
                            <option value="">Seleccione un cargo</option>
                            <?php if (isset($row)) {
                              while ($ex = mysqli_fetch_assoc($table)) {
                                if ($row['Cargos_idCargos'] == $ex['idCargo']) { ?>
                            <option value=<?php echo $ex['idCargo'] ?> selected><?php echo $ex['DescripcionCargo'] ?>
                            </option>
                            <?php
                                }
                              }
                            }
                            ?>
                          </select>
                          <p class="formulario__input-error">Debe seleccionar un cargo.</p>
                        </div>

                        <!--Grupo: Ciudad-->
                        <?php
                        $grid->select('ciudades', '*');
                        $table = $grid->sql;
                        ?>
                        <div class="formulario__grupo" id="grupo__Ciudades_idCiudades">
                          <label for="Ciudades_idCiudades" class="formulario__label">Ciudades</label>
                          <select class="formulario__input" name="Ciudades_idCiudades" id="Ciudades_idCiudades"
                            title="Selcciona una opcion" <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                            SelectedItem="null"
                            value="<?php if (isset($row)) {
                                                                                                                                                                                                                                      echo $row['Ciudades_idCiudades'];
                                                                                                                                                                                                                                    } ?>"
                            required>
                            <option value="" selected>Seleccione una ciudad</option>
                            <?php while ($ex = mysqli_fetch_assoc($table)) { ?>
                            <option value=<?php echo $ex['idCiudades']; ?>
                              <?php if (isset($row)) if ($row['Ciudades_idCiudades'] == $ex['idCiudades']) echo "selected" ?>>
                              <?php echo $ex['DescripcionCiudad']; ?></option>
                            <?php } ?>
                          </select>
                          <p class="formulario__input-error">Debe seleccionar una ciudad.</p>
                        </div>

                        <!--Grupo: Estado-->
                        <div class="formulario__grupo" id="grupo__estado">
                          <label for="Estados_idEstado" class="formulario__label">Estado</label>
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

                        <!--Grupo: Fecha de Nacimiento-->
                        <div class="formulario__grupo" id="grupo__FechaNacimiento">
                          <label for="FechaNacimiento" class="formulario__label">Fecha de Nacimiento</label>
                          <div class="formulario__grupo-input">
                            <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="formulario__input"
                              title="Ingresa la fecha de nacimiento"
                              <?php if ($action != 1 && $action != 2) echo "readonly" ?> placeholder=""
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                echo $row['FechaNacimiento'];
                                                                                                                                                                                                                                              } else {
                                                                                                                                                                                                                                                echo '';
                                                                                                                                                                                                                                              } ?>"
                              required min="1980-01-01" max="2001-12-31">
                          </div>
                          <p class="formulario__input-error">Debe ingresar su fecha de nacimiento.</p>
                        </div>

                        <!--Grupo: Fecha de Ingreso-->
                        <div class="formulario__grupo" id="grupo__fechaIngreso">
                          <label for="fechaIngreso" class="formulario__label">Fecha de Ingreso</label>
                          <div class="formulario__grupo-input">
                            <input type="date" name="FechaIngreso" class="formulario__input"
                              title="Ingresa fecha en la que ingreso"
                              <?php if ($action != 1 && $action != 2) echo "readonly" ?> placeholder=""
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                        echo $row['FechaIngreso'];
                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                        echo date("Y-m-d");
                                                                                                                                                                                                                      } ?>"
                              required min="2001-12-31">
                          </div>
                        </div>

                        <!--Grupo: Correo Electrónico-->
                        <div class="formulario__grupo" id="grupo__correo">
                          <label for="Correo" class="formulario__label">Correo Electrónico</label>
                          <div class="formulario__grupo-input">
                            <input type="email" class="formulario__input" name="Correo" id="Correo"
                              title="Ingresa el correo elecctronico"
                              <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              placeholder="Correo Electronico"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                echo $row['Correo'];
                                                                                                                                                                                                                                              } ?>"
                              pattern="[a-z0-9_]+([.][a-z0-9_]+)*@[a-z0-9_]+([.][a-z0-9_]+)*[.][a-z]{1,5}" required
                              minlength="12" maxlength="50" onblur="lowerCase('Correo')">
                          </div>
                          <p class="formulario__input-error">El correo solo puede contener letras, números, puntos,
                            guiones y guión bajo.
                          </p>
                        </div>

                        <!--Grupo: Cuenta Bancaria-->
                        <div class="formulario__grupo" id="grupo__cuentaBan">
                          <label for="CuentaBancaria" class="formulario__label">Cuenta Bancaria</label>
                          <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="CuentaBancaria" id="CuentaBancaria"
                              title="Ingresa la cuenta bancaria"
                              <?php if ($action != 1 && $action != 2) echo "readonly" ?>
                              onkeypress="return soloNumeros(event)" placeholder="Cuenta Bancaria"
                              value="<?php if (isset($row)) {
                                                                                                                                                                                                                                                                                                echo $row['CuentaBancaria'];
                                                                                                                                                                                                                                                                                              } ?>"
                              required maxlength="15">
                          </div>
                          <p class="formulario__input-error">La cuenta bancaria solo puede contener números y el máximo
                            son 15.</p>
                        </div>

                        <!--Grupo: Botones-->

                        <?php if ($action == 1 || $action == 2) { ?>

                        <!--Submit-->
                        <div class="formulario__grupo">
                          <input type="submit" class="btn btn-primary btn-user btn-block" name="submit"
                            title="Click si el formulario esta listo para guardar"
                            value=<?php if ($action == 1) {
                                                                                                                                                                          echo "Crear";
                                                                                                                                                                        } else if ($action == 2) {
                                                                                                                                                                          echo "Modificar";
                                                                                                                                                                        } else {
                                                                                                                                                                          echo "Leer";
                                                                                                                                                                        } ?>
                            onclick="" <?php if ($action != 1 && $action != 2) echo "readonly" ?>>
                        </div>

                        <!-- Limpiar -->
                        <div class="formulario__grupo">
                          <input type="Reset" class="btn btn-primary btn-user btn-block"
                            title="Click si desea limpiar todos los campos" value="Limpiar">
                        </div>

                        <?php } ?>

                        <!--Cancelar-->
                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                          <div class="col-sm-6 mb-3 mb-sm-0" style=" width: 50vw; margin-left : 0vw;">
                            <a title="Click si no desea hacer ni una acción"
                              href="tablas.php?idUsuario=<?php echo $Usuario ?>&Empresas_idEmpresas=<?php echo $Empresa ?>"
                              class="btn btn-primary btn-user btn-block">
                              Regresar
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

<script type="text/javascript">
var valid;

function recargarLista() {
  var x = document.getElementById("Departamentos_idDepartamentos").value;
  $.ajax({
    type: "POST",
    url: "datos.php",
    data: "dpto=" + x,
    success: function(r) {
      $('#Cargos_idCargos').html(r);
    }
  });
}

function cambio() {
  recargarLista();
}

function valid() {
  var x = document.getElementById("#Telefono").value();

  if (x.substring(0, 1) != '2' || x.substring(0, 1) != '9' || x.substring(0, 1) != '8') {

  }
}

$("#Telefono").on("change", function() {
  var x = document.getElementById("#Telefono");
  if (x.substring(0, 1) != '2' || x.substring(0, 1) != '9' || x.substring(0, 1) != '8') {
    valid = 0;
  }
});
</script>