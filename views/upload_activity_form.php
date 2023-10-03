<?php include __ROOT__."/views/header.php"; ?>

<div class="container">
    <form method="post" class="drop-zone" action="upload" enctype="multipart/form-data">
        <div>
            <label for="file" id="text-drop-file">Sélectionner votre fichier .json</label>
            <input type="file" id="file" name="activity" accept=".json" class="drop-file"/>
        </div>
        <div>
            <input type="submit" value="Envoyer" class="button-submit">
        </div>
    </form>
    <?php 
        if (!empty($data[0])) {
            echo '<br><p class="rub1">'.$data[0].'</p>';
        }
    ?>
</div>
            
<?php include __ROOT__."/views/footer.html"; ?>
