<?php 

require_once('../config/config.inc.php');

class Sessions {
  private $pdo;

  function __construct() {
    $dsn = DB_DSN;
    $usuario = DB_USER;
    $contrasena = DB_PASS;

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

  function nuevoPaciente($dni, $nombre, $apellidos, $direccion, $telefono, $email, $contrasena) {
    $sqlQuery = "INSERT INTO paciente (dni, nombre, apellidos, direccion, telefono, email, contraseña)
                 VALUES (:dni, :nombre, :apellidos, :direccion, :telefono, :email, :contrasena)";
    $query = $this->pdo->prepare($sqlQuery);
    $query->bindParam(':dni', $dni);
    $query->bindParam(':nombre', $nombre);
    $query->bindParam(':apellidos', $apellidos);
    $query->bindParam(':direccion', $direccion);
    $query->bindParam(':telefono', $telefono);
    $query->bindParam(':email', $email);
    $query->bindParam(':contrasena', password_hash($contrasena, PASSWORD_DEFAULT));
    return $query->execute();
}

  function iniciarSesion ($email, $contrasena) {
    $sqlQueryP = "SELECT email, contraseña FROM paciente WHERE email = '$email'";
    $sqlQueryAdmin = "SELECT email, contraseña FROM admin WHERE email = '$email'";
    $sqlQueryAsistente = "SELECT email, contraseña FROM asistente WHERE email = '$email'";
    $sqlQueryDoc = "SELECT email, contraseña FROM doctores WHERE email = '$email'";

    $query = $this->pdo->prepare($sqlQueryP);
    $query->execute();
    $paciente = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $this->pdo->prepare($sqlQueryAdmin);
    $query->execute();
    $admin = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $this->pdo->prepare($sqlQueryAsistente);
    $query->execute();
    $asistente = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $this->pdo->prepare($sqlQueryDoc);
    $query->execute();
    $doctor = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if ($paciente['email'] == $email) {
      session_start();
      
    }

  }

}

?>