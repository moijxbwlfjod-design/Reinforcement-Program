<?php

interface Payable{

    public function payer(float $montant): bool;

    public function getModePaiment(): string;

    public function getReference(): string;
}