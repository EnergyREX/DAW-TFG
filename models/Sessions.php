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
    $query->bindParam(':contrasena', password_hash($contrasena, PASSWORD_BCRYPT));
    $query->execute();
    
    return $query->fetchall(PDO::FETCH_ASSOC);
  }

  function iniciarSesionUsuario ($usuario, $contrasena) {
  }

}

?>