<?php
include('Estudiante.php');

$id_est = $_POST['id_est'];
$estudiante = new Estudiante($id_est,'','','');
$estudiante->deleteEstudiante();

/*
include('../Config/DatabaseConnection.php');

$databaseconnection = new DatabaseConnection();
$connection = $databaseconnection::getConnection();

$id_est = $_POST['id_est'];

$query = "DELETE FROM `estudiante` WHERE `estudiante`.`id_est` = $id_est";

$result = mysqli_query($connection, $query);

if (!$result) {
  die('Error de Inserción'. mysqli_error($connection));
}
echo $result;*/
 ?>
