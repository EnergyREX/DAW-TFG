<?php 

require_once ('./controllers/RecordsController.php');

// Records routes

// GET the view
$router->add('/records', 'GET', function() {
  require_once('./views/app/pages/records.php');
});

// GET table's data.
$router->add('/records/getAll', 'GET', function() {
  $controller = new RecordsController();
  $controller->getRecords();
});

// POST new data.
$router->add('/records/new', 'POST', function() {
  $controller = new RecordsController();
  $params = $_POST['params'];
  $controller->newRecord($params);
}); 

// UPDATE an Appointment
$router->add('/records/update', 'POST', function() {
  $controller = new RecordsController();
  $params = $_POST['params'];
  $controller->updateRecord($params);
}); 

// DELETE an Appointment
$router->add('/records/delete', 'POST', function() {
  $controller = new RecordsController();
  $params = $_POST['params'];
  $controller->deleteRecord($params);
});

?>