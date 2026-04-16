<?php
require_once '../Models/Apprenant.php';
require_once '../Models/Formateur.php';
require_once './Connection.php';

class BaseRepository{
  private $connection = Null;

  public function __construct($database){
    $this->connection = $database;
  }
  public function addStudentFormateur(string $who, Apprenants $a = null, Formateurs $f = null){
    $sql = "insert into $who (nom, prenom, email, telephone, dateNaissance) values (?, ?, ?, ?, ?)";
    if ($who === 'formateurs'){
      if ($stmt = $this->connection->prepare($sql)){
        $stmt->execute([$f->nom, $f->prenom, $f->email, $f->telephone, $f->dateNaissance]);
        echo $stmt->fetchAll();
        echo 'the formateur must be added to the database';
        return true;
      }
    } else if ($who === 'apprenants'){
      if ($stmt = $this->connection->prepare($sql)){
        $stmt->bind_params('sssss', $a->nom, $a->prenom, $a->email, $a->telephone, $a->dateNaissance);
        $stmt->execute();
        return true;
      }
      return false;
    }
  } 
}

$base = new BaseRepository($conn);
$formateur = new Formateurs('mohamed', 'ait lafkih', 'mohamed@gmail.com', '0616074362', '19-09-2007');
$base->addStudentFormateur('formateurs', null, $formateur);
