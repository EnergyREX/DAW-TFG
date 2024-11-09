<?php 
require_once('../models/Pacientes.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrarPacientes() {
  $datos = obtenerPacientes();

  foreach ($datos as $dato) {
    echo '<tr class="table__data">';
    echo '<td class="data__piece">'.$dato['dni'].'</td>';
    echo '<td class="data__piece">'.$dato['nombre'].'</td>';
    echo '<td class="data__piece">'.$dato['apellidos'].'</td>';
    echo '<td class="data__piece">'.$dato['direccion'].'</td>';
    echo '<td class="data__piece">'.$dato['telefono'].'</td>';
    echo '<td class="data__piece">'.$dato['email'].'</td>';
    echo "<td class='data__btn'><button class='update__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-pen-to-square'></i></button>";
    echo "<td class='data__btn'><button class='delete__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-trash'></i></button>";
    echo "</tr>";
  }
}

function nuevoPaciente() {
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

        insertarPaciente($dni, $nombre, $apellidos, $direccion, $telefono, $email);
    
}

function modificarPaciente() {
    $dni_old = isset($_POST['dni_old']) ? $_POST['dni_old'] : null;
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $passwd = isset($_POST['password']) ? $_POST['password'] : null;


    actualizarPaciente($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, $email, $passwd);
}

function pacienteEliminar() {
    $dni = isset($_POST['dni']) ? (int) $_POST['dni'] : null;
    eliminarPaciente($dni);
}

if ($method == "insert") {
    nuevoPaciente();
} else if ($method == "delete") {
    pacienteEliminar();
} else if ($method == "update") {
    modificarPaciente();
}
?>