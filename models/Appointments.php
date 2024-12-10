<?php 
require_once ('Database.php');

// Appointments Class

class Appointments extends Database {
  function get() {
    $sql = "SELECT * FROM appointments";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  function getById($params) {
    $sql = "SELECT * FROM appointments where id = :id";
    $query = $this->pdo->prepare($sql);
    $query->bindParam(':id', $param);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  // Insert (patient, doctor, hour, status)
  function insert($params) {
    $sql = "INSERT INTO `appointments` (patient_dni, doctor_dni, hour, status)
    VALUES(:patient_dni, :doctor_dni, :hour, :date :status)";

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':patient_dni', $params['patient_dni']);
    $query->bindParam(':doctor_dni', $params['doctor_dni']);
    $query->bindParam(':hour', $params['hour']);
    $query->bindParam(':date', $params['date']);
    $query->bindParam(':status', $params['status']);

    $query->execute();
  }
  // Update (patient, doctor, hour, status)
  function update($params) {
    $sql = "UPDATE `appointments` SET
    patient_dni = :patient_dni,
    doctor_dni = :doctor_dni
    hour = :hour
    status = :status
    WHERE id = :id";

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':patient_dni', $params['patient_dni']);
    $query->bindParam(':doctor_dni', $params['doctor_dni']);
    $query->bindParam(':hour', $params['hour']);
    $query->bindParam(':status', $params['status']);
    $query->bindParam(':id', $params['id']);

    $query->execute();
  }


  function delete($params) {
    $sql = "DELETE FROM appointments where id = :id";
    $query = $this->pdo->prepare($sql);
    $query->bindParam(':id', $params['id']);
    $query->execute();
  }


}
?>