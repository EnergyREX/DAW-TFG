<?php 

require_once('../config/config.inc.php');

class IndexPanel {
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

   function obtenerCitas() {  
    $sqlQuery = "SELECT count(*) FROM citas";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  function obtenerDoctores() {  
    $sqlQuery = "SELECT count(*) FROM doctores";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  function obtenerPacientes() {  
    $sqlQuery = "SELECT count(*) FROM paciente";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
    
  function obtenerCitasConfirmadas() {
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
      doctores ON citas.doctor = doctores.dni
      WHERE citas.estado = 'Confirmada'";
    $query = $this->pdo->prepare($sqlQuery);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
  }
?>  