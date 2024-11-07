<?php 
require_once('../models/Citas.php');

function mostrarCitas() {
  $datos = obtenerCitas();

  foreach ($datos as $dato) {
    echo '<tr>';
    echo '<td>'.$dato['paciente'].'</td>';
    echo '<td>'.$dato['doctor'].'</td>';
    echo '<td>'.$dato['estado'].'</td>';
    echo '<td>'.$dato['motivo'].'</td>';
    echo '<td>'.$dato['dia'].'</td>';
    echo '<td>'.$dato['hora'].'</td>';
    echo "<td><button id='openButton'>U</button>";
    echo "<td><button id='openButton'>D</button>";
  }
}

?>