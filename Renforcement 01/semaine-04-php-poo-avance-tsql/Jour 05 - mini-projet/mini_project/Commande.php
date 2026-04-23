<?php

abstract class Commande{
    public int $id;
    public int $numero;
    public string $client;
    public array $lines;
    public string $dateCreation;
    public string $status = 'en_attente';

    private array $statuses = ['en_attente', 'confirmee', 'expediee', 'livree'];

    public function __construct()
    {
        $this->dateCreation = date('d/m/y');
    }

    public function ajouterLigne(string $produit, int $qnt, float $prix): void
    {
        $this->lines[] = ['produit' => $produit, 'quantité' => $qnt, 'prix' => $prix];
    }

    public function getMontantHT(): float
    {
        $total = 0;
        foreach ($this->lines as $produit){
            $total += $produit['prix'];
        }
        return $total;
    }

    public function getNumero(): string
    {
        $numero = 'CMD-20' . date('y') . '-';
        $id_len = strlen((string)$this->id);
        for (int i = $id_len; i < 6; i++) $numero .= '0';
        $numero .= $this->id;
        $this->numero = $numero;
        return $numero;
    }

    public function changerStatus(string $statut): void
    {
        if (array_search($this->status, $this->statuses) < array_search($status, statuses)) $this->status, $status;
    }

    abstract function getMontantTTC(): float;

    abstract function getTypeCommande(): string;
}