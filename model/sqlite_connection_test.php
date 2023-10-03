<?php

require_once('UtilisateurDAO.php');
require_once('Utilisateur.php');
require_once('ActivityDAO.php');
require_once('ActivityEntryDAO.php');
require_once('SqliteConnection.php');


// ------------------ test user ------------------

// test insert and select the user
testInsertUser();
testSelectUser();
echo "\nUser inserted\n\n";

// test update and select the user
testUpdateUser();
testSelectUser();
echo "\nUser updated\n\n";

// test findAll the user
testFindAllUser();

// test delete and select the user
testDeleteUser();
testSelectUser();
echo "\nUser deleted\n\n";


function testInsertUser() {
    $user = new Utilisateur();
    $user->init("Belbeoch", "Ewen", "ewen.belbeoch@gmail.com", "18/02/2004", "H", 63, 178, "belbeoch");

    try {
        $userDAO = new UtilisateurDAO();
        $userDAO->insert($user);
    } catch (PDOException $e) {
        die("Erreur de connexion ou bien doublon dans la table : " . $e->getMessage());
    }
}

function testSelectUser() {
    try {
        $userDAO = UtilisateurDAO::getInstance();
        $users = $userDAO->findAll();
        print_r($users);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

}

function testDeleteUser() {

    $user = new Utilisateur();
    $user->init("Belbeoch", "Ewen", "ewen.belbeoch@gmail.com", "18/02/2004", "H", 63, 178, "belbeoch");

    try {
        $userDAO = new UtilisateurDAO();
        $userDAO->delete($user);
    } catch (PDOException $e) {
        die("Erreur de connexion ou bien pas de préscence dans la table : " . $e->getMessage());
    }

}

function testUpdateUser() {

    $user = new Utilisateur();
    $user->init("Belbeoch", "Ewen", "ewen.belbeoch@gmail.com", "18/02/2004", "F", 63, 178, "belbeoch");

    try {
        $userDAO = new UtilisateurDAO();
        $userDAO->update($user);
    } catch (PDOException $e) {
        die("Erreur de connexion ou argument non valide : " . $e->getMessage());
    }

}

function testFindAllUser() {
    try {
        $userDAO = UtilisateurDAO::getInstance();
        $users = $userDAO->findAll();
        print_r($users);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}

// ------------------ end test user ------------------

// ------------------ test activity ------------------

testInsertUser();

// test insert and select the activity
testSelectActivite();
testInsertActivite();
testSelectActivite();
echo "\nActivite inserted\n\n";

// test update and select the activity
testSelectActivite();
testUpdateActivite();
testSelectActivite();
echo "\nActivite updated\n\n";

// test delete and select the activity
testSelectActivite();
testDeleteActivite();
testSelectActivite();
echo "\nActivite deleted\n\n";

testDeleteUser();


function testInsertActivite() {

    $user = new Utilisateur();
    $user->init("Belbeoch", "Ewen", "ewen.belbeoch@gmail.com", "18/02/2004", "H", 63, 178, "belbeoch");

    $activite = new ActivityDAO();
    $activite->init(1, $user, "30/09/2023", "Petit runing dans les bois");

    try {
        $activiteEntryDAO = new ActivityEntryDAO();
        $activiteEntryDAO->insert($activite);
    } catch (PDOException $e) {
        die("Erreur de connexion ou bien doublon dans la table : " . $e->getMessage());
    }

}

function testSelectActivite() {
    try {
        $activiteEntryDAO = ActivityEntryDAO::getInstance();
        $activites = $activiteEntryDAO->findAll();
        print_r($activites);
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }

}

function testDeleteActivite() {

    $user = new Utilisateur();
    $user->init("Belbeoch", "Ewen", "ewen.belbeoch@gmail.com", "18/02/2004", "H", 63, 178, "belbeoch");

    $activite = new ActivityDAO();
    $activite->init(1, $user, "30/09/2023", "Petit runing dans les bois");

    try {
        $activiteDAO = new ActivityEntryDAO();
        $activiteDAO->delete($activite);
    } catch (PDOException $e) {
        die("Erreur de connexion ou bien pas de préscence dans la table : " . $e->getMessage());
    }

}

function testUpdateActivite() {

    $user = new Utilisateur();
    $user->init("Belbeoch", "Ewen", "ewen.belbeoch@gmail.com", "18/02/2004", "H", 63, 178, "belbeoch");

    $activite = new ActivityDAO();
    $activite->init(1, $user, "30/09/2023", "Teste modif");

    try {
        $activiteDAO = new ActivityEntryDAO();
        $activiteDAO->update($activite);
    } catch (PDOException $e) {
        die("Erreur de connexion ou bien pas de préscence dans la table : " . $e->getMessage());
    }

}

?>