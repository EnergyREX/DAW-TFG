<?php 

require_once('../config/config.inc.php');

class Asistente {
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
      $sqlQuery = "SELECT * FROM asistente";
      $query = $this->pdo->prepare($sqlQuery);
      $query->execute();
      return $query->fetchall(PDO::FETCH_ASSOC);
    }
    
    function insertar($dni, $nombre, $apellidos, $direccion, $telefono, 
                            $email, $passwd, $fecha_union, $disponibilidad) {

      $sqlQuery = "INSERT INTO asistente (dni, nombre, apellidos, direccion, telefono, email, contraseña, fecha_union, disponibilidad)
       VALUES (:dni, :nombre, :apellidos, :direccion, :telefono, :email, :passwd, 
               :fecha_union, ':disponibilidad')";
    
      $query = $this->pdo->prepare($sqlQuery);
      $query->bindParam(':dni', $dni);
      $query->bindParam(':nombre', $nombre);
      $query->bindParam(':apellidos', $apellidos);
      $query->bindParam(':direccion', $direccion);
      $query->bindParam(':telefono', $telefono);
      $query->bindParam(':email', $email);
      $query->bindParam(':passwd', $passwd);
      $query->bindParam(':fecha_union', $fecha_union);
      $query->bindParam(':disponibilidad', $disponibilidad);
                                   
      $query->execute();
      
      return $query->fetchall(PDO::FETCH_ASSOC);
    }
    
    function delete($dni) {      
        $sqlQuery = "DELETE FROM asistente WHERE dni = :dni";
        $query = $this->pdo->prepare($sqlQuery);
        $query->bindParam(':dni', $dni);
        $query->execute();
    }
    
    function actualizar($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, 
                              $email, $passwd) {    
        $sqlQuery = 
        "UPDATE asistente SET 
        dni = :dni, 
        nombre = :nom.bre, 
        apellidos = :apellidos, 
        direccion = :direccion, 
        telefono = :telefono, 
        email = :email,
        contraseña = :passwd
        WHERE dni = :dni_old;";
    
        $query = $this->pdo->prepare($sqlQuery);
        $query->bindParam(':dni', $dni);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellidos', $apellidos);
        $query->bindParam(':direccion', $direccion);
        $query->bindParam(':telefono', $telefono);
        $query->bindParam(':email', $email);
        $query->bindParam(':passwd', $passwd);
        $query->bindParam(':fecha_union', $fecha_union);
        $query->bindParam(':disponibilidad', $disponibilidad);
        $query->bindParam(':dni_old', $dni_old);
        $query->execute();
      } 
  }
?>  