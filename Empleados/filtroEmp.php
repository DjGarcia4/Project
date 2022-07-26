<?php
include '../SqlTools/database.php';

$Usuario = $_GET['idUsuario'];
$Empresa = $_GET['Empresas_idEmpresas'];
if (isset($_GET['state']))
  $state = $_GET['state'];

$db = new database();
$salida = "";
$query = 'SELECT idEmpleados, Cedula, PrimerNombre, SegundoNombre, 
PrimerApellido, SegundoApellido, Telefono, Direccion,
FechaNacimiento, FechaIngreso, CuentaBancaria, Sexos_idSexo,
Cargos_idCargos, Estados_idEstado, Correo,
Ciudades_idCiudades, Correo, concat(PrimerNombre," ",PrimerApellido) as Nombre,
Telefono,FechaNacimiento,
if(Month(now()) - Month(FechaNacimiento)>0, YEAR(now()) - YEAR(FechaNacimiento)+1, YEAR(now()) - YEAR(FechaNacimiento)) AS EDAD,
if(Sexos_idSexo = 1, "Masculino", "Femenino") as Sexo
FROM empleados
WHERE Estados_idEstado = 1 and Empresas_idEmpresas = ' . $Empresa . '';

if (isset($_POST['sql'])) {
  $sql = $_POST['sql'];
  $query = 'SELECT idEmpleados, Cedula, PrimerNombre, SegundoNombre, 
    PrimerApellido, SegundoApellido, Telefono, Direccion,
    FechaNacimiento, FechaIngreso, CuentaBancaria, Sexos_idSexo,
    Cargos_idCargos, Estados_idEstado, Correo,
    Ciudades_idCiudades, Correo, concat(PrimerNombre," ",PrimerApellido) as Nombre,
    Telefono,FechaNacimiento,
    if(Month(now()) - Month(FechaNacimiento)>0, YEAR(now()) - YEAR(FechaNacimiento)+1, YEAR(now()) - YEAR(FechaNacimiento)) AS EDAD,
    if(Sexos_idSexo = 1, "Masculino", "Femenino") as Sexo
    FROM empleados
    WHERE Estados_idEstado = 1 and  Empresas_idEmpresas = ' . $Empresa . ' and
    idEmpleados LIKE "%' . $sql . '%" or 
    Cedula like "%' . $sql . '%" or
    concat(PrimerNombre," ",PrimerApellido) LIKE "%' . $sql . '%";';
}

if (isset($_POST['point'])) {
  $sql = $_POST['point'];
  $query = 'SELECT idEmpleados, Cedula, PrimerNombre, SegundoNombre, 
    PrimerApellido, SegundoApellido, Telefono, Direccion,
    FechaNacimiento, FechaIngreso, CuentaBancaria, Sexos_idSexo,
    Cargos_idCargos, Estados_idEstado, Correo,
    Ciudades_idCiudades, Correo, concat(PrimerNombre," ",PrimerApellido) as Nombre,
    Telefono,FechaNacimiento,
    if(Month(now()) - Month(FechaNacimiento)>0, YEAR(now()) - YEAR(FechaNacimiento)+1, YEAR(now()) - YEAR(FechaNacimiento)) AS EDAD,
    if(Sexos_idSexo = 1, "Masculino", "Femenino") as Sexo
    FROM empleados
    WHERE Estados_idEstado = ' . $sql . ' and  Empresas_idEmpresas = ' . $Empresa . ';';
}

$db->specialSelect($query);
$table = $db->sql;

if ($table->num_rows > 0) {
  $salida = '
        <thead>
        <tr>
        <th>id</th>
        <th>Núm. id</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Nacimiento</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th scope="col" colspan="4">Accion</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
        <th>id</th>
        <th>Núm. id</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Nacimiento</th>
        <th>Edad</th>
        <th>Sexo</th>
        <th scope="col" colspan="4">Accion</th>
        </tr>
    </tfoot>';

  $salida .= '<tbody>';

  if (isset($_POST['point']) && $_POST['point'] == 2) {
    while ($fila = mysqli_fetch_assoc($table)) {
      $salida .= '
                <tr>
                    <td>' . $fila['idEmpleados'] . '</td>
                    <td>' . $fila['Cedula'] . '</td>
                    <td>' . $fila['Nombre'] . '</td>
                    <td>' . $fila['Telefono'] . '</td>
                    <td>' . $fila['FechaNacimiento'] . '</td>
                    <td>' . $fila['EDAD'] . '</td>
                    <td>' . $fila['Sexo'] . '</td>
                    <td>
                    <a href="readEmployee.php?idEmpleados=' . $fila['idEmpleados'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '" class="btn btn-success btn-sm">Ver</a>
                    </td>
                    <td>
                    <a href="formEmpleado.php?idEmpleados=' . $fila['idEmpleados'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&action=2" class="btn btn-primary btn-sm">Modificar</a>
                    </td>
                    <td>
                    <a href="inactivate.php?idEmpleados=' . $fila['idEmpleados'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&state=' . $state . '" class="btn btn-danger btn-sm">Activar</a>
                    </td>
                </tr>';
    }
  }

  while ($fila = mysqli_fetch_assoc($table)) {
    $salida .= '
            <tr>
                <td>' . $fila['idEmpleados'] . '</td>
                <td>' . $fila['Cedula'] . '</td>
                <td>' . $fila['Nombre'] . '</td>
                <td>' . $fila['Telefono'] . '</td>
                <td>' . $fila['FechaNacimiento'] . '</td>
                <td>' . $fila['EDAD'] . '</td>
                <td>' . $fila['Sexo'] . '</td>
                <td>
                <a href="formEmpleado.php?idEmpleados=' . $fila['idEmpleados'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&action=3" class="btn btn-success btn-sm">Ver</a>
                </td>
                <td>
                <a href="formEmpleado.php?idEmpleados=' . $fila['idEmpleados'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '&action=2" class="btn btn-primary btn-sm">Modificar</a>
                </td>
                <td>
                <a href="inactivate.php?idEmpleados=' . $fila['idEmpleados'] . '&idUsuario=' . $Usuario . '&Empresas_idEmpresas=' . $Empresa . '" class="btn btn-danger btn-sm">Desactivar</a>
                </td>
            </tr>';
  }
  $salida .= '</tbody>';
} else {
  $salida .= "Busqueda no encontrada.";
}

echo $salida;