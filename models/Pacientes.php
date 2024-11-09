<?php 

require_once('../config/config.inc.php');

function obtenerPacientes() {
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

  $sqlQuery = "SELECT * FROM paciente";
  
  $query = $pdo->prepare($sqlQuery);
  $query->execute();

  return $query->fetchall(PDO::FETCH_ASSOC);
}

function insertarPaciente($dni, $nombre, $apellidos, $direccion, $telefono, 
                        $email) {
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

  $sqlQuery = "INSERT INTO paciente (dni, nombre, apellidos, direccion, telefono, email)
   VALUES ('$dni', '$nombre', '$apellidos', '$direccion', '$telefono', '$email')";

  $query = $pdo->prepare($sqlQuery);
  $query->execute();
  
  return $query->fetchall(PDO::FETCH_ASSOC);
}

function eliminarPaciente($dni) {
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
  
    $sqlQuery = "DELETE FROM paciente WHERE dni = $dni";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
}

function actualizarPaciente($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, 
                          $email) {
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
    "UPDATE paciente SET 
    dni = '$dni', 
    nombre = '$nombre', 
    apellidos = '$apellidos', 
    direccion = '$direccion', 
    telefono = '$telefono', 
    email = '$email'
    WHERE dni = '$dni_old';";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
  }
?>