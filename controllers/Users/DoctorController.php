<?php 

// Class AdminController, manages renders

require_once('../../models/User.php');

class DoctorController {
  private $model;

  function __construct () {
    $this->model = new User();
  }
// CollectData
public function getDoctors() {
  $data = $this->model->getByRole(3);
  try {
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($data);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
  }
}

}


?>