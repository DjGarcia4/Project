<?php
include '../SqlTools/database.php';
if (isset($_POST['submit'])) {
  $id = $_POST['idUsuario'];
  $Usuario = $_POST['Usuario'];
  $NombreUsuario = $_POST['NombreUsuario'];
  $Contrasenia = md5($_POST['Contrasenia']);
  $Estados_idEstado = $_POST['Estados_idEstado'];
  $Empleados_idEmpleados = $_POST['Empleado_idEmpleados'];
  $Empresas_idEmpresas = $_POST['Empresa'];

  $a = new database();
  
  $a->update('usuarios', 'idUsuario ='. $id.'', [
    'Usuario' => $NombreUsuario, 'Contrasenia' => $Contrasenia,
    'Empleados_idEmpleados' => $Empleados_idEmpleados, 'Empresas_idEmpresas' => $Empresas_idEmpresas,
    'Estados_idEstado' => $Estados_idEstado
  ]);

  if ($a == true) {
    header("location: TablaUsuarios.php?idUsuario=$Usuario&Empresas_idEmpresas=$Empresas_idEmpresas");
  }
}
