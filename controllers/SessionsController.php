<?php 

require_once '../models/Sessions.php';

class SessionsController {
  private $sessions;

  function __construct() {
    $this->sessions = new Sessions;
  }

  function register() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
      $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
      $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
      $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
      $email = isset($_POST['email']) ? $_POST['email'] : null;
      $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
      $contrasena = isset($_POST['passwd']) ? $_POST['passwd'] : null;
      $repContrasena = isset($_POST['rpasswd']) ? $_POST['rpasswd'] : null;

      if ($contrasena == $repContrasena) {
        $this->sessions->nuevoPaciente($dni, $nombre, $apellidos, $direccion, $email, $telefono, $contrasena);
    } else {
      echo ("Hay un error en tu registro.");
    }

    }
  }

  function login() {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = isset($_POST['email']) ? $_POST['email'] : null;
      $contrasena = isset($_POST['passwd']) ? $_POST['passwd'] : null;

      $this->sessions->iniciarSesion($email, $contrasena);
    }
  }
}

?> 