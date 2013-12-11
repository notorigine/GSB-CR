<?php
/**
require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class Praticien extends Modele {

    private $sqlPraticien = 'select id_praticien as idPraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien, lib_type_praticien as libTypePraticien, ville_praticien as villePraticien, 
                            adresse_praticien as adressePraticien, coef_notoriete as coefNotoriete, cp_praticien as cpPraticien
                            from PRATICIEN P join TYPE_PRATICIEN TP on P.id_type_praticien = TP.id_type_praticien';

    // Renvoie la liste des praticiens
    public function getPraticiens($idTypePraticien = null) {
        if (isset($idTypePraticien))
            $sql = $this->sqlPraticien . ' where TP.id_type_praticien =?';
        $sql = $this->sqlPraticien . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }

    // Renvoie un praticien à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where TP.id_type_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
}


<?php*/

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens
class Praticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlPraticien = 'select id_praticien as idPraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien,
        adresse_praticien as adressePraticien, cp_praticien as cpPraticien, ville_praticien as villePraticien, coef_notoriete as notorietePraticien,
        TP.id_type_praticien as idTypePraticien, lib_type_praticien as libTypePraticien from PRATICIEN P
        join TYPE_PRATICIEN TP on P.id_type_praticien=TP.id_type_praticien';

    // Renvoie la liste des médicaments
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nomPraticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }

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

    public function getPraticienAvancé($nom, $ville = null, $type = null) {
        $sql = $this->sqlPraticien . 'where nom_praticien = ? OR ville_praticien = ? OR TP.id_type_praticien = ?';
        $praticien = $this->executerRequete($sql, array($nom, $ville, $type));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond aux critères de recherche définis.");
    }

}
