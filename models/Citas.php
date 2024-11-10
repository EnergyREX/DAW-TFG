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
    SELECT 
      citas.*,
      paciente.nombre AS nombre_paciente,
      doctores.nombre AS nombre_doctor
    FROM 
      citas
    JOIN 
      paciente ON citas.paciente = paciente.dni
    JOIN 
      doctores ON citas.doctor = doctores.dni;
";
  
  $query = $pdo->prepare($sqlQuery);
  $query->execute();

  return $query->fetchall(PDO::FETCH_ASSOC);
}

function insertar($paciente, $doctor, $motivo, $estado, $dia, $hora) {
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

  $hora = "$hora:00"; 

  $sqlQuery = "INSERT INTO citas (paciente, doctor, motivo, estado, dia, hora)
   VALUES ('$paciente', '$doctor', '$motivo', '$estado', '$dia', '$hora')";

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
  
    $sqlQuery = "DELETE FROM citas WHERE id = $id";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
}

function actualizar($id, $paciente, $doctor, $motivo, $estado, $dia, $hora ) {
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
    "UPDATE citas SET 
    paciente = '$paciente', 
    doctor = '$doctor', 
    motivo = '$motivo', 
    estado = '$estado', 
    dia = '$dia', 
    hora = '$hora' 
    WHERE id = $id;";

    $query = $pdo->prepare($sqlQuery);
    $query->execute();
  }
?>