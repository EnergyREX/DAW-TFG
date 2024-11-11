<?php 
require_once('../models/Tratamiento.php');

class TratamientoController {
    private $tratamiento;

    function __construct() {
        $this->tratamiento = new Tratamiento();
    }

    function mostrar() {
        $datos = $this->tratamiento->obtener();
      
        foreach ($datos as $dato) {
          echo '<tr class="table__data">';
              echo '<td class="data__piece"><b>'.$dato['id'].'</b></td>';
              echo '<td class="data__piece">'.$dato['nombre'].'</td>';
              echo '<td class="data__piece">'.$dato['precio'].'€</td>';
              echo "<td class='data__btn'><button class='update__btn' data-id='".$dato['id']."'><i class='fa-solid fa-pen-to-square'></i></button> 
              <button class='delete__btn' data-id='".$dato['id']."'><i class='fa-solid fa-trash'></i></button></td>";
          echo "</tr>";
        }
      }
      
      function nuevo() {
          $id = isset($_POST['id']) ? $_POST['id'] : null;
          $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
          $precio = isset($_POST['precio']) ? $_POST['precio'] : null;
      
          $this->tratamiento->insertar($id, $nombre, $precio);
      }
      
      function modificar() {
          $id = isset($_POST['id']) ? $_POST['id'] : null;
          $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
          $precio = isset($_POST['precio']) ? $_POST['precio'] : null;
      
          $this->tratamiento->actualizar($id, $nombre, $precio);
      }
      
      function eliminar() {
          $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
          $this->tratamiento->delete($id);
      }
      
      function procesarMetodo($method) {

        switch ($method) {
            case "insert":
                $this->nuevo();
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

$controller = new TratamientoController();
$method = isset($_POST['method']) ? $_POST['method'] : null;
$controller->procesarMetodo($method);

?>