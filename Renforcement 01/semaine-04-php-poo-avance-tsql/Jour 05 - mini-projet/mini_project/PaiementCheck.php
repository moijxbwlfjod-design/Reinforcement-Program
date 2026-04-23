<?php
require_once(__DIR__ . '/Payable.php');
class PaiementCheque implements Payable
{
    protected $numeroCheque;
    protected $banqueEmettrice;
    public function payer(float $montant): bool
    {
        if ($montant > 0) return true;
        return false;
    }

    public function getModePaiment(): string
    {
        return 'Cheque';
    }

    public function getReference(): string
    {
        return 'VIR-' . date('y-m-h') . random_int(6, 6);
    }
}