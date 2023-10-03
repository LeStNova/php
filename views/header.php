
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Sport Track</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name=“author” content=”LeStNova”>
    <link href="/static/css/style.css" rel="stylesheet" type="text/css">
</head>


<body>
    <div id="header">
        <a id="logo-text" href="index">Sport Track</a>

        <div id="home">
            
            <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                if (!(isset($_SESSION["Connected"])) || ($_SESSION["Connected"] === false)){
                    echo '<a class="link" href="connect">Connexion</a>';
                }

                if (!(isset($_SESSION["Connected"])) || ($_SESSION["Connected"] === false)){
                    echo '<a class="link" href="user_add">Enregistrer</a>';
                }

                if (!(isset($_SESSION["Connected"])) || ($_SESSION["Connected"] === true)){
                    echo ' <a class="link" href="upload">Déposer un fichier</a>';
                }

                if (!(isset($_SESSION["Connected"])) || ($_SESSION["Connected"] === true)){
                    echo ' <a class="link" href="account"> Compte</a>';
                }

                if (!(isset($_SESSION["Connected"])) || ($_SESSION["Connected"] === true)){
                    echo '<a class="link" href="disconnect">    Déconnexion</a>';
                }
                
            ?>
                
        </div>
    </div>
