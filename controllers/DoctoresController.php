<?php 
require_once('../models/Citas.php');

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

function nuevaCita() {
    $paciente = isset($_POST['paciente']) ? $_POST['paciente'] : null;
    $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;
    $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $hora = isset($_POST['hora']) ? $_POST['hora'] : null;


        insertarCitas($paciente, $doctor, $motivo, $estado, $dia, $hora);
    
}

function modificarCita() {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $paciente = isset($_POST['paciente']) ? $_POST['paciente'] : null;
    $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;
    $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $hora = isset($_POST['hora']) ? $_POST['hora'] : null;

    obtenerCitas();

    actualizarCita($id, $paciente, $doctor, $motivo, $estado, $dia, $hora);
}

function eliminarCita() {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
    eliminarCitas($id);
}

if ($method == "insert") {
    nuevaCita();
} else if ($method == "delete") {
    eliminarCita();
} else if ($method == "update") {
    modificarCita();
}
?>