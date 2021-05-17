<?php
include('Estudiante.php');

$id_est = $_POST['id_est'];
$nombre_est = $_POST['nombre_est'];
$fecha_nac_est = $_POST['fecha_nac_est'];
$ciudad_est = $_POST['ciudad_est'];

$estudiante = new Estudiante($id_est, $nombre_est, $fecha_nac_est, $ciudad_est);
$estudiante->updateEstudiante();

 ?>
