<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <base href="<?= $racineWeb ?>" >

        <!-- Feuilles de style -->
        <link rel="stylesheet" href="Librairies/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="Contenu/style.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="Contenu/Images/favicon.ico">

        <!-- Titre -->
        <title>GSB-CR - <?= $titre ?></title>
    </head>
    <body>
        <?= $contenu ?>

        <!-- jQuery -->
        <script src="Librairies/jquery/jquery-1.10.2.min.js"></script>
        <!-- Plugin JavaScript Boostrap -->
        <script src="Librairies/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>