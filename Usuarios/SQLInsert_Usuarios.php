<?php
include '../SqlTools/database.php';
if (isset($_POST['submit'])) {
  $Usuario = $_POST['Usuario'];
  $NombreUsuario = $_POST['NombreUsuario'];
  $Contrasenia = $_POST['Contrasenia'];
  $Estados_idEstado = $_POST['Estados_idEstado'];
  $Empleados_idEmpleados = $_POST['Empleado_idEmpleados'];
  $Empresas_idEmpresas = $_POST['Empresa'];

  $a = new database();

  $a->ExecQuery('INSERT INTO `sistema_planilla`.`usuarios`(`Usuario`,`Contrasenia`,`Empleados_idEmpleados`,`Empresas_idEmpresas`,`Estados_idEstado`)
  VALUES("'.$NombreUsuario.'",md5("'.$Contrasenia.'"),"'.$Empleados_idEmpleados.'","'.$Empresas_idEmpresas.'","'.$Estados_idEstado.'");');

  if ($a == true) {
    header("location: TablaUsuarios.php?idUsuario=$Usuario&Empresas_idEmpresas=$Empresas_idEmpresas");
  }
}
