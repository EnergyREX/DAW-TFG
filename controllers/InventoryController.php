<?php 

require_once './models/Inventory.php';
// Class AppointmentsController
class InventoryController {
  protected $model;

  function __construct() {
    $this->model = new Inventory();
  }
  // If petition = GET
  function getItems() {
    try {
      header('Content-Type: application/json');
      $inventory = $this->model->get();
      if (!empty($inventory)) {
        http_response_code(200);
        echo json_encode($inventory);
      }
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
    }
  }

  // If petition = POST
  function newItem($params) {
    $data = $this->model->insert($params);
  }

  // If petition = PUT
  function updateItem($params) {
  $this->model->update($params);
  }

  // If petition = DELETE
  function deleteItem($params) {
    $this->model->delete($params);
  }

}

?>