<?php 

require_once('../config/config.inc.php');

function obtenerCitas() {
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

  $sqlQuery = "SELECT * FROM citas";
  
  $query = $pdo->prepare($sqlQuery);
  $query->execute();

  return $query->fetchall(PDO::FETCH_ASSOC);
}

function insertarCitas($paciente, $doctor, $motivo, $estado, $dia, $hora) {
  // Variables globales en config.inc.
  $dsn = DB_DSN;
  $usuario = DB_USER;
  $contrasena = DB_PASS;

  try {
    $pdo = new PDO($dsn, $usuario, $contrasena);
    // Modo de error de PDO.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
  } catch (PDOException $e) {
    echo "Error de conexión. " . $e->getMessage();
  }

  $sqlQuery = "INSERT INTO citas (paciente, doctor, motivo, estado, hora, dia)
   VALUES ('$paciente', '$doctor', '$motivo', '$estado', '$dia', '$hora')";

  $query = $pdo->$pdo->prepare($sqlQuery);
  $query->execute();
  
  return $query->fetch_all(PDO::FETCH_ASSOC);
}

function eliminarCitas($id) {
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
  
    $sqlQuery = "DELETE FROM citas WHERE id = '$id'";

    $query = $pdo->$pdo->prepare($sqlQuery);
    $query->execute();

    return $query->fetch_all(PDO::FETCH_ASSOC);
}

function modificarCitas($id, $paciente, $doctor, $motivo, $estado, $dia, $hora ) {
    // Variables globales en config.inc.
    $dsn = DB_DSN;
    $usuario = DB_USER;
    $contrasena = DB_PASS;
  
    try {
      $pdo = new PDO($dsn, $usuario, $contrasena);
      // Modo de error de PDO.
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Conexión exitosa";
    } catch (PDOException $e) {
      echo "Error de conexión. " . $e->getMessage();
    }
  
    /* Ejemplo:
    UPDATE citas SET 
    paciente = '45678901D', 
    doctor = '34567890C', 
    motivo = 'Lobotomía', 
    estado = 'Cancelada' 
    dia = '2024-11-30' 
    hora = '21:00:00' 
    WHERE id = 1;
    */

    $sqlQuery = "UPDATE citas SET 
    paciente = '$paciente', 
    doctor = '$doctor', 
    motivo = '$motivo', 
    estado = '$estado', 
    dia = '$dia', 
    hora = '$hora', 
    WHERE id = $id;";

    $query = $pdo->$pdo->prepare($sqlQuery);
    $query->execute();

    return $query->fetch_all(PDO::FETCH_ASSOC);

}
?>