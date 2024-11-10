<?php 
require_once('../models/Pacientes.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrar() {
  $datos = obtener();

  foreach ($datos as $dato) {
    echo '<tr class="table__data">';
    echo '<td class="data__piece"><b>'.$dato['dni'].'</b></td>';
    echo '<td class="data__piece">'.$dato['nombre'].'</td>';
    echo '<td class="data__piece">'.$dato['apellidos'].'</td>';
    echo '<td class="data__piece">'.$dato['direccion'].'</td>';
    echo '<td class="data__piece">'.$dato['telefono'].'</td>';
    echo '<td class="data__piece">'.$dato['email'].'</td>';
    echo "<td class='data__btn'><button class='update__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-pen-to-square'></i></button> 
    <button class='delete__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-trash'></i></button> </td>";
    echo "</tr>";
  }
}

function nuevo() {
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

        insertar($dni, $nombre, $apellidos, $direccion, $telefono, $email);
    
}

function modificar() {
    $dni_old = isset($_POST['dni_old']) ? $_POST['dni_old'] : null;
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $passwd = isset($_POST['password']) ? $_POST['password'] : null;


    actualizar($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, $email, $passwd);
}

function eliminar() {
    $dni = isset($_POST['dni']) ? (int) $_POST['dni'] : null;
    delete($dni);
}

if ($method == "insert") {
    nuevo();
} else if ($method == "delete") {
    eliminar();
} else if ($method == "update") {
    modificar();
}
?>