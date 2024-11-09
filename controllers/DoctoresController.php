<?php 
require_once('../models/Doctores.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrarDoctores() {
  $datos = obtenerDoctores();

  foreach ($datos as $dato) {
    echo '<tr class="table__data">';
    echo '<td class="data__piece">'.$dato['dni'].'</td>';
    echo '<td class="data__piece">'.$dato['nombre'].'</td>';
    echo '<td class="data__piece">'.$dato['apellidos'].'</td>';
    echo '<td class="data__piece">'.$dato['direccion'].'</td>';
    echo '<td class="data__piece">'.$dato['telefono'].'</td>';
    echo '<td class="data__piece">'.$dato['email'].'</td>';
    echo '<td class="data__piece">'.$dato['especialidad'].'</td>';
    echo '<td class="data__piece">'.$dato['fecha_union'].'</td>';
    echo '<td class="data__piece">'.$dato['disponibilidad'].'</td>';
    echo "<td class='data__btn'><button class='update__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-pen-to-square'></i></button>";
    echo "<td class='data__btn'><button class='delete__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-trash'></i></button>";
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

function doctorEliminar() {
    $dni = isset($_POST['dni']) ? (int) $_POST['dni'] : null;
    eliminarDoctor($dni);
}

if ($method == "insert") {
    nuevoDoctor();
} else if ($method == "delete") {
    doctorEliminar();
} else if ($method == "update") {
    modificarDoctor();
}
?>