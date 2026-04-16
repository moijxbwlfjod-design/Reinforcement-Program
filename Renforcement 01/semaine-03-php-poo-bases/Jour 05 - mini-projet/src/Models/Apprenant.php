<?php
require_once __DIR__ . '/Personne.php';


class Apprenants extends Personnes{

  public function __construct(string $nom, string $prenom, string $email, string $telephone, string $dateNaissance){
    parent::__construct($nom, $prenom, $email, $telephone, $dateNaissance);
  }
  public function getMoyenneModule(int $moduleId){
    
  }

  public function getMoyenneGenerale(){

  }

  public function getMention(){

  }

  public function estAdmins(){

  }

  public function getBulletin(){

  }

}

