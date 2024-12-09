<?php 

require_once ('./controllers/Router.php');

// Create a Router object.
$router = new Router();

// Get all routes from routes.php
require_once('./routes/routes.php');

// Run all routes
$router->run();
?>