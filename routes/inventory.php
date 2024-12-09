<?php 

require_once ('./controllers/InventoryController.php');

// Inventory routes

// GET the view
$router->add('/inventory', 'GET', function() {
  require_once('./views/app/pages/inventory.php');
});

// GET table's data.
$router->add('/inventory/getAll', 'GET', function() {
  $controller = new InventoryController();
  $controller->getItems();
});

// POST new item.
$router->add('/inventory/new', 'POST', function() {
  $controller = new InventoryController();
  $params = $_POST['params'];
  $controller->newItem($params);
}); 

// UPDATE an item
$router->add('/inventory/update', 'POST', function() {
  $controller = new InventoryController();
  $params = $_POST['params'];
  $controller->updateItem($params);
}); 

// DELETE an item
$router->add('/inventory/delete', 'POST', function() {
  $controller = new InventoryController();
  $params = $_POST['params'];
  $controller->deleteItem($params);
});

?>