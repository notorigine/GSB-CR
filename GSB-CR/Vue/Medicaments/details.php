<?php $this->titre = "Médicaments"; ?>

<?php
$menuMedicaments = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center"><?= $this->nettoyer($medicament['nomCommercial']) ?></h2>
    <div class="well">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Code</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($medicament['depotLegal']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Famille</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($medicament['libFamille']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Composition</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($medicament['composition']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Effets</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($medicament['effets']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Contre-indications</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($medicament['contreIndications']) ?></p>
                </div>
            </div>
        </form>
    </div>    
</div>

