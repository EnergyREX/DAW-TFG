<?php 
require_once('../models/Admin.php');

class AdminsController {
    private $admins;

    function __construct() {
        $this->admins = new Admins();
    }

    function mostrar() {
        $datos = $this->admins->obtener();
      
        foreach ($datos as $dato) {
          echo '<tr class="table__data">';
          echo '<td class="data__piece"><b>'.$dato['dni'].'</b></td>';
          echo '<td class="data__piece">'.$dato['nombre'].'</td>';
          echo '<td class="data__piece">'.$dato['apellidos'].'</td>';
          echo '<td class="data__piece">'.$dato['direccion'].'</td>';
          echo '<td class="data__piece">'.$dato['telefono'].'</td>';
          echo '<td class="data__piece">'.$dato['email'].'</td>';
          echo '<td class="data__piece">'.$dato['especialidad'].'</td>';
          echo '<td class="data__piece">'.$dato['fecha_union'].'</td>';
          echo '<td class="data__piece">'.$dato['disponibilidad'].'</td>';
          echo "<td class='data__btn'><button class='update__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-pen-to-square'></i></button> 
          <button class='delete__btn' data-id='".$dato['dni']."'><i class='fa-solid fa-trash'></i></button> </td>";
          echo "</tr>";
        }
      }
      
      function nuevo() {
          $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
          $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
          $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
          $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
          $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
          $email = isset($_POST['email']) ? $_POST['email'] : null;
          $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
          $fecha_union = isset($_POST['fecha_union']) ? $_POST['fecha_union'] : null;
          $disponibilidad = isset($_POST['disponibilidad']) ? $_POST['disponibilidad'] : null;
          $passwd = isset($_POST['password']) ? $_POST['password'] : null;
      
      
          $this->admins->insertar($dni, $nombre, $apellidos, $direccion, $telefono, $email, $passwd, 
              $especialidad, $fecha_union, $disponibilidad);
          
      }
      
      function modificar() {
          $dni_old = isset($_POST['dni_old']) ? $_POST['dni_old'] : null;
          $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
          $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
          $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
          $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
          $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
          $email = isset($_POST['email']) ? $_POST['email'] : null;
          $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
          $fecha_union = isset($_POST['fecha_union']) ? $_POST['fecha_union'] : null;
          $disponibilidad = isset($_POST['disponibilidad']) ? $_POST['disponibilidad'] : null;
      
          $this->admins->actualizar($dni_old, $dni, $nombre, $apellidos, $direccion, $telefono, $email, 
          $especialidad, $fecha_union, $disponibilidad);
      }
      
      function eliminar() {
          $dni = isset($_POST['dni']) ? $_POST['dni'] : null;
          $this->admins->delete($dni);
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

$controller = new DoctoresController();
$method = isset($_POST['method']) ? $_POST['method'] : null;
$controller->procesarMetodo($method);

?>