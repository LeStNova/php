<?php

require_once('Controller.php');
require_once(__ROOT__.'/model/SqliteConnection.php');
require_once(__ROOT__.'/model/Utilisateur.php');
require_once(__ROOT__.'/model/UtilisateurDAO.php');

class ConnectUserController extends Controller {

    private $connection = false;

    public function __construct() {}

    public function init($request) {


        $mail = $request['mail'];
        $mdp = $request['password'];
        $_SESSION["mail"] = $mail;


        try {
            $userDAO = new UtilisateurDAO();
            $users = $userDAO->findAll();

            foreach($users as &$user) {

                if (strcasecmp($user->getMail(), $mail) == 0) {
                    if (strcmp($user->getPassword(), $mdp) == 0) {
                        $this->connection = true;
                    } else {
                        echo "mauvais password";
                        $this->connection = false;
                    }
                } else {
                    echo "mail inconnu";
                    $this->connection = false;
                }
            }
        } catch (PDOException $e) {
            die("Erreur de connexion ou bien doublon dans la table : " . $e->getMessage());
        }

    }

    public function getConnection() {
        return $this->connection;
    }

}

?>