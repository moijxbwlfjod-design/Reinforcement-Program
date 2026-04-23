<?php
required_one(__DIR__ . '/Commande.php');
required_one(__DIR__ . '/Taxable.php');

class CommandeExport extends Commande implements Taxable{
    private float $taxe = 0;
    public string $payDesination;

    static public int $totalCommandesExport;

    public function getMontantTTC(): float
    {
        return $this->getMontantHT();
    }

    public function getTypeCommande(): string
    {
        return "Commande D'Export";
    }

    public function calculerTaxe(float $montantHT): float
    {
        return 0;
    }

    public function getLabelTaxe(): string
    {
        return 'TVA 0%';
    }

    public function getTauxTaxe(){
        return $this->taxe;
    }

    public function paysDestination(string $payDesination){
        $this->payDesination  = $payDesination;
    }

    static public function getTotalCommandesExport(): int
    {
        return self::$totalCommandesExport;
    }
}