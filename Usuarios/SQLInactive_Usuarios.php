<?php
$Empresa = $_GET['Empresas_idEmpresas'];
$Usuario = $_GET['idUsuario'];

if (isset($_GET['state']))
  $Estados_idEstado = $_GET['state'];
else
  $Estados_idEstado = 2;

include '../SqlTools/database.php';

$idUsuario = $_GET['Usuario'];

$del = new database();
$del->select('usuarios', '*', "idUsuario='$idUsuario'");
$result = $del->sql;

$data = mysqli_fetch_assoc($result);

$NombreUsuario = $data['Usuario'];
$Contrasenia = $data['Contrasenia'];
$Empleados_idEmpleados = $data['Empleados_idEmpleados'];
$Empresas_idEmpresas = $data['Empresas_idEmpresas'];

$del->update('usuarios', "idUsuario = '$idUsuario'", [
  'Usuario' => $NombreUsuario, 'Contrasenia' => $Contrasenia, 'Empleados_idEmpleados' => $Empleados_idEmpleados, 'Estados_idEstado' => $Estados_idEstado
]);

if ($del == true) {
  header("location: TablaUsuarios.php?idUsuario=$Usuario&Empresas_idEmpresas=$Empresa");
}
