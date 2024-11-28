<?php 

// Class Inventory
class Inventory  extends Database{

// Get items
function get() {
  $sql = "SELECT * FROM inventory";
  $query = $this->pdo->prepare($sql);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Insert new item
function insert($params) {
  $sql = "INSERT INTO inventory (item_name, quantity, last_updated)
  VALUES(:item_name, :quantity, :last_updated)";

  $query = $this->pdo->prepare($sql);
  $query->bindParam(':item_name', $params['item_name']);
  $query->bindParam(':quantity', $params['quantity']);
  $query->bindParam(':last_updated', $params['last_updated']);
}

// Modify items e.g. quantity
function update($params) {
  $sql = "UPDATE inventory SET
  item_name = :item_name,
  quantity = :quantity,
  last_updated = :last_updated
  ";

  $query = $this->pdo->prepare($sql);
  $query->bindParam(':item_name', $params['item_name']);
  $query->bindParam(':quantity', $params['quantity']);
  $query->bindParam(':last_updated', $params['last_updated']);
}

// Delete items
function delete($params) {
  $sql = "DELETE FROM inventory WHERE id = :id";
  $query = $this->pdo->prepare($sql);
  $query->bindParam(':id', $params['id']);
  $query->execute();
}

}

?>