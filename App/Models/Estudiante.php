<?php
include('../Config/DatabaseConnection.php');

class Estudiante {
  private $conexion;
  private $id_est;
  private $nombre_est;
  private $fecha_nac_est;
  private $id_ciudad;

  public function __construct($id_est, $nombre_est, $fecha_nac_est, $id_ciudad) {
    $this->conexion = DatabaseConnection::getConnection();
    $this->setId_est($id_est);
    $this->setNombre_est($nombre_est);
    $this->setFecha_nac_est($fecha_nac_est);
    $this->setId_ciudad($id_ciudad);
  }

  public function CreateEstudiante(){
    $query = "INSERT INTO estudiante (id_est, nombre_est, fecha_nac_est, id_ciudad)
              VALUES ($this->id_est, '$this->nombre_est', '$this->fecha_nac_est', $this->id_ciudad)";
    $result = mysqli_query($this->conexion, $query);

    if (!$result) {
      die('Error de Inserción: '. mysqli_error($this->conexion));
    }
    echo $result;
  }

  //Lectura Individual
  public function readEstudiante() {
    $query = "SELECT e.*, d.id_departamento FROM estudiante as e
      INNER JOIN ciudad as c on c.id_ciudad=e.id_ciudad
      INNER JOIN departamento as d on d.id_departamento=c.id_departamento
      WHERE e.id_est = $this->id_est";

    $result = mysqli_fetch_array(mysqli_query($this->conexion, $query));
    if (!$result) {
      die('Error de Lectura'. mysqli_error($this->conexion));
    }
    $json[] = array(
      'id_est'=> $result['id_est'],
      'nombre_est'=> $result['nombre_est'],
      'fecha_nac_est'=> $result['fecha_nac_est'],
      'id_departamento'=> $result['id_departamento'],
      'id_ciudad'=> $result['id_ciudad']
    );
    $estudiantes = json_encode($json);
    echo $estudiantes;
  }

  //Lectura General
  public static function readEstudiantes(){
    $connection = DatabaseConnection::getConnection();
    $query = "SELECT e.*, c.nombre_ciudad, d.* FROM estudiante as e
      INNER JOIN ciudad as c on c.id_ciudad=e.id_ciudad
      INNER JOIN departamento as d on d.id_departamento=c.id_departamento";
    $result = mysqli_query($connection, $query);
    //var_dump(mysqli_fetch_array($result));
    if (!$result) {
      die('Error de Lectura'. mysqli_error($connection));
    }
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
      //$json[] = $row;
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
    echo $estudiantes;
  }

  //Actualización
  public function updateEstudiante(){
    $query = "UPDATE estudiante SET nombre_est = '$this->nombre_est',
              fecha_nac_est = '$this->fecha_nac_est', id_ciudad= $this->id_ciudad
              WHERE `estudiante`.`id_est` = $this->id_est ";
    $result = mysqli_query($this->conexion, $query);

    if (!$result) {
      die('Error de Actualización'. mysqli_error($this->conexion));
    }
    echo $result;
  }

  //borrar
  public function deleteEstudiante(){
    $query = "DELETE FROM `estudiante` WHERE `estudiante`.`id_est` = $this->id_est";

    $result = mysqli_query($this->conexion, $query);

    if (!$result) {
      die('Error de Inserción'. mysqli_error($this->conexion));
    }
    echo $result;
  }

  //id
  public function getId_est(){
    return $this->id_est;
  }
  public function setId_est($id_est){
    $this->id_est = $id_est;
  }
  //nombre
  public function getNombre_est(){
    return $this->nombre_est;
  }
  public function setNombre_est($nombre_est){
    $this->nombre_est = $nombre_est;
  }
  //fecha
  public function getFecha_nac_est(){
    return $this->fecha_nac_est;
  }
  public function setFecha_nac_est($fecha_nac_est){
    $this->fecha_nac_est = $fecha_nac_est;
  }
  //ciudad
  public function getId_ciudad(){
    return $this->id_ciudad;
  }
  public function setId_ciudad($id_ciudad){
    $this->id_ciudad = $id_ciudad;
  }
}

 ?>
