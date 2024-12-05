<?php 

require_once(__DIR__ . '/../config/config.inc.php');


// Main class to interact with the Database.

class Database {
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
}
?>