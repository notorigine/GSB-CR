<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class TypePraticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlTypePraticien = 'select id_type_praticien as idTypePraticien, code_type_praticien as codeTypePraticien, lib_type_praticien as libTypePraticien, 
        lieu_type_praticien as lieuTypePraticien FROM type_praticien';
    
    // Renvoie la liste des types de praticiens
    public function getTypesPraticiens() {
        $sql = $this->sqlTypePraticien . ' order by libTypePraticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    } 
}

