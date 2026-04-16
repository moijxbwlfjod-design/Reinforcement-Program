<?php

class Database{
  private $host = 'localhost';
  private $dbname = 'phppdo';
  private $user = 'root';
  private $pass = 'moha_med2007';

  public $connection = null;

  public function __construct(){
      try{
        $dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        echo 'Connection successfully';
        $this->connection = $dbh;
      } catch (PDOException $e){
        echo 'Erro while connection to database: ' . $e;
      }
  }
}

$db = new Database();
$conn = $db->connection;
