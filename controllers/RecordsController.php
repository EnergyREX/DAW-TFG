<?php 

require_once './models/MedicalRecords.php';
// Class RecordsController
class RecordsController {
  protected $model;

  function __construct() {
    $this->model = new MedicalRecords();
  }
  // If petition = GET
  function getRecords() {
    return $this->model->get();
  }

  // If petition = POST
  function newRecord($params) {
    $data = $this->model->insert($params);
  }

  // If petition = PUT
  function updateRecord($params) {
  $this->model->update($params);
  }

  // If petition = DELETE
  function deleteRecord($params) {
    $this->model->delete($params);
  }

}

?>