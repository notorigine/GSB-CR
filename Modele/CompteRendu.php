<?php

require_once 'Framework/Modele.php';

// Services métier liés aux comptes rendus 
class CompteRendu extends Modele {
    
    private $sqlAjoutCompteRendu = "insert into rapport_visite VALUES ('', ?, ?, ?, ?, ?)";
    
    private $sqlCompteRendu = 'select RV.id_praticien as idPraticien, id_visiteur as idVisiteur, date_rapport as date, bilan, motif from rapport_visite RV join praticien PRA on RV.id_praticien = PRA.id_praticien';
     
    public function ajouterCompteRendu($idVisiteur, $idPraticien, $dateRaport, $motif, $bilan) {
        $sql = $this->sqlAjoutCompteRendu;
        $compteRendu = $this->executerRequete($sql, array($idVisiteur, $idPraticien, $dateRaport, $motif, $bilan));
        return $compteRendu;
    }
    
    public function getCompteRendus() {
        $sql = $this->sqlCompteRendu;
        $compteRendus = $this->executerRequete($sql);
        return $compteRendus;
    }
}
