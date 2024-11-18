<?php 

require $_SERVER['DOCUMENT_ROOT']."/models/IndexPanel.php";

class IndexPanelController {
  private $indexPanel;

  function __construct() {
    $this->indexPanel = new IndexPanel();
  }

  function citas() {
    $resultado = $this->indexPanel->obtenerCitas();
    return $resultado[0]['count(*)'];
  }

  function doctores() {
    $resultado = $this->indexPanel->obtenerDoctores();
    return $resultado[0]['count(*)'];
  }

  function pacientes() {
    $resultado = $this->indexPanel->obtenerPacientes();
    return $resultado[0]['count(*)'];
  }

  function citasConfirm() {
    $resultado = $this->indexPanel->obtenerCitasConfirmadas();
    foreach ($resultado as $dato) {
      echo '<tr class="table__data">';
          echo '<td class="data__piece"><b>'.$dato['id'].'</b></td>';
          echo '<td class="data__piece">'.$dato['paciente'].'</td>';
          echo '<td class="data__piece">'.$dato['nombre_paciente'].'</td>';
          echo '<td class="data__piece">'.$dato['doctor'].'</td>';
          echo '<td class="data__piece">'.$dato['nombre_doctor'].'</td>';
          if ($dato['estado'] == "Confirmada") {
            echo '<td class="data__piece"><span class="piece__badge-confirmed">'.$dato['estado'].'</span></td>';
          } else if ($dato['estado'] == "Pendiente") {
            echo '<td class="data__piece"><span class="piece__badge-pending">'.$dato['estado'].'</span></td>';
          } else if ($dato['estado'] == "Cancelada") {
            echo '<td class="data__piece"><span class="piece__badge-cancelled">'.$dato['estado'].'</span></td>';
          }
          echo '<td class="data__piece">'.$dato['motivo'].'</td>';
          echo '<td class="data__piece">'.$dato['dia'].'</td>';
          echo '<td class="data__piece">'.$dato['hora'].'</td>';
      echo "</tr>";
  }
  }
 }

?>