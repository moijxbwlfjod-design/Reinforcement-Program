<?php
require_once(__DIR__ . '/Commande.php');
require_once(__DIR__ . '/Payable.php');

class Facture
{
    private Commande $commande;
    private Payable $payable;

    public function __construct(Commande $commande, Payable $payable)
    {
        $this->commande = $commande;
        $this->payable = $payable;
    }

    public function generer(): string
    {
        $facture = '==================== FACTURE ====================\n';
        $facture .= 'Numero commande : ' . $this->commande->getNumero() . '\n';
        $facture .= 'Type            : ' . $this->commande->getTypeCommande() . '\n';
        $facture .= 'Date            : ' . $this->commande->dateCreation . '\n';
        $facture .= 'Client          : ' . $this->commande->client . '\n';
        $facture .= '-------------------------------------------------' . '\n';
        foreach($this->commande->lines as $id => $line){
            $facture .= 'Ligne ' . $id + 1 . ' : Produit ' . $line['produit'] . ' x' . $line['quantité'] . '@ ' . $line['prix'] . ' DH = ' . ($line['prix'] * $line['quantité']) . 'DH\n';
        }
        $facture .= '-------------------------------------------------' . '\n';
        $facture .= 'Montant HT      :  ' . $this->commande->getMontantHT() . ' DH\n';
        $facture .= $this->commande->getLabelTaxe() . ' DH\n';
        $facture .= 'Montant TTC     :  ' . $this->commande->getMontantTTC() . ' DH\n';
        $facture .= '-------------------------------------------------' . '\n';
        $facture .= 'Mode de paiement : ' . $this->payable->getModePaiment() . '\n';
        $facture .= 'Reference        : ' . $this->payable->getReference() . '\n';
        $facture .= 'Statut paiement  : ' . $this->commande->status . '\n';
        return $facture .= '=================================================';
    }
}