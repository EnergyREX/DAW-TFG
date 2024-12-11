<?php 

$router->add('/login', 'GET', function() {
  require_once('./views/app/pages/auth/login.php');
});

$router->add('/register', 'GET', function() {
  require_once('./views/app/pages/auth/register.php');
});

$router->add('/register/process', 'POST', function() {
  require_once('./controllers/AuthController.php');
});

$router->add('/login', 'GET', function() {
  require_once('./views/app/pages/auth/login.php');
})


?>