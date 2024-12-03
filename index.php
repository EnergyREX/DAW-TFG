<?php 

require_once ('./controllers/Router.php');

$router = new Router();

$router->add('/', 'GET', function() {
  echo "RUTA /";
});

$router->add('/dashboard', 'GET', function() {
  echo "RUTA /dashboard";
});

$router->run();
?>