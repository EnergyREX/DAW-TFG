<?php 

class Router {
  // Variable routes. Stores objects with an endpoint inside, a method condition and a callable action.
  private $routes = [];
  private $roleProtectedRoutes = [];

  // Function add. Saves in the $routes array a route. Attends any type of method.
  public function add(string $endpoint, string $method, callable $action) {
    $this->routes[] = [
      'endpoint' => $endpoint,
      'method' => strtoupper($method),
      'action' => $action
    ];
  }

  public function addProtected(string $endpoint, string $method, callable $action, int $role) {
    $this->roleProtectedRoutes[] = [
      'endpoint' => $endpoint,
      'method' => strtoupper($method),
      'action' => $action,
      'role' => $role
    ];
  }

  // Function run. Runs all routes and searches for a coincidence 
  // between the URI and the stored routes. 
  public function run() {
    $URI = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    $found = false;

    foreach ($this->routes as $route) {
      if ($route['method'] === $method && $route['endpoint'] === $URI) {
        session_start();
        if (!isset($_SESSION['role_id'])) {
          http_response_code(403);
          $found = true;
          header('Location: /403');
          return;
        } else if (isset($_SESSION['role_id'])) {
          call_user_func($route['action']);
          http_response_code(200);
          $found = true;
          break;
        }
      }
      if (!$found) {
        http_response_code(404);
        header('Location: /404');
      }
    }

    foreach ($this->routes as $route) {
      if ($route['method'] === $method && $route['endpoint'] === $URI) {
        call_user_func($route['action']);
        http_response_code(200);
        $found = true;
        break;
      }
    }

    if (!$found) {
      http_response_code(404);
      header('Location: /404');
    }
  }
}

?>