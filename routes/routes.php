<?php 

$router->add('/404', 'GET', function() {
  require_once('./views/app/errors/404.html');
});


// Gets the root page.
$router->add('/', 'GET', function() {
  echo "RUTA /";
});

// Gets the dashboard page.
$router->add('/dashboard', 'GET', function() {
  echo "RUTA /dashboard";
});

$router->add('/login', 'GET', function() {
  require_once('./views/app/pages/auth/login.php');
});

// Appointments routes
// Render view
$router->add('/appointments', 'GET', function() {
  require_once('./views/app/pages/appointments.html');
});

// GET table's data.
$router->add('/appointments/get', 'GET', function() {
  require_once ('./controllers/AppointmentsController.php');
  $appointments = new AppointmentsController();
  $appointments->getAppointments();
});

$router->add('/appointments/get/:id', 'GET', function($params) {
  require_once ('./controllers/AppointmentsController.php');
  $appointments = new AppointmentsController();
  $appointments->getAppointmentById($params);
});



// Inventory routes
// Render view
$router->add('/inventory', 'GET', function() {
  require_once('./views/app/pages/inventory.php');
});

// GET table's data.
$router->add('/inventory/get', 'GET', function() {
  require_once ('./controllers/InventoryController.php');
  $inventory = new InventoryController();
  $inventory->getInv();
});


?>