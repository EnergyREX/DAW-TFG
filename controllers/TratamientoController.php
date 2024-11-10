<?php 
require_once('../models/Tratamiento.php');

$method = isset($_POST['method']) ? $_POST['method'] : null;

function mostrar() {
  $datos = obtener();

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

    insertar($id, $nombre, $precio);
    
}

function modificar() {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : null;

    actualizar($id, $nombre, $precio);
}

function eliminar() {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
    delete($id);
}

if ($method == "insert") {
    nuevo();
} else if ($method == "delete") {
    eliminar();
} else if ($method == "update") {
    modificar();
}
?>