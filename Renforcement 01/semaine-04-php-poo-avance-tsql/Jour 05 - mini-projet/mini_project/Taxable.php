<?php

interface Taxable{
    public function calculerTaxe(float $montantHT): float;

    public function getTauxTaxe(): float;

    public function getLabelTaxe(): string;
}
