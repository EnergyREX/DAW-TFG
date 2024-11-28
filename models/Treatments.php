<?php 

// Class Treatments
class Treatments extends Database {
  
  // Gets all treatments
  function get() {
    $sql = "SELECT * FROM treatments";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  // Inserts a treatment
  function insert($params) {
    $sql = "INSERT INTO treatments (name, description)
    VALUES(:name, :description)";

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':name', $params['name']);
    $query->bindParam(':description', $params['description']);

    $query->execute();
  }

  // Updates a treatment
  function update($params) {
    $sql = "UPDATE treatments SET
    name = :name, description = :description WHERE id = :id";

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':name', $params['name']);
    $query->bindParam(':description', $params['description']);
    $query->bindParam(':id', $params['id']);

    $query->execute();
  }

  // Deletes a treatment
  function delete($params) {
    $sql = "DELETE FROM treatments WHERE id = :id";
    $query = $this->pdo->prepare($sql);
    $query->bindParam('id', $id);
    $query->execute();

  }
}
?>