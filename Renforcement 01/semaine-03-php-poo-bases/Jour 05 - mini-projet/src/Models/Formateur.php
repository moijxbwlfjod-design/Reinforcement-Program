<?php

require_once __DIR__ . '/Personne.php';

class Formateurs extends Personnes
{
    public function __construct(string $nom, string $prenom, string $email, string $telephone, string $dateNaissance){
        parent::__construct($nom, $prenom, $email, $telephone, $dateNaissance);
    }
}
