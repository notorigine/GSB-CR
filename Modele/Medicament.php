<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class Medicament extends Modele {

    // Morceau de requête SQL incluant les champs de la table médicament
    private $sqlMedicament = 'select id_medicament as idMedicament, depot_legal as depotLegal, nom_commercial as nomCommercial, composition, effets, contre_indication as contreIndications, lib_famille as libFamille from MEDICAMENT M join FAMILLE F on M.id_famille=F.id_famille';

    // Renvoie la liste des médicaments
    public function getMedicaments() {
        $sql = $this->sqlMedicament . ' order by nom_commercial';
        $medicaments = $this->executerRequete($sql);
        return $medicaments;
    }

    // Renvoie un médicament à partir de son identifiant
    public function getMedicament($idMedicament) {
        $sql = $this->sqlMedicament . ' where id_medicament=?';
        $medicament = $this->executerRequete($sql, array($idMedicament));
        if ($medicament->rowCount() == 1)
            return $medicament->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun médicament ne correspond à l'identifiant '$idMedicament'");
    }

}
