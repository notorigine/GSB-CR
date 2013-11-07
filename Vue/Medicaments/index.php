<?php $this->titre = "Médicaments"; ?>

<?php
$menuMedicaments = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Liste des médicaments</h2>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Nom commercial</th>
                    <th>Famille</th>
                </tr>
            </thead>
            <?php foreach ($medicaments as $medicament): ?>
                <tr>
                    <td><a href="medicaments/details/<?= $this->nettoyer($medicament['idMedicament']) ?>"><?= $this->nettoyer($medicament['nomCommercial']) ?></a></td>
                    <td><?= $this->nettoyer($medicament['libFamille']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

