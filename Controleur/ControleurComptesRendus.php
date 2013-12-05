<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Praticien.php';

class ControleurComptesRendus extends ControleurSecurise {
    
    private $praticien;
    private $compteRendu;
    
    public function __construct() {
        $this->praticien = new Praticien();
        $this->compteRendu = new CompteRendu();
    }

    // Affiche la liste des praticiens
    public function index() {
        $compteRendu = $this->praticien->getPraticiens($idPraticien);
        $this->genererVue(array('praticiens' => $praticiens));
    }
    
    public function ajouter() {
        
    }
}