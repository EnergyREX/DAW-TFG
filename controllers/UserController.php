<?php 
require_once('../models/User.php');

session_start();


class UserController {
    private $userModel;

    function __construct() {
        $this->userModel = new User();
    }

    function register() {
        $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
        $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;


        $this->userModel->register($dni, $nombre, $apellidos, $direccion, $telefono, $email, $contrasena);
    }

    function login() {

        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : null;

        $rol = $this->userModel->existeEmail($email);
        $user = $this->userModel->login($email, $contrasena, $rol);

        if($user) {
            session_destroy();
            session_start();
            $_SESSION['email'] = $user['email'];
            $_SESSION['rol'] = $rol;
            $_SESSION['especialidad'] = $user['especialidad'];
            header("Location: /view/index.php");
            exit();
        } else {
            echo "Credenciales Incorrectas.";
        }
    }

    function procesarMetodo($method) {
        switch ($method) {
        case "login":
            $this->login();
            break;
        case "register":
            $this->register();
            break;       
         }
    }
}

$controller = new UserController();
$method = isset($_POST['method']) ? $_POST['method'] : null;
$controller->procesarMetodo($method);

?>