<?php include __ROOT__."/views/header.php"; ?>

<div class="container">
    <!-- action renvoie au controler -->
    <form method="post" action="connect">
        <!-- name est le nom de la varibale renvoyé dans le $request du controler -->
        <input type="email" placeholder="e-mail" name="mail" required="required">
        <input type="password" placeholder="mot-de-passe" name="password" required="required">
        <div class="login-psw">
            <input type="submit" value="connecter">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" class="link selected">mot de passe oublié</a>
        </div>
    </form>
</div>

<?php include __ROOT__."/views/footer.html"; ?>