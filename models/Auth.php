<?php 

// Class to authenticate all users.

// Class Auth
class Auth extends Database {

  // Register (params) (Only for patients)
  function register($params) {
    $sql = "INSERT INTO `users` (`pfpimg`, `dni`, `name`, `surname`, 
    `address`, `phone_number`, `email`, `passwd`, `specialization`, `join_date`, 
    `disponibilidad`, `state`, `role_id`) 
    VALUES (NULL, :dni, :name, :surname, :address, 
    :phone_number, :email, :passwd, NULL, 
    :join_date, NULL, 'active', '1');";

    date_default_timezone_set('Europe/Madrid');

    $params['role'] = 1;
    $params['join_date'] = date('Y-m-d H:i:s');

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':dni', $params['dni']);
    $query->bindParam(':name', $params['name']);
    $query->bindParam(':surname', $params['surname']);
    $query->bindParam(':address', $params['address']);
    $query->bindParam(':phone_number', $params['phone_number']);
    $query->bindParam(':email', $params['email']);
    $query->bindParam(':passwd', password_hash($params['passwd'], PASSWORD_BCRYPT));
    $query->bindParam(':join_date', $params['join_date']);
    $query->bindParam(':role', $params['role']);
    
    $query->execute();

  }

  function login($params) {
    // Shoulds save a session where stores a json object who is used to auth users. 
    session_start();

    $_SESSION['username'] = "";
  }
}

?>