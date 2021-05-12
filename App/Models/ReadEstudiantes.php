<?php

include('Estudiante.php');
Estudiante::readEstudiantes();

/*
include('../Config/DatabaseConnection.php');

$connection = DatabaseConnection::getConnection();

$query = "SELECT e.*, c.nombre_ciudad, d.* FROM estudiante as e
  INNER JOIN ciudad as c on c.id_ciudad=e.id_ciudad
  INNER JOIN departamento as d on d.id_departamento=c.id_departamento";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Error de Lectura'. mysqli_error($connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
  $json[] = array(
    'id_est'=> $row['id_est'],
    'nombre_est'=> $row['nombre_est'],
    'fecha_nac_est'=> $row['fecha_nac_est'],
    'id_ciudad'=> $row['id_ciudad'],
    'nombre_ciudad'=> $row['nombre_ciudad'],
    'id_departamento'=> $row['id_departamento'],
    'nombre_departamento'=> $row['nombre_departamento']
  );
}
$estudiantes = json_encode($json);
echo $estudiantes;*/
 ?>
