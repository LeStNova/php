<?php
require(__ROOT__.'/controllers/Controller.php');

class DisconnectUserController extends Controller {

    public function get($request){
        session_start();
        if (isset($_SESSION["Connected"])) {
        $_SESSION["Connected"] = false;
        echo "Compte déconnecté avec succès.";
        }
        header("Location: ../index");
    }

}

?>