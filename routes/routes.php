<?php 

$router->add('/404', 'GET', function() {
  require_once('./views/app/errors/404.html');
});

$router->add('/403', 'GET', function() {
  require_once('./views/app/errors/403.html');
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

require_once('./routes/auth.php');

?>