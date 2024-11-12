<?php 

require_once('../config/config.inc.php');

class Citas  {

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

  function obtener() {  
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
        doctores ON citas.doctor = doctores.dni;";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchall(PDO::FETCH_ASSOC);
  }
  
  function insertar($paciente, $doctor, $motivo, $estado, $dia, $hora) {
    $hora = "$hora:00"; 
    $sqlQuery = "INSERT INTO citas (paciente, doctor, motivo, estado, dia, hora)
     VALUES (:paciente, :doctor, :motivo, :estado, :dia, :hora)";
    $query = $this->pdo->prepare($sqlQuery);
    $query->bindParam(':paciente', $paciente);
    $query->bindParam(':doctor', $doctor);
    $query->bindParam(':motivo', $motivo);
    $query->bindParam(':estado', $estado);
    $query->bindParam(':dia', $dia);
    $query->bindParam(':hora', $hora);
    $query->execute();
    return $query->fetchall(PDO::FETCH_ASSOC);
  }
  
  function delete($id) {    
      $sqlQuery = "DELETE FROM citas WHERE id = :id";
      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':id', $id);
      $query->execute();
  }
  
  function actualizar($old_id, $id, $paciente, $doctor, $motivo, $estado, $dia, $hora ) {  
      $sqlQuery = 
      "UPDATE citas SET 
      paciente = :paciente, 
      doctor = :doctor, 
      motivo = :motivo, 
      estado = :estado, 
      dia = :dia, 
      hora = :hora 
      WHERE id = :old_id;";
  
      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':paciente', $paciente);
      $query->bindParam(':doctor', $doctor);
      $query->bindParam(':motivo', $motivo);
      $query->bindParam(':estado', $estado);
      $query->bindParam(':dia', $dia);
      $query->bindParam(':hora', $hora);
      $query->bindParam(':old_id', $old_id);
      $query->execute();
    }
}

?>