<?php 

require_once './models/User.php';
// Class AppointmentsController
class UserController {
  protected $model;

  function __construct() {
    $this->model = new User();
  }
  // If petition = GET
  function getAppointments() {
    return $this->model->get();
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

}

?>