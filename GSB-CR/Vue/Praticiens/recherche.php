<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Recherche d'un praticien</h2>
    <div class="well">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a data-toggle="tab" href="#simple">Simple</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#avancee">Avancée</a>
                    </li>
                </ul>
            </div>
        </div><br/>
        <div class="tab-content">
            <div id="simple" class="tab-pane fade active in">
                <form class="form-horizontal" role="form" action="praticiens/resultat" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Nom du praticien </label>
                        <div class="col-sm-5 col-md-4">
                            <select class="form-control" name="id">
                                <?php foreach ($praticiens as $praticien) : ?>
                                    <option value="<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nomPraticien']) ?> <?= $this->nettoyer($praticien['prenomPraticien']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-5">
                            <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="avancee" class="tab-pane fade">
                <form class="form-horizontal" method="post" action="praticiens/resultats" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Nom du praticien</label>
                        <div class="col-sm-5 col-md-4">
                            <input class="form-control" type="text" autofocus="" name="nomPraticien"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Ville</label>
                        <div class="col-sm-5 col-md-4">
                            <input class="form-control" type="text" name="villePraticien"></input></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">Type de praticien</label>
                        <div class="col-sm-5 col-md-4">
                            <select class="form-control" name="id">
                                <?php foreach ($typesPraticiens as $typePraticien) : ?>
                                    <option value="<?= $this->nettoyer($typePraticien['idTypePraticien']) ?>"><?= $this->nettoyer($typePraticien['libTypePraticien']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-5">
                            <button class="btn btn-default btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
