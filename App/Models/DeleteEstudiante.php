<?php
include('Estudiante.php');

$id_est = $_POST['id_est'];
$estudiante = new Estudiante($id_est,'','','');
$estudiante->deleteEstudiante();

?>
