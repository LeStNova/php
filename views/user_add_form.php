<?php include __ROOT__."/views/header.php"; ?>

<div class="container">
    <form id="question" method="post" action="user_add">
        <input name="email" type="email" placeholder="e-mail *" required="required">
        <input name="mdp" type="password" placeholder="mot-de-passe *" required="required">
        <input name="nom" type="text" placeholder="nom *" required="required">
        <input name="prenom" type="text" placeholder="prénom *" required="required">
        <input name="dateNaissance" type="date" placeholder="date de naissance" max="2018-12-3">
        <label for="sexe"><strong name="sexe"></strong></label>
        <select id="sexe" name="sexe">
        <optgroup label="Sexe">
            <option></option>
            <option value="F">F</option>
            <option value="H">H</option>
        </optgroup>
        </select>
        <input name="poids" type="number" placeholder="poids" min="1">
        <input name="taille" type="number" placeholder="taille (cm)" min="1">

        <input type="submit" value="enregistrer">
        <p style="color: #cf8a8a">* sont requis pour valider</p>
    </form>
    
</div>

<?php include __ROOT__."/views/footer.html"; ?>