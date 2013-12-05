<?php $this->titre = "Comptes-Rendues"; ?>

<?php
$menuComptesRendus = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Nouveau compte-rendu de visite</h2>
    <div class="well">
        <form class="form-horizontal" role="form" action="comptesrendus/ajouter" method="post">
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Praticien</label>
                <div class="col-sm-5 col-md-4">
                    <select class="form-control" name="idPraticien">
                        <?php foreach ($praticiens as $praticien) : ?>
                            <option value="<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nomPraticien']) ?> <?= $this->nettoyer($praticien['prenomPraticien']) ?></option>
                        <?php endforeach; ?>
                    </select>    
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Date</label>
                <div class="col-sm-5 col-md-4">
                    <input name="date" type="date" class="form-control" value="2013-11-28">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Motif</label>
                <div class="col-sm-5 col-md-4">
                    <textarea name="motif" class="form-control" rows="2" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Bilan</label>
                <div class="col-sm-5 col-md-4">
                    <textarea name="bilan" class="form-control" rows="4" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-5">
                    <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-plus"></span> Ajouter</button>
                </div>
            </div>
        </form>
    </div>
</div>