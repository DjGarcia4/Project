<?php
include '../SqlTools/database.php';
if (isset($_POST['submit'])) {
  $id = $_POST['idUsuario'];
  $Usuario = $_POST['Usuario'];
  $NombreUsuario = $_POST['NombreUsuario'];
  $Contrasenia = $_POST['Contrasenia'];
  $Estados_idEstado = $_POST['Estados_idEstado'];
  $Empleados_idEmpleados = $_POST['Empleado_idEmpleados'];
  $Empresas_idEmpresas = $_POST['Empresa'];

  $a = new database();

  $a->ExecQuery('UPDATE `sistema_planilla`.`usuarios` 
  SET `Usuario` = "'.$NombreUsuario.'", `Contrasenia` = md5("'.$Contrasenia.'"), `Empleados_idEmpleados` = "'.$Empleados_idEmpleados.'", `Empresas_idEmpresas` = "'.$Empresas_idEmpresas.'",
  `Estados_idEstado` = "'.$Estados_idEstado.'" WHERE `idUsuario` = "'.$id.'";');

  if ($a == true) {
    header("location: TablaUsuarios.php?idUsuario=$Usuario&Empresas_idEmpresas=$Empresas_idEmpresas");
  }
}
