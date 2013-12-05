<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';

// Contrôleur des actions liées aux médicaments
class ControleurPraticiens extends ControleurSecurise {

    // Objet modèle praticien/typePraticien
    private $praticien;
    private $typePraticien;

    public function __construct() {
        $this->praticien = new Praticien();
        $this->typePraticien = new TypePraticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens($idTypePraticien);
        $typesPraticiens = $this->typePraticien->getTypesPraticiens();
        $this->genererVue(array('praticiens' => $praticiens, 'typesPraticiens' => $typesPraticiens));
    }

    // Affiche le résultat de la recherche de praticien
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    public function resultats() {
        if ($this->requete->existeParametre("idType")) {
            $idTypePraticien = $this->requete->getParametre("idType");
            $praticiens = $this->praticien->getPraticiens($idTypePraticien);
            $typesPraticiens = $this->typePraticien->getTypesPraticiens();
            $this->genererVue(array('praticiens' => $praticiens, 'typesPraticiens' => $typesPraticiens), "index");
        }
        else
            throw new Exception("Action impossible : aucun type de praticien défini");
    }

    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }

}