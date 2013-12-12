<?php $this->titre = "Erreur !"; ?>

<div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Lien de retour à la page d'accueil -->
    <a class="navbar-brand" href="">GSB-CR</a>
</div>

<div class="container">
    <div class="alert alert-danger">
        <?= $this->nettoyer($msgErreur) ?>
    </div>
</div>