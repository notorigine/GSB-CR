<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class CompteRendu extends Modele {
    
     private $sqlCompteRendu = 'insert into rapport_visite ("id_rapport", "id_praticien", "id_visiteur", "date_rapport", "bilan", "motif") 
         VALUES (?, ?, ?, ?, ?, ?)';
    
    public function ajouterCompteRendu() {
        
    }
}
