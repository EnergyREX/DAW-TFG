<?php 

// Class AdminController, manages renders

require_once('../../models/User.php');

class AdminController {
  private $model;

  function __construct () {
    $this->model = new User();
  }
// CollectData
public function get() {
  $data = $this->model->get();
  try {
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($data);
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
  }
}

// New admin
public function new($params) {
  $this->model->insert($params);
  try {
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode("New user created sucessfully.");
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
  }
}

// Update Admin
public function update($params) {
  $this->model->update($params);
  try {
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode("New user created sucessfully.");
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
  }
}

// Delete an Admin
public function delete($dni) {
  $this->model->delete($dni);
  try {
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode("New user created sucessfully.");
  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
  }
}

}


?>