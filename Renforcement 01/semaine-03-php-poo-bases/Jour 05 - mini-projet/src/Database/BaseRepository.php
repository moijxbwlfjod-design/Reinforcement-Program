<?php
require_once '../Models/Apprenant.php';
require_once '../Models/Formateur.php';


class BaseRepository{
  private $connection = Null;

  public function __construct($database){
    $this->connection = $database->get_connection();
  }
  public function addStudentFormateur(string $who, Apprenants $a = null, Formateurs $f = null){
    $sql = "insert into $who (nom, prenom, email, telephone, dateNaissance) values (?, ?, ?, ?, ?)";
    if ($who === 'formateur'){
      if ($stmt = $this->connection->prepare($sql)){
        $stmt->bind_params('sssss', $f->nom, $f->prenom, $f->email, $f->telephone, $f->dateNaissance);
        $stmt->execute();
        return true;
      }
    } else if ($who === 'apprenant'){
      if ($stmt = $this->connection->prepare($sql)){
        $stmt->bind_params('sssss', $a->nom, $a->prenom, $a->email, $a->telephone, $a->dateNaissance);
        $stmt->execute();
        return true;
      }
      return false;
    }
  } 
}
