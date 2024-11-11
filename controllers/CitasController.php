<?php 
require_once('../models/Citas.php');

class CitasController {
    private $citas;

    function __construct() {
        $this->citas = new Citas();
    }

    function mostrar() {
        $datos = $this->citas->obtener();
      
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
      
      
          $this->citas->insertar($paciente, $doctor, $motivo, $estado, $dia, $hora);
          
      }
      
      function modificar() {
          $id = isset($_POST['id']) ? $_POST['id'] : null;
          $paciente = isset($_POST['paciente']) ? $_POST['paciente'] : null;
          $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : null;
          $motivo = isset($_POST['motivo']) ? $_POST['motivo'] : null;
          $estado = isset($_POST['estado']) ? $_POST['estado'] : null;
          $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
          $hora = isset($_POST['hora']) ? $_POST['hora'] : null;
      
          $this->citas->actualizar($id, $paciente, $doctor, $motivo, $estado, $dia, $hora, $id);
      }
      
      function eliminar() {
          $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
          $this->citas->delete($id);
      }
      
      function procesarMetodo($method) {
        switch ($method) {
        case "insert":
            $this->nueva();
            break;
        case "delete":
            $this->eliminar();
            break;
        case "update":
             $this->modificar();
            break;        
         }
    }
}

$controller = new PacientesController();
$method = isset($_POST['method']) ? $_POST['method'] : null;
$controller->procesarMetodo($method);
?>