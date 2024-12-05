<?php 

class Router {
  // Variable routes. Stores objects with an endpoint inside, a method condition and a callable action.
  private $routes = [];

  // Function add. Saves in the $routes array a route. Attends any type of method.
  // Since there are more methods than GET, POST, PUT and DELETE.
  // https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods -> ALL HTTP methods
  public function add(string $endpoint, string $method, callable $action) {
    $this->routes[] = [
      'endpoint' => $endpoint,
      'method' => strtoupper($method),
      'action' => $action
    ];
  }

  // Method GET
  public function get(string $endpoint, callable $action) {
    $this->routes[] = [
      'endpoint' => $endpoint,
      'method' => 'GET',
      'action' => $action
    ];
  }

  // Method POST
  public function post(string $endpoint, callable $action) {
    $this->routes[] = [
      'endpoint' => $endpoint,
      'method' => 'POST',
      'action' => $action
    ];
  }

  // Method PUT
  public function put(string $endpoint, callable $action) {
    $this->routes[] = [
      'endpoint' => $endpoint,
      'method' => 'PUT',
      'action' => $action
    ];
  }

  // Method DELETE
  public function delete(string $endpoint, callable $action) {
    $this->routes[] = [
      'endpoint' => $endpoint,
      'method' => 'DELETE',
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