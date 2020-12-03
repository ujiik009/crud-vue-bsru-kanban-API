<?php

class Database
{
  private $connection = null;
  public function __construct($var = null)
  {
    // read file config
    $config =  parse_ini_file("./config.ini");
    // Create connection
    $conn = mysqli_connect($config["DB_HOST"], $config["DB_USER"], $config["DB_PASSWORD"], $config["DB_DATABASE"], $config["DB_PORT"]);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $this->connection = $conn;
  }

  public function getConnection(){
    return $this->connection;
  }
}
