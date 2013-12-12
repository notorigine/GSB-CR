<?php

require_once 'Framework/Modele.php';

// Services métier liés aux comptes rendus 
class CompteRendu extends Modele {

    private $sqlAjoutCompteRendu = "insert into rapport_visite VALUES ('', ?, ?, ?, ?, ?)";
    
    private $sqlCompteRendu = 'SELECT CR.id_rapport as idCR, CR.date_rapport as dateCR, 
        PR.nom_praticien as nomPraticien, PR.prenom_praticien as prenomPraticien,
        PR.ville_praticien as villePraticien, CR.motif as motifCR 
        FROM rapport_visite CR JOIN praticien PR ON CR.id_praticien = PR.id_praticien';

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
