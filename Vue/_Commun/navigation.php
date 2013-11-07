<!-- Barre de navigation en haut de la page -->
<div class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Partie de la barre toujours affichée -->
    <div class="navbar-header">
        <!-- Bouton affiché à droite si la zone d'affichage est trop petite -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Activer la navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Lien de retour à la page d'accueil -->
        <a class="navbar-brand" href="">GSB-CR</a>
    </div>
    <!-- Partie de la barre masquée en fonction de la zone d'affichage -->
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="dropdown <?= isset($menuMedicaments) ? 'active' : '' ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Médicaments <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="medicaments/">Consulter</a></li>
                    <li><a href="medicaments/recherche">Rechercher</a></li>
                </ul>
            </li>
            <li class="disabled"><a href="#">Praticiens</a></li>
            <li class="disabled"><a href="#">Comptes-rendus</a></li>
        </ul>
    </div>
</div>