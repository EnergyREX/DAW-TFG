<?php 

require_once('../config/config.inc.php');

function obtenerTratamientos() {
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

function insertarTratamiento($id, $nombre, $precio) {
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

  $sqlQuery = "INSERT INTO tratamiento (id, nombre, precio)
   VALUES ('$id', '$nombre', '$precio')";

  $query = $pdo->prepare($sqlQuery);
  $query->execute();
  
  return $query->fetchall(PDO::FETCH_ASSOC);
}

function eliminarTratamiento($id) {
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

function actualizarTratamiento($id, $nombre, $precio) {
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
    paciente = '$id', 
    nombre = '$nombre', 
    precio = '$precio' 
    WHERE id = $id;";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
  }
?>