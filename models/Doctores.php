<?php 

require_once('../config/config.inc.php');

function obtenerDoctores() {
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

  $sqlQuery = "SELECT * FROM doctores";
  
  $query = $pdo->prepare($sqlQuery);
  $query->execute();

  return $query->fetchall(PDO::FETCH_ASSOC);
}

function insertarDoctor($dni, $nombre, $apellidos, $direccion, $telefono, 
                        $email, $passwd, $especialidad, $fecha_union, $disponibilidad) {
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

  $sqlQuery = "INSERT INTO doctores (dni, nombre, apellidos, direccion, telefono, email, contraseña, especialidad, fecha_union, disponibilidad)
   VALUES ('$dni', '$nombre', '$apellidos', '$direccion', '$telefono', '$email', '$passwd', 
          '$especialidad', '$fecha_union', '$disponibilidad')";

  $query = $pdo->prepare($sqlQuery);
  $query->execute();
  
  return $query->fetchall(PDO::FETCH_ASSOC);
}

function eliminarDoctor($dni) {
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
  
    $sqlQuery = "DELETE FROM doctores WHERE dni = $dni";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
}

function actualizarDoctor($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, 
                          $email, $especialidad, $fecha_union, $disponibilidad) {
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
    "UPDATE doctores SET 
    dni = '$dni', 
    nombre = '$nombre', 
    apellidos = '$apellidos', 
    direccion = '$direccion', 
    telefono = '$telefono', 
    email = '$email',
    especialidad = '$especialidad',
    fecha_union = '$fecha_union',
    disponibilidad = '$disponibilidad' 
    WHERE dni = '$dni_old';";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
  }
?>