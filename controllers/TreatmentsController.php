<?php 

require_once '../models/Treatments.php';
// Class AppointmentsController
class AppointmentsController {
  protected $model;

  function __construct() {
    $this->model = new Appointments();
  }
  // If petition = GET
  function getAppointments() {
    return json_encode($this->model->get());
  }

  // If petition = POST
  function newAppointment($params) {
    $data = $this->model->insert($params);
  }

  // If petition = PUT
  function updateAppointment($params) {
  $this->model->update($params);
  }

  // If petition = DELETE
  function deleteAppointment($params) {
    $this->model->delete($params);
  }

  function manageRequest($params) {
    // If request is a GET
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $this->getAppointments();
    }
  }

}

?>