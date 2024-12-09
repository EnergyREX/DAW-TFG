<?php 

require_once ('./controllers/RolesController.php');

// Roles routes

// GET the view
$router->add('/roles', 'GET', function() {
  require_once('./views/app/pages/roles.php');
});

// GET table's data.
$router->add('/roles/getAll', 'GET', function() {
  $model = new RolesController();
  $model->getRoles();
});

?>