<?php 

class Router {
  // Variable routes. Stores objects with an endpoint inside, a method condition and a callable action.
  private $routes = [];

  // Function add. Saves in the $routes array a route.
  public function add(string $endpoint, string $method, callable $action) {
    $this->routes[] = [
      'endpoint' => $endpoint,
      'method' => strtoupper($method),
      'action' => $action
    ];
  }

  // Function run. Runs all routes and searches for a coincidence 
  // between the URI and the stored routes. 
  public function run() {
    $routes = $this->routes;
    $URI = $_SERVER['REQUEST_URI'];
    $method = $_SERVER['REQUEST_METHOD'];

    foreach ($routes as $route) {
      if ($route['method'] == $URI && $route['endpoint'] == $URI) {
        // Llama a la función en el array de objetos.
        call_user_func($route['action']);
        break;
      }
      http_response_code(404);
      echo "ERROR 404";
    }
  }
}

?>