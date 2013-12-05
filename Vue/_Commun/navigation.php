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
            <li class="dropdown <?= isset($menuPraticiens) ? 'active' : '' ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Praticiens <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="praticiens/">Consulter</a></li>
                    <li><a href="praticiens/recherche">Rechercher</a></li>
                </ul>
            </li>
            <li class="dropdown <?= isset($menuComptesRendus) ? 'active' : '' ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Comptes-rendus <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="comptesrendus/">Ajouter</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="connexion/deconnecter"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter</a></li>
        </ul>
    </div>
</div>