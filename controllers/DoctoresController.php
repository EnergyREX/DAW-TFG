<?php 
require_once('../models/Doctores.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrarDoctores() {
  $datos = obtenerDoctores();

  foreach ($datos as $dato) {
    echo '<tr>';
    echo '<td>'.$dato['dni'].'</td>';
    echo '<td>'.$dato['nombre'].'</td>';
    echo '<td>'.$dato['apellidos'].'</td>';
    echo '<td>'.$dato['direccion'].'</td>';
    echo '<td>'.$dato['telefono'].'</td>';
    echo '<td>'.$dato['email'].'</td>';
    echo '<td>'.$dato['especialidad'].'</td>';
    echo '<td>'.$dato['fecha_union'].'</td>';
    echo '<td>'.$dato['disponibilidad'].'</td>';
    echo "<td><button class='update__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-pen-to-square'></i></button>";
    echo "<td><button class='delete__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-trash'></i></button>";
    echo "</tr>";
  }
}

function nuevoDoctor() {
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
    $fecha_union = isset($_POST['fecha_union']) ? $_POST['fecha_union'] : null;
    $disponibilidad = isset($_POST['disponibilidad']) ? $_POST['disponibilidad'] : null;

        insertarDoctor($dni, $nombre, $apellidos, $direccion, $telefono, $email, 
        $especialidad, $fecha_union, $disponibilidad);
    
}

function modificarDoctor() {
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
    $fecha_union = isset($_POST['fecha_union']) ? $_POST['fecha_union'] : null;
    $disponibilidad = isset($_POST['disponibilidad']) ? $_POST['disponibilidad'] : null;

    actualizarDoctor($dni, $nombre, $apellidos, $direccion, $telefono, $email, 
    $especialidad, $fecha_union, $disponibilidad);
}

function eliminarDoctor() {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
    eliminarDoctor($id);
}

if ($method == "insert") {
    nuevaCita();
} else if ($method == "delete") {
    eliminarCita();
} else if ($method == "update") {
    modificarCita();
}
?>