<?php
include ('Estudiante.php');

$id_est = $_GET['id_est'];
$estudiante = new Estudiante($id_est,'','','');
$estudiante->readEstudiante();
/*
include('../Config/DatabaseConnection.php');
//$databaseconnection = new DatabaseConnection();
$connection = DatabaseConnection::getConnection();

//$id_est = $_GET['id_est'];
$query = "SELECT e.*, d.id_departamento FROM estudiante as e
  INNER JOIN ciudad as c on c.id_ciudad=e.id_ciudad
  INNER JOIN departamento as d on d.id_departamento=c.id_departamento
  WHERE e.id_est = " . $estudiante->getId_est();

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
    'id_departamento'=> $row['id_departamento'],
    'id_ciudad'=> $row['id_ciudad']
  );
}
$estudiantes = json_encode($json);
echo $estudiantes;*/
 ?>
