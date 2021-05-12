<?php
include('../Config/DatabaseConnection.php');
$connection = DatabaseConnection::getConnection();

$departamento = $_GET['departamento'];
$query = "SELECT * FROM ciudad WHERE id_departamento = $departamento";
$result = mysqli_query($connection, $query);

if (!$result) {
  die('Error de consulta'. mysqli_error($connection));
}
$json = array();
while ($row = mysqli_fetch_array($result)) {
  $json[] = array(
    'id_ciudad' => $row['id_ciudad'],
    'nombre_ciudad' => $row['nombre_ciudad']
  );
}
$jsonString = json_encode($json);
echo $jsonString;

 ?>
