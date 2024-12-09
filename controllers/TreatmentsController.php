<?php 

require_once './models/Treatments.php';
// Class AppointmentsController
class TreatmentsController {
  protected $model;

  function __construct() {
    $this->model = new Treatments();
  }
  // If petition = GET
  function getTreatments() {
    return json_encode($this->model->get());
  }

  // If petition = POST
  function newTreatment($params) {
    $data = $this->model->insert($params);
  }

  // If petition = PUT
  function updateTreatment($params) {
  $this->model->update($params);
  }

  // If petition = DELETE
  function deleteTreatment($params) {
    $this->model->delete($params);
  }
}

?>