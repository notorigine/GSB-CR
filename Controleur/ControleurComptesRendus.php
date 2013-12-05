<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/CompteRendu.php';
require_once 'Modele/Praticien.php';

class ControleurComptesRendus extends ControleurSecurise {
    
    private $praticien;
    private $compteRendu;
    private $message;
    
    public function __construct() {
        $this->praticien = new Praticien();
        $this->compteRendu = new CompteRendu();
        $this->message = "";
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $rapports = $this->compteRendu->getCompteRendus();
        $this->genererVue(array('praticiens' => $praticiens, 'rapports' => $rapports, 'message' => $this->message));
    }
    
    public function ajout() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens, 'message' => $this->message));
    }
    
    public function ajouter() {
        if ($this->requete->getSession()->existeAttribut('idVisiteur')
                && $this->requete->existeParametre('idPraticien')
                && $this->requete->existeParametre('date')
                && $this->requete->existeParametre('motif')
                && $this->requete->existeParametre('bilan')) {

            $this->compteRendu->ajouterCompteRendu($this->requete->getSession()->getAttribut('idVisiteur'), $this->requete->getParametre('idPraticien'), $this->requete->getParametre('date'), $this->requete->getParametre('motif'), $this->requete->getParametre('bilan'));
            $this->message = "Le compte rendu a corretement été ajouté";
            
            $this->rediriger("comptesrendus/index");
        }
    }
}