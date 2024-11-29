<?php 

require_once './models/Appointments.php';
// Class AppointmentsController
class AppointmentsController {
  protected $model;

  function __construct() {
    $this->model = new Appointments();
  }
  // If petition = GET
  function getAppointments() {
    return $this->model->get();
  }

  // If petition = POST
  function newAppointment($params) {
    $data = $this->model->insert($params);
    return json_encode($data);
  }

  // If petition = PUT
  function updateAppointment($params) {
  $this->model->update($params);
  }

  // If petition = DELETE
  function deleteAppointment($params) {
    $this->model->delete($params);
  }

}

?>