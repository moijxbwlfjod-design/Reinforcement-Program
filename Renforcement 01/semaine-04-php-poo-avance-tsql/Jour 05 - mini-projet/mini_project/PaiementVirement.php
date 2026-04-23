<?php
require_once(__DIR__ . '/Payable.php');
class PaiementVirement implements Payable
{
    protected $iban;
    protected $banque;
    protected $nomBeneficaire;

    public function payer(float $montant): bool
    {
        return true;
    }
    public function getReference(): string
    {
        return 'VIR-' . date('y-m-h') . random_int(6, 6);
    }

    public function getModePaiment(): string
    {
        return 'Virement bancaire';
    }
}