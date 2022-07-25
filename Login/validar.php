<?php
include '../SqlTools/database.php';

$usuario = $_POST['Usuario'];
$Contrasenia = $_POST['Contrasenia'];
$a = new database();

$a->select('usuarios', '*', "Usuario='$usuario' and Contrasenia=md5('$Contrasenia')");
$filas = mysqli_num_rows($a->sql);

$data = $a->sql;
$row = mysqli_fetch_assoc($data);

if (isset($row['idUsuario']) || isset($row['Empresas_idEmpresas'])) {
  $idUser = $row['idUsuario'];
  $idEnt = $row['Empresas_idEmpresas'];
}

$a->__destruct();

if ($filas) {
  header("location:../menu/menu.php?idUsuario=$idUser&Empresas_idEmpresas=$idEnt");
} else {
  include("ERROR.php");
}
