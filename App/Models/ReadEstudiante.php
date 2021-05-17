<?php
include ('Estudiante.php');

$id_est = $_GET['id_est'];
$estudiante = new Estudiante($id_est,'','','');
$estudiante->readEstudiante();

 ?>
