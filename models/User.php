<?php 

require_once('../config/config.inc.php');

class User {
    private $pdo;

    function __construct() {
        $dsn = DB_DSN;
        $usuario = DB_USER;
        $contrasena = DB_PASS;
      
        try {
          $this->pdo = new PDO($dsn, $usuario, $contrasena);
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          echo "Error de conexión. " . $e->getMessage();
        }    
      }

      // Solo se registrarán pacientes por el método ordinario.
      function register($dni, $nombre, $apellidos, $direccion, $telefono, $email, $contrasena) {  
        $sqlQuery = "INSERT INTO paciente (dni, nombre, apellidos, direccion, telefono, email, contraseña)
         VALUES (:dni, :nombre, :apellidos, :direccion, :telefono, :email, :contrasena)";
    
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $query = $this->pdo->prepare($sqlQuery);
        $query->bindParam(':dni', $dni);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellidos', $apellidos);
        $query->bindParam(':direccion', $direccion);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':email', $email);
        $query->bindParam(':contrasena', $contrasena);
        $query->execute();
      }

      function existeEmail($email) {
        $roles = ['paciente', 'asistente', 'doctores', 'admin'];
        $eRol = null;

        foreach ($roles as $rol) {
          $sql = "SELECT * FROM $rol WHERE email = :email LIMIT 1;";
          $query = $this->pdo->prepare($sql);
          $query->bindParam(':email', $email);
          $query->execute();

          if ($query->fetch()) {
              $eRol = $rol;
              break;
          }
          
        }
        return $eRol;
      }

      function login($email, $contrasena, $rol) {
        if ($rol != null) {
            $sql = "SELECT * FROM $rol WHERE email = :email LIMIT 1";
            $query = $this->pdo->prepare($sql);
            $query->bindParam(':email', $email);
            $query->execute();
    
            $user = $query->fetch(); // Asegúrate de almacenar el resultado en $user
            if ($user) {
                $contrasenaHash = $user['contraseña'];
                if (password_verify($contrasena, $contrasenaHash)) {
                    return $user;
                } else {
                    echo "Contraseña incorrecta.";
                }
            } else {
                echo "Email no existe";
            }
        }
    }
    
}
?>
