<?php
require_once '../../config/config.inc.php';
abstract class User {
  protected $pdo;

  public function __construct() {
    $dsn = DB_DSN;
    $user = DB_USER;
    $passwd = DB_PASS;

    try {
      $this->pdo = new PDO($dsn, $user, $passwd);
    } catch (PDOException $e) {
      echo "Connection error, $e";
    }
  }

  abstract function get();
  abstract function insert($params);
  abstract function update($params);
  abstract function delete($dni);
}
