<?php 

require_once ('./controllers/Router.php');

// Create a Router object.
$router = new Router();

require_once('./routes/routes.php');

$router->add('/user/:id', 'GET', function($id) {
  echo "User ID: " . $id;
});

// Run all routes
$router->run();
?>