<?php 
require_once('../models/Citas.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrar() {
  $datos = obtener();

  foreach ($datos as $dato) {
    echo '<tr class="table__data">';
        echo '<td class="data__piece"><b>'.$dato['id'].'</b></td>';
        echo '<td class="data__piece">'.$dato['paciente'].'</td>';
        echo '<td class="data__piece">'.$dato['nombre_paciente'].'</td>';
        echo '<td class="data__piece">'.$dato['doctor'].'</td>';
        echo '<td class="data__piece">'.$dato['nombre_doctor'].'</td>';
        echo '<td class="data__piece">'.$dato['estado'].'</td>';
        echo '<td class="data__piece">'.$dato['motivo'].'</td>';
        echo '<td class="data__piece">'.$dato['dia'].'</td>';
        echo '<td class="data__piece">'.$dato['hora'].'</td>';
        echo "<td class='data__btn'><button class='update__btn' data-id='".$dato['id']."'><i class='fa-solid fa-pen-to-square'></i></button> 
        <button class='delete__btn' data-id='".$dato['id']."'><i class='fa-solid fa-trash'></i></button>";
    echo "</tr>";
  }
}

function nueva() {
    $paciente = isset($_POST['paciente']) ? $_POST['paciente'] : null;
    $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;
    $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $hora = isset($_POST['hora']) ? $_POST['hora'] : null;


    insertar($paciente, $doctor, $motivo, $estado, $dia, $hora);
    
}

function modificar() {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $paciente = isset($_POST['paciente']) ? $_POST['paciente'] : null;
    $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;
    $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
    $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $hora = isset($_POST['hora']) ? $_POST['hora'] : null;

    obtener();

    actualizar($id, $paciente, $doctor, $motivo, $estado, $dia, $hora);
}

function eliminar() {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
    delete($id);
}

if ($method == "insert") {
    nueva();
} else if ($method == "delete") {
    eliminar();
} else if ($method == "update") {
    modificar();
}
?>