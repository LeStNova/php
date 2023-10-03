<?php include __ROOT__."/views/header.php"; 

//session_start();

if (!(isset($_SESSION["Connected"]))){
$_SESSION["Connected"] = false;
}

if (!(isset($_SESSION["mail"]))){
    $_SESSION["mail"] = "unset";
}




?>
<div id="rub1">
    <h2>Présentation</h2>
    Sport Track est une application qui vous permet de suivre votre avancée sportive<br>
</div>
            
<?php include __ROOT__."/views/footer.html"; ?>
