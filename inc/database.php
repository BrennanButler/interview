<?php

class Database {

  private $connection;

  public function __construct($host, $port, $database, $user, $password) {

      try {

        $conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);

      } catch(PDOException $e) {

        echo '[SQL] Error ' . $e->getMessage();

      }

      $this->connection = $conn;
  }

  public function getConnection() {
    return $this->connection;
  }
}

?>
