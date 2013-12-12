<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Praticien.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends ControleurSecurise {

    // Objet modèle praticien/typePraticien
    private $praticien;

    public function __construct() {
        $this->praticien = new Praticien();
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
            throw new Exception("Action impossible : aucun médicament défini");
    }

    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $typesPraticiens = $this->praticien->getTypesPraticiens();
        $praticiens = $this->praticien->getPraticiens();
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
        if ($this->requete->existeParametre("id")) {
            $idTypePraticien = $this->requete->getParametre("id");

            if ($this->requete->existeParametre("nomPraticien"))
                $nomPraticien = $this->requete->getParametre("nomPraticien");
            else
                $nomPraticien = null;
            if ($this->requete->existeParametre("villePraticien"))
                $villePraticien = $this->requete->getParametre("villePraticien");
            else
                $villePraticien = null;

            $this->afficherAvance($idTypePraticien, $nomPraticien, $villePraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    private function afficherAvance($idTypePraticien, $nomPraticien, $villePraticien) {
        $praticiens = $this->praticien->getPraticienAvancé($idTypePraticien, $nomPraticien, $villePraticien);
        $this->genererVue(array('praticiens' => $praticiens), "index");
    }

    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }

}