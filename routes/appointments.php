<?php 

require_once ('./controllers/AppointmentsController.php');

// Appointments routes

// GET the view
$router->add('/appointments', 'GET', function() {
  require_once('./views/app/pages/appointments.php');
});

// GET table's data.
$router->add('/appointments/getAll', 'GET', function() {
  $appointments = new AppointmentsController();
  $appointments->getAppointments();
});

// POST new data.
$router->add('/appointments/new', 'POST', function() {
  $appointments = new AppointmentsController();
  $params = $_POST['params'];
  $appointments->newAppointment();
}); 

// UPDATE an Appointment
$router->add('/appointments/update', 'POST', function() {
  $appointments = new AppointmentsController();
  $params = $_POST['params'];
  $appointments->updateAppointment($params);
}); 

// DELETE an Appointment
$router->add('/appointments/delete', 'POST', function() {
  $appointments = new AppointmentsController();
  $params = $_POST['params'];
  $appointments->deleteAppointment($params);
});

?>