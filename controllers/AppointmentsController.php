<?php 

require_once './models/Appointments.php';
// Class AppointmentsController
class AppointmentsController {
  private $model;

  function __construct() {
    $this->model = new Appointments();
  }
  
  // If petition = GET
  function getAppointments() {
    try {
      header('Content-Type: application/json');
      $appointments = $this->model->get();
      if (!empty($appointments)) {
        http_response_code(200);
        echo json_encode($appointments);
      }
    } catch (Exception $e) {
      http_response_code(500);
      echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
    }
  }

function getAppointmentById($params) {
    try {
        header('Content-Type: application/json');
        $appointments = $this->model->getById($params['id']); 
        if (!empty($appointments)) {
            http_response_code(200);
            echo json_encode($appointments);
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(["error" => "Internal server error.", "message" => $e->getMessage()]);
    }
}


  // If petition = POST
  function newAppointment() {
    $patient_dni = $_POST['patient_dni'];
    $doctor_dni = $_POST['doctor_dni'];
    $hour = $_POST['hour'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $params = [
      "patient_dni" => $patient_dni,
      "doctor_dni" => $doctor_dni,
      "hour" => $hour,
      "date" => $date,
      "status" => $status,
    ];

    $this->model->insert($params);
  }

  // If petition = PUT
  function updateAppointment($params) {
  $this->model->update($params);
  }

  // If petition = DELETE
  function deleteAppointment($params) {
    $this->model->delete($params);
  }

}

?>