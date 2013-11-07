<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Medicament.php';

// Contrôleur des actions liées aux médicaments
class ControleurMedicaments extends Controleur {

    // Objet modèle Médicament
    private $medicament;

    public function __construct() {
        $this->medicament = new Medicament();
    }

    // Affiche la liste des médicaments
    public function index() {
        $medicaments = $this->medicament->getMedicaments();
        $this->genererVue(array('medicaments' => $medicaments));
    }

    // Affiche les informations détaillées sur un médicament
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idMedicament = $this->requete->getParametre("id");
            $this->afficher($idMedicament);
        }
        else
            throw new Exception("Action impossible : aucun médicament défini");
    }

    // Affiche l'interface de recherche de médicament
    public function recherche() {
        $medicaments = $this->medicament->getMedicaments();
        $this->genererVue(array('medicaments' => $medicaments));
    }

    // Affiche le résultat de la recherche de médicament
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idMedicament = $this->requete->getParametre("id");
            $this->afficher($idMedicament);
        }
        else
            throw new Exception("Action impossible : aucun médicament défini");
    }
    
    // Affiche les détails sur un médicament
    private function afficher($idMedicament) {
        $medicament = $this->medicament->getMedicament($idMedicament);
        $this->genererVue(array('medicament' => $medicament), "details");
    }

}