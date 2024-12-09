<?php 

$router->add('/404', 'GET', function() {
  require_once('./views/app/errors/404.php');
});

// Gets the dashboard page.
$router->add('/dashboard', 'GET', function() {
  echo "RUTA /dashboard";
});

require_once('./routes/appointments.php');

require_once('./routes/inventory.php');

require_once('./routes/records.php');

require_once('./routes/treatments.php');

require_once('./routes/roles.php');

?>