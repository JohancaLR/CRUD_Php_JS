<?php
include('Estudiante.php');

$id_est = $_POST['id_est'];
$nombre_est = $_POST['nombre_est'];
$fecha_nac_est = $_POST['fecha_nac_est'];
$ciudad_est = $_POST['ciudad_est'];

$estudiante = new Estudiante($id_est, $nombre_est, $fecha_nac_est, $ciudad_est);
$estudiante->updateEstudiante();

/*include('../Config/DatabaseConnection.php');

$databaseconnection = new DatabaseConnection();
$connection = $databaseconnection::getConnection();

$id_est = $_POST['id_est'];
$nombre_est = $_POST['nombre_est'];
$fecha_nac_est = $_POST['fecha_nac_est'];
$ciudad_est = $_POST['ciudad_est'];


$query = "UPDATE estudiante SET nombre_est = '$nombre_est', fecha_nac_est = '$fecha_nac_est', id_ciudad= $ciudad_est
WHERE `estudiante`.`id_est` = $id_est ";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Error de Actualización'. mysqli_error($connection));
}
echo $result;*/
 ?>
