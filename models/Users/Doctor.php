<?php

class Patient extends User
{
  function __construct()
  {
    parent::__construct();
  }

  function get()
  {
    $sql = "SELECT * FROM users WHERE role_id = 1";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  function insert($params)
  {
    $sql = "INSERT INTO `users` (`pfpimg`, `dni`, `name`, `surname`, 
    `address`, `phone_number`, `email`, `passwd`, `specialization`, `join_date`, 
    `disponibilidad`, `state`, `role_id`) 
    VALUES (NULL, :dni, :name, :surname, :address, 
    :phone_number, :email, :passwd, NULL, 
    :join_date, NULL, 'active', '3');";

    $query = $this->pdo->prepare($sql);
    $query->bindParam(':dni', $params['dni']);
    $query->bindParam(':name', $params['name']);
    $query->bindParam(':surname', $params['surname']);
    $query->bindParam(':address', $params['address']);
    $query->bindParam(':phone_number', $params['phone_number']);
    $query->bindParam(':email', $params['email']);
    $query->bindParam(':passwd', password_hash($params['passwd'], PASSWORD_BCRYPT));
    $query->bindParam(':join_date', $params['join_date']);
    
  }

  function update($params)
  {
    $sql =
      "UPDATE users SET 
    dni = :dni, 
    name = :name, 
    surname = :surname, 
    address = :address, 
    phone_number = :phone_number, 
    email = :email,
    passwd = :passwd,
    state = :state
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

    return $query->fetch(PDO::FETCH_ASSOC);
  }

  function delete($dni)
  {
    $sql = "DELETE FROM users WHERE dni = :dni";
    $query = $this->pdo->prepare($sql);
    $query->bindParam(':dni', $dni);
    $query->execute();
  }
}
