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

  $sqlQuery = "SELECT * FROM asistente";
  
  $query = $pdo->prepare($sqlQuery);
  $query->execute();

  return $query->fetchall(PDO::FETCH_ASSOC);
}

function insertar($dni, $nombre, $apellidos, $direccion, $telefono, 
                        $email, $passwd, $fecha_union, $disponibilidad) {
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

  $sqlQuery = "INSERT INTO asistente (dni, nombre, apellidos, direccion, telefono, email, contraseña, fecha_union, disponibilidad)
   VALUES ('$dni', '$nombre', '$apellidos', '$direccion', '$telefono', '$email', '$passwd', 
           '$fecha_union', '$disponibilidad')";

  $query = $pdo->prepare($sqlQuery);
  $query->execute();
  
  return $query->fetchall(PDO::FETCH_ASSOC);
}

function delete($dni) {
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
  
    $sqlQuery = "DELETE FROM asistente WHERE dni = $dni";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
}

function actualizar($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, 
                          $email, $passwd) {
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
    "UPDATE asistente SET 
    dni = '$dni', 
    nombre = '$nombre', 
    apellidos = '$apellidos', 
    direccion = '$direccion', 
    telefono = '$telefono', 
    email = '$email',
    contraseña = '$passwd'
    WHERE dni = '$dni_old';";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
  }
?>