<?php 

require_once ('./models/Auth.php');

class AuthController {

  private $model;

  function __construct() {
    $this->model = new Auth();
  }
  // Manages the contact with the view and model
  // Used this to verify users and create new sessions.

  public function register() {
    
  }
}

?>