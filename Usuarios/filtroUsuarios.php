<?php
include '../SqlTools/database.php';

$Usuario = $_GET['idUsuario'];
$Empresa = $_GET['Empresas_idEmpresas'];
if (isset($_GET['state']))
  $state = $_GET['state'];

$db = new database();
$salida = "";
$query = 'SELECT idUsuario, Usuario, Contrasenia
FROM usuarios
WHERE Estados_idEstado = 1 and Empresas_idEmpresas = ' . $Empresa . '';

if (isset($_POST['sql'])) {
  $sql = $_POST['sql'];
  $query = 'SELECT idUsuario, Usuario, Contrasenia
    FROM usuarios
    WHERE idUsuario LIKE "%' . $sql . '%" OR 
    Usuario LIKE "%' . $sql . '%" and Empresas_idEmpresas = ' . $Empresa . ';';
}

if (isset($_POST['point'])) {
  $sql = $_POST['point'];
  $query = 'SELECT idUsuario, Usuario, Contrasenia
    FROM usuarios
    WHERE Estados_idEstado = ' . $sql . ' and Empresas_idEmpresas = ' . $Empresa . ';';
}

$db->specialSelect($query);
$table = $db->sql;

if ($table->num_rows > 0) {
  $salida = '
        <thead>
        <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th scope="col" colspan="3">Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th scope="col" colspan="3">Accion</th>
        </tr>
    </tfoot>';

  $salida .= '<tbody>';

  if (isset($_POST['point']) && $_POST['point'] == 2) {
    while ($fila = mysqli_fetch_assoc($table)) {
      $salida .= '
                <tr>
                    <td>' . $fila['idUsuario'] . '</td>
                    <td>' . $fila['Usuario'] . '</td>
                    <td>' . $fila['Contrasenia'] . '</td>
                    <td>
                    <a href="formUsuarios.php?Usuario=' . $fila['idUsuario'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&action=3" class="btn btn-success btn-sm">Ver</a>
                    </td>
                    <td>
                    <a href="formUsuarios.php?Usuario=' . $fila['idUsuario'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&action=2" class="btn btn-primary btn-sm">Modificar</a>
                    </td>
                    <td>
                    <a href="SQLInactive_Usuarios.php?Usuario=' . $fila['idUsuario'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&state=' . $state . '" class="btn btn-danger btn-sm">Activar</a>
                    </td>
                </tr>';
    }
  }

  while ($fila = mysqli_fetch_assoc($table)) {
    $salida .= '
    <tr>
      <td>' . $fila['idUsuario'] . '</td>
      <td>' . $fila['Usuario'] . '</td>
      <td>' . $fila['Contrasenia'] . '</td>
      <td>
      <a href="formUsuarios.php?Usuario=' . $fila['idUsuario'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&action=3" class="btn btn-success btn-sm">Ver</a>
      </td>
      <td>
      <a href="formUsuarios.php?Usuario=' . $fila['idUsuario'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&action=2" class="btn btn-primary btn-sm">Modificar</a>
      </td>
      <td>
      <a href="SQLInactive_Usuarios.php?Usuario=' . $fila['idUsuario'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '" class="btn btn-danger btn-sm">Desactivar</a>
      </td>
  </tr>';
  }
  $salida .= '</tbody>';
} else {
  $salida .= "Busqueda no encontrada.";
}

echo $salida;
