<?php $this->titre = " Connexion" ?>
 
<div class="container">
    <h2 class="text-center">Connexion à GSB-CR</h2>
    <div class="well">
        <form class="form-signin form-horizontal" method="post" action="connexion/connecter" role="form">
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input class="form-control" type="text" autofocus="" required="" placeholder="Entrez votre login" name="login"></input>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input class="form-control" type="password" required="" placeholder="Entrez votre mot de passe" name="mdp"></input>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <button class="btn btn-default btn-primary" type="submit">
                        <span class="glyphicon glyphicon-log-in"></span> Connexion </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php if (isset($msgErreur)): ?>
    <div class="alert alert-danger"><?= $msgErreur ?></div>
<?php endif; ?>
