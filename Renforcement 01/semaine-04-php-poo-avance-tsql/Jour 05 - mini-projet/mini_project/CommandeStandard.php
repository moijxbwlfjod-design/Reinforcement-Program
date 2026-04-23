<?php
required_one(__DIR__ . '/Commande.php');
required_one(__DIR__ . '/Taxable.php');

class CommandeStandard extends Commande{

    protected float $taxe = 100 / 20;
    public function getMontantTTC(): float
    {
        $mht = $this->getMontantHT();
        return $mht + ($mht * $this->taxe);
    }

    public function getTypeCommande(): string
    {
        return 'Commande Standard';
    }

    public function calculerTaxe(float $montantHT): float
    {
        return $this->taxe * $montantHT;
    }

    public function getLabelTaxe(): string
    {
        return 'TVA 20%';
    }

    public function getTauxTaxe(){
        return $this->taxe;
    }
}