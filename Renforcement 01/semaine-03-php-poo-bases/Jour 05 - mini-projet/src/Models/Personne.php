<?php


abstract class Personnes{
  public int $id;
  public string $nom;
  public string $prenom;
  public string $email;
  public string $telephone;
  public string $dateNaissance;

  public function __construct(string $nom, string $prenom, string $email, string $telephone, string $dateNaissance){
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->telephone = $telephone;
    $this->dateNaissance = $dateNaissance;
  }
}
