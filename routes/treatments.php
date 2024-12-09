<?php 

require_once ('./controllers/TreatmentsController.php');

// Treatments routes

// GET the view
$router->add('/treatments', 'GET', function() {
  require_once('./views/app/pages/treatments.php');
});

// GET table's data.
$router->add('/treatments/getAll', 'GET', function() {
  $model = new TreatmentsController();
  $model->getTreatments();
});

// POST new treatment.
$router->add('/treatments/new', 'POST', function() {
  $controller = new TreatmentsController();
  $params = $_POST['params'];
  $controller->newTreatment($params);
}); 

// UPDATE a treatment
$router->add('/treatments/update', 'POST', function() {
  $controller = new TreatmentsController();
  $params = $_POST['params'];
  $controller->updateTreatment($params);
}); 

// DELETE a treatment
$router->add('/treatments/delete', 'POST', function() {
  $controller = new TreatmentsController();
  $params = $_POST['params'];
  $controller->deleteTreatment($params);
});

?>