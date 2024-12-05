<?php 

require_once ('./controllers/Router.php');

// Create a Router object.
$router = new Router();

// Getting all routes.
require_once('./routes/routes.php');

// Run all routes
$router->run();
?>