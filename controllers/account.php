<?php
// controllers/AddUserController.php
require_once(__ROOT__.'/controllers/Controller.php');
require_once(__ROOT__.'/model/Utilisateur.php');
require_once(__ROOT__.'/model/UtilisateurDAO.php');

class AccountController extends Controller {

    public function get($request) {
        $this->render('account', []);
    }

    public function post($request) {
        // Récupération des données du formulaire
        session_start();
        $name = $request['nom'];
        $firstName = $request['prenom'];
        $mail = $_SESSION["mail"];
        $password = $request['mdp'];

        
        if (array_key_exists('sexe', $request)) {
            $sexe = $request['sexe'];
        } else {
            $sexe = 'NONE';
        }

        if (array_key_exists('dateNaissance', $request)) {
            $born = $request['dateNaissance'];
        } else {
            $born = '01/01/0001';
        }

        if (array_key_exists('dateNaissance', $request)) {
            $size = $request['taille'];
        } else {
            $size = 1;
        }

        if (array_key_exists('dateNaissance', $request)) {
            $weight = $request['poids'];
        } else {
            $weight = 1;
        }

        // echo $name. $firstName. $mail. $born. $sexe. $weight. $size. $password;
        // Création d'un nouvel utilisateur
        $nouvelUtilisateur = new Utilisateur();
        $nouvelUtilisateur->init($name, $firstName, $mail, $born, $sexe, $weight, $size, $password);

        // Vérification si l'adresse email est déjà utilisée
        $utilisateurDAO = new UtilisateurDAO();
        
        $existingUser = $this->findByEmail($mail);

        if ($existingUser != null) {
            // La modification a réussi, redirigez l'utilisateur vers une page de confirmation
            $utilisateurDAO->update($nouvelUtilisateur);
            header('Location: ../index');
            $this->render('index', []);

        } else {
            // Erreur dans la modfification
            $this->render('account', []);
        }

    }


    public final function findByEmail(string $email): ?Utilisateur {
        $dbc = SqliteConnection::getConnection();
        $query = "SELECT * FROM User WHERE mail = :mail";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':mail', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetchObject('Utilisateur');
        return ($user !== false) ? $user : null;
    }

}

?>
