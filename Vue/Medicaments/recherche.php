<?php $this->titre = "Médicaments"; ?>

<?php
$menuMedicaments = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Recherche d'un médicament</h2>
    <div class="well">
        <form class="form-horizontal" role="form" action="medicaments/resultat" method="post">
            <div class="form-group">
                <label class="col-sm-3 col-sm-offset-2 control-label">Nom commercial</label>
                <div class="col-sm-5 col-md-4">
                    <select class="form-control" name="id">
                        <?php foreach ($medicaments as $medicament) : ?>
                            <option value="<?= $this->nettoyer($medicament['idMedicament']) ?>"><?= $this->nettoyer($medicament['nomCommercial']) ?></option>
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
</div>

