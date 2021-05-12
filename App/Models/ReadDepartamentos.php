<?php
include('../Config/DatabaseConnection.php');

$databaseconnection = new DatabaseConnection();
$connection = $databaseconnection::getConnection();
$query = "SELECT * FROM departamento";
$result = mysqli_query($connection, $query);

$json = array();
while ($row = mysqli_fetch_array($result)) {
  $json[] = array(
    'id_departamento' => $row['id_departamento'],
    'nombre_departamento' => $row['nombre_departamento']
  );
}
$jsonString = json_encode($json);
echo $jsonString;

 ?>
