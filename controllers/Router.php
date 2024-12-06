<?php 

class Router {
  // Variable routes. Stores objects with an endpoint inside, a method condition and a callable action.
  private $routes = [];

  // Function add. Saves in the $routes array a route. For any type of HTTP method.
  public function add(string $endpoint, string $method, callable $action) {

    // Save the route details
    $this->routes[] = [
        'endpoint' => $endpoint,
        'method' => strtoupper($method),
        'action' => $action
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