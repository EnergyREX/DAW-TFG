<?php

class User extends Database {
  function __construct() {
    parent::__construct();
  }

  // Gets all users
  function get() {
    $sql = "SELECT * FROM users";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  // Gets users by roll
  function getByRole($id) {
    $sql = "SELECT * FROM users WHERE role_id = :id";
    $query = $this->pdo->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  function insert($params) {
    $sql = "INSERT INTO `users` (`pfpimg`, `dni`, `name`, `surname`, 
    `address`, `phone_number`, `email`, `passwd`, `specialization`, `join_date`, 
    `availability`, `state`, `role_id`) 
    VALUES (NULL, :dni, :name, :surname, :address, 
    :phone_number, :email, :passwd, :specialization, 
    :join_date, :availability, 'active', :role);";

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':dni', $params['dni']);
    $query->bindParam(':name', $params['name']);
    $query->bindParam(':surname', $params['surname']);
    $query->bindParam(':address', $params['address']);
    $query->bindParam(':phone_number', $params['phone_number']);
    $query->bindParam(':email', $params['email']);
    $query->bindParam(':passwd', password_hash($params['passwd'], PASSWORD_BCRYPT));
    $query->bindParam(':specialization', $params['specialization']);
    $query->bindParam(':join_date', $params['join_date']);
    $query->bindParam(':availability', $params['availability']);
    $query->bindParam(':role', $params['role']);
    
    $query->execute();
  }

  function update($params) {
    $sql =
    "UPDATE users SET 
    dni = :dni, 
    name = :name, 
    surname = :surname, 
    address = :address, 
    phone_number = :phone_number, 
    email = :email,
    passwd = :passwd,
    specialization = :specialization,
    state = :state,
    role = :role
    WHERE dni = :dni_old";

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':dni', $params['dni']);
    $query->bindParam(':name', $params['name']);
    $query->bindParam(':surname', $params['surname']);
    $query->bindParam(':address', $params['address']);
    $query->bindParam(':phone_number', $params['phone_number']);
    $query->bindParam(':email', $params['email']);
    $query->bindParam(':passwd', password_hash($params['passwd'], PASSWORD_BCRYPT));
    $query->bindParam(':state', $params['state']);
    $query->bindParam(':specialization', $params['specialization']);
    $query->bindParam(':state', $params['state']);
    $query->bindParam(':role', $params['role']);
    $query->bindParam(':dni_old', $params['dni_old']);

    return $query->fetch(PDO::FETCH_ASSOC);
  }

  function delete($dni) {
    $sql = "DELETE FROM users WHERE dni = :dni";
    $query = $this->pdo->prepare($sql);
    $query->bindParam(':dni', $dni);
    $query->execute();
  }
}
