<?php 

require_once('../config/config.inc.php');

class Tratamiento {

  private $pdo;

  function __construct() {
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

  public function obtener() {
    $sqlQuery = "SELECT * from tratamientos";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
  
  function insertar($id, $nombre, $precio) {
    $sqlQuery = "INSERT INTO tratamientos (id, nombre, precio)
     VALUES (:id, :nombre, :precio)";
  
    $query = $this->pdo->prepare($sqlQuery);
  
    $query->bindParam(':id', $id);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':precio', $precio);
  
    $query->execute();
  }
  
  function delete($id) {  
      $sqlQuery = "DELETE FROM tratamientos WHERE id = :id";
  
      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':id', $id);
      $query->execute();
  }
  
  function actualizar($id, $nombre, $precio) {  
      $sqlQuery = 
      "UPDATE tratamientos SET 
      id = :id, 
      nombre = :nombre, 
      precio = :precio 
      WHERE id = :id;";
  
      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':id', $id);
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':precio', $precio);
      $query->execute();
    }
}

?>