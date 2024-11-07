<?php 
require_once('../models/Citas.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrarCitas() {
  $datos = obtenerCitas();

  foreach ($datos as $dato) {
    echo '<tr>';
    echo '<td>'.$dato['id'].'</td>';
    echo '<td>'.$dato['paciente'].'</td>';
    echo '<td>'.$dato['doctor'].'</td>';
    echo '<td>'.$dato['estado'].'</td>';
    echo '<td>'.$dato['motivo'].'</td>';
    echo '<td>'.$dato['dia'].'</td>';
    echo '<td>'.$dato['hora'].'</td>';
    echo "<td><button class='update__btn' data-id='".$dato['id']."'><i class='fa-solid fa-pen-to-square'></i></button>";
    echo "<td><button class='delete__btn' data-id='".$dato['id']."'><i class='fa-solid fa-trash'></i></button>";
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
    $id = isset($_POST['id']) ? $_POST['id'] : null;

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