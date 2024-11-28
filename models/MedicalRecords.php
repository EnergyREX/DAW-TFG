<?php 

class MedicalRecords extends Database {

// Get records
function get() {
  $sql = "SELECT * FROM medical_records";
  $query = $this->pdo->prepare($sql);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Insert new record
function insert($params) {
  $sql = "INSERT INTO `medical_records` (patient_dni, record_date, details)
  VALUES(:patient_dni, :record_date, :details)";

  $query = $this->pdo->prepare($sql);
  $query->bindParam(':patient_dni', $params['patient_dni']);
  $query->bindParam(':record_date', $params['record_date']);
  $query->bindParam(':details', $params['details']);

}

// Modify a record e.g. details
function update($params) {
  $sql = "UPDATE medical_records SET
  patient_dni = :patient_dni,
  record_date = :record_date,
  details = :details";

  $query = $this->pdo->prepare($sql);
  $query->bindParam(':patient_dni', $params['patient_dni']);
  $query->bindParam(':record_date', $params['record_date']);
  $query->bindParam(':details', $params['details']);
}

// Delete a record
function delete($params) {
  $sql = "DELETE FROM medical_records WHERE id = :id";
  $query = $this->pdo->prepare($sql);
  $query->bindParam(':id', $params['id']);
  $query->execute();
}

}

?>