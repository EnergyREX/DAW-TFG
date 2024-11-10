<?php 

require_once('../config/config.inc.php');

function obtener() {
  // Variables globales en config.inc.
  $dsn = DB_DSN;
  $usuario = DB_USER;
  $contrasena = DB_PASS;

  try {
    $pdo = new PDO($dsn, $usuario, $contrasena);
    // Modo de error de PDO.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "Error de conexión. " . $e->getMessage();
  }

  $sqlQuery = "
    SELECT * from tratamientos;
";
  
  $query = $pdo->prepare($sqlQuery);
  $query->execute();

  return $query->fetchall(PDO::FETCH_ASSOC);
}

function insertar($id, $nombre, $precio) {
  // Variables globales en config.inc.
  $dsn = DB_DSN;
  $usuario = DB_USER;
  $contrasena = DB_PASS;

  try {
    $pdo = new PDO($dsn, $usuario, $contrasena);
    // Modo de error de PDO.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo "Error de conexión. " . $e->getMessage();
  }

  $sqlQuery = "INSERT INTO tratamientos (id, nombre, precio)
   VALUES ('$id', '$nombre', '$precio')";

  $query = $pdo->prepare($sqlQuery);
  $query->execute();
  
  return $query->fetchall(PDO::FETCH_ASSOC);
}

function delete($id) {
    // Variables globales en config.inc.
    $dsn = DB_DSN;
    $usuario = DB_USER;
    $contrasena = DB_PASS;
  
    try {
      $pdo = new PDO($dsn, $usuario, $contrasena);
      // Modo de error de PDO.
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error de conexión. " . $e->getMessage();
    }
  
    $sqlQuery = "DELETE FROM tratamientos WHERE id = $id";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
}

function actualizar($id, $nombre, $precio) {
    // Variables globales en config.inc.
    $dsn = DB_DSN;
    $usuario = DB_USER;
    $contrasena = DB_PASS;
  
    try {
      $pdo = new PDO($dsn, $usuario, $contrasena);
      // Modo de error de PDO.
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error de conexión. " . $e->getMessage();
    }

    $sqlQuery = 
    "UPDATE tratamientos SET 
    id = '$id', 
    nombre = '$nombre', 
    precio = '$precio' 
    WHERE id = $id;";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
  }
?>