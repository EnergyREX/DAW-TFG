<?php 

require_once('../config/config.inc.php');

class Admins {
  private $pdo;

  function __construct() {
        // Variables globales en config.inc.
        $dsn = DB_DSN;
        $usuario = DB_USER;
        $contrasena = DB_PASS;
      
        try {
          $this->pdo = new PDO($dsn, $usuario, $contrasena);
          // Modo de error de PDO.
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          echo "Error de conexión. " . $e->getMessage();
        }
  }

  function obtener() {  
    $sqlQuery = "SELECT * FROM admin";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchall(PDO::FETCH_ASSOC);
  }
  
  function insertar($dni, $nombre, $apellidos, $direccion, $telefono, 
                          $email, $passwd, $especialidad, $fecha_union, $disponibilidad) {

    $sqlQuery = "INSERT INTO admin (dni, nombre, apellidos, direccion, telefono, email, contraseña, especialidad, fecha_union, disponibilidad)
     VALUES (:dni, :nombre, :apellidos, :direccion, :telefono, :email, :contrasena, 
            :especialidad, :fecha_union, :disponibilidad)";
  
    $query = $this->pdo->prepare($sqlQuery);
    $query->bindParam(':dni', $dni);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellidos', $apellidos);
    $query->bindParam(':direccion', $direccion);
    $query->bindParam(':telefono', $telefono);
    $query->bindParam(':email', $email);
    $query->bindParam(':contrasena', $passwd);
    $query->bindParam(':especialidad', $especialidad);
    $query->bindParam(':fecha_union', $fecha_union);
    $query->bindParam(':disponibilidad', $disponibilidad);

    $query->execute();
    return $query->fetchall(PDO::FETCH_ASSOC);
  }
  
  function delete($dni) {    
      $sqlQuery = "DELETE FROM admin WHERE dni = :dni";
      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':dni', $dni);
      $query->execute();
  }
  
  function actualizar($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, 
                            $email, $especialidad, $fecha_union, $disponibilidad) {

      $sqlQuery = 
      "UPDATE admin SET 
      dni = :dni, 
      nombre = :nombre, 
      apellidos = :apellidos, 
      direccion = :direccion, 
      telefono = :telefono, 
      email = :email,
      especialidad = :especialidad,
      fecha_union = :fecha_union,
      disponibilidad = :disponibilidad 
      WHERE dni = :dni_old;";

      $query = $this->pdo->prepare($sqlQuery);

      $query->bindParam(':dni', $dni);
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':apellidos', $apellidos);
      $query->bindParam(':direccion', $direccion);
      $query->bindParam(':telefono', $telefono);
      $query->bindParam(':email', $email);
      $query->bindParam(':especialidad', $especialidad);
      $query->bindParam(':fecha_union', $fecha_union);
      $query->bindParam(':disponibilidad', $disponibilidad);
      $query->bindParam(':dni_old', $dni_old);


      $query->execute();
    }
}

?>