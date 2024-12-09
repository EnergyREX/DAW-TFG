<?php 

require_once './models/Roles.php';
// Class AppointmentsController
class RolesController {
  protected $model;

  function __construct() {
    $this->model = new Roles();
  }
  // If petition = GET
  function getRoles() {
    return $this->model->get();
  }
}

?>