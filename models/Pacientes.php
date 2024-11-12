<?php 

require_once('../config/config.inc.php');

class Pacientes {
  private $pdo;

  function __construct() {
    $dsn = DB_DSN;
    $usuario = DB_USER;
    $contrasena = DB_PASS;

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
    $sqlQuery = "SELECT * FROM paciente";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  
  function insertar($dni, $nombre, $apellidos, $direccion, $telefono, $email) {  
    $sqlQuery = "INSERT INTO paciente (dni, nombre, apellidos, direccion, telefono, email)
     VALUES (:dni, :nombre, :apellidos, :direccion, :telefono, :email)";

    $query = $this->pdo->prepare($sqlQuery);
    $query->bindParam(':dni', $dni);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellidos', $apellidos);
    $query->bindParam(':direccion', $direccion);
    $query->bindParam(':telefono', $telefono);
    $query->bindParam(':email', $email);
    $query->execute();
    
    return $query->fetchall(PDO::FETCH_ASSOC);
  }
  
  function delete($dni) {
      $sqlQuery = "DELETE FROM paciente WHERE dni = :dni";

      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':dni', $dni);
      $query->execute();
  }
  
  function actualizar($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, $email) {  
      $sqlQuery = 
      "UPDATE paciente SET 
      dni = :dni, 
      nombre = :nombre, 
      apellidos = :apellidos, 
      direccion = :direccion, 
      telefono = :telefono, 
      email = :email
      WHERE dni = :dni_old";
  
      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':dni', $dni);
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':apellidos', $apellidos);
      $query->bindParam(':direccion', $direccion);
      $query->bindParam(':telefono', $telefono);
      $query->bindParam(':email', $email);
      $query->bindParam(':dni_old', $dni_old);
      $query->execute();
    }
}

?>