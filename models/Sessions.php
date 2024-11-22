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
    $sqlQueryP = "SELECT * FROM paciente WHERE email = :email";
    $sqlQueryAdmin = "SELECT * FROM admin WHERE email = :email";
    $sqlQueryAsistente = "SELECT * FROM asistente WHERE email = :email";
    $sqlQueryDoc = "SELECT * FROM doctores WHERE email = :email";

    $query = $this->pdo->prepare($sqlQueryP);
    $query->bindParam(':email', $email);
    $query->execute();
    $paciente = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $this->pdo->prepare($sqlQueryAdmin);
    $query->bindParam(':email', $email);
    $query->execute();
    $admin = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $this->pdo->prepare($sqlQueryAsistente);
    $query->bindParam(':email', $email);
    $query->execute();
    $asistente = $query->fetchAll(PDO::FETCH_ASSOC);

    $query = $this->pdo->prepare($sqlQueryDoc);
    $query->bindParam(':email', $email);
    $query->execute();
    $doctor = $query->fetchAll(PDO::FETCH_ASSOC);
    
    if (isset($paciente['email'])) {
      if ($paciente['contraseña'] == password_verify($contrasena, PASSWORD_DEFAULT)) {
        session_start();
        $_SESSION['nombre_usuario'] = $paciente['nombre']." ".$paciente['apellidos'];
      } else if (isset($asistente)) {
        session_start();
        $_SESSION['nombre_usuario'] = $asistente['nombre']." ".$asistente['apellidos'];
      } else if (isset($doctor)) {
        session_start();
        $_SESSION['nombre_usuario'] = $doctor['nombre']." ".$doctor['apellidos'];
        $_SESSION['nombre_usuario'] = $doctor['especialidad'];
      } else if (isset($admin)) {
        session_start();
        $_SESSION['nombre_usuario'] = $admin['nombre']." ".$admin['apellidos'];
        $_SESSION['nombre_usuario'] = $admin['especialidad'];
      }
    }
  }

}

?>