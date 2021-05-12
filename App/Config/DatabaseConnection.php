<?php

class DatabaseConnection {

  public static function getConnection(){
    $connection = mysqli_connect(
      'localhost',
      'main',
      'passw',
      'sistema_de_informacion'
    );
    return $connection;
  }
}
 ?>
