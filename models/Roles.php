<?php 

// Class Roles

class Roles extends Database {

  // Get all existing roles
  function get() {
    $sql = "SELECT * FROM roles";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>