<?php 
require_once('../models/Asistente.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrarAsistentes() {
  $datos = obtenerAsistentes();

  foreach ($datos as $dato) {
    echo '<tr class="table__data">';
    echo '<td class="data__piece"><b>'.$dato['dni'].'</b></td>';
    echo '<td class="data__piece">'.$dato['nombre'].'</td>';
    echo '<td class="data__piece">'.$dato['apellidos'].'</td>';
    echo '<td class="data__piece">'.$dato['direccion'].'</td>';
    echo '<td class="data__piece">'.$dato['telefono'].'</td>';
    echo '<td class="data__piece">'.$dato['email'].'</td>';
    echo '<td class="data__piece">'.$dato['fecha_union'].'</td>';
    echo '<td class="data__piece">'.$dato['disponibilidad'].'</td>';
    echo "<td class='data__btn'><button class='update__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-pen-to-square'></i></button>";
    echo "<td class='data__btn'><button class='delete__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-trash'></i></button>";
    echo "</tr>";
  }
}

function nuevoAsistente() {
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $passwd = isset($_POST['password']) ? $_POST['password'] : null;
    $fecha_union = isset($_POST['fecha_union']) ? $_POST['fecha_union'] : null;
    $disponibilidad = isset($_POST['disponibilidad']) ? $_POST['disponibilidad'] : null;

        insertarAsistente($dni, $nombre, $apellidos, $direccion, $telefono, $email, $passwd, $fecha_union, $disponibilidad);
    
}

function modificarAsistente() {
    $dni_old = isset($_POST['dni_old']) ? $_POST['dni_old'] : null;
    $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $passwd = isset($_POST['password']) ? $_POST['password'] : null;
    $fecha_union = isset($_POST['fecha_union']) ? $_POST['fecha_union'] : null;
    $disponibilidad = isset($_POST['disponibilidad']) ? $_POST['disponibilidad'] : null;


    actualizarAsistente($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, $email, $passwd, $fecha_union, $disponibilidad);
}

function asistenteEliminar() {
    $dni = isset($_POST['dni']) ? (int) $_POST['dni'] : null;
    eliminarAsistente($dni);
}

if ($method == "insert") {
    nuevoAsistente();
} else if ($method == "delete") {
    asistenteEliminar();
} else if ($method == "update") {
    modificarAsistente();
}
?>