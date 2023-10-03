
<?php include __ROOT__."/views/header.php"; ?>

<div class="container">
<?php
    if ($compteCree === true){
        echo('<p style="color: #EEEEEE">Utilisateur créé avec succès</p>');
        $_SESSION["Connected"] = true;
        header("Location: ../index");

    } else {
        echo('<p style="color: #EEEEEE">Erreur lors de la création du compte</p>');
    }
    ?>
</div>

<?php include __ROOT__."/views/footer.html"; ?>