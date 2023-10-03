
<?php include __ROOT__."/views/header.php"; ?>

<div class="container">
<?php
    if ($compteCo === true){
        echo('<p style="color: #EEEEEE">Utilisateur connecté avec succès</p>');
        $_SESSION["Connected"] = true;
        header("Location: ../index");

    } else {
        echo('<p style="color: #EEEEEE">Erreur lors de la connexion au compte</p>');
    }
    ?>
</div>

<?php include __ROOT__."/views/footer.html"; ?>