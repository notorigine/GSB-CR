<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens
class Praticien extends Modele {

    private $sqlPraticien = 'select id_praticien as idPraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien,
           adresse_praticien as adressePraticien, cp_praticien as cpPraticien, ville_praticien as villePraticien, coef_notoriete as notorietePraticien,
           TP.id_type_praticien as idTypePraticien, lib_type_praticien as libTypePraticien 
           from PRATICIEN P join TYPE_PRATICIEN TP on P.id_type_praticien=TP.id_type_praticien';

    // Renvoie la liste des médicaments
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nomPraticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }

    // Renvoie les types de praticiens
    public function getTypesPraticiens() {
        $sql = 'select id_type_praticien as idTypePraticien, lib_type_praticien as libTypePraticien from TYPE_PRATICIEN';
        $typesPraticiens = $this->executerRequete($sql);
        return $typesPraticiens;
    }

    // Renvoie un praticien à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
    
    // Renvoie un/des praticien(s) suivant les paramètres $nom, $ville, $type
    public function getPraticienAvancé($idType, $nomPraticien = null, $villePraticien = null) {
        $sql = $this->sqlPraticien . ' where nom_praticien LIKE ? AND ville_praticien LIKE ? AND TP.id_type_praticien = ?';
        $praticien = $this->executerRequete($sql, array("%$nomPraticien%", "%$villePraticien%", $idType));
        if ($praticien->rowCount() >= 1)
            return $praticien;
        else
            throw new Exception("Aucun praticien ne correspond aux critères de recherche définis.");
    }

}