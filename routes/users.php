<?php 

require_once('./controllers/Users/AdminController.php');
require_once('./controllers/Users/AssistantController.php');
require_once('./controllers/Users/DoctorController.php');
require_once('./controllers/Users/PatientController.php');
require_once('./controllers/Users/UsersController.php');

// Get all users view
$router->add('/users', 'GET', function() {
  require_once('./views/app/pages/users/users.php');
});

// GET admins view
$router->add('/admins', 'GET', function() {
  require_once('./views/app/pages/users/admins.php');
});

// GET doctors view
$router->add('/doctors', 'GET', function() {
  require_once('./views/app/pages/users/doctors.php');
});

// GET assistants view
$router->add('/assistants', 'GET', function() {
  require_once('./views/app/pages/users/assistants.php');
});

// GET patients view
$router->add('/patients', 'GET', function() {
  require_once('./views/app/pages/users/patients.php');
});


?>