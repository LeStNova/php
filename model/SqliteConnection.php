<?php

class SqliteConnection extends PDO{
    private static $instance = null; // Instance unique de la classe
    private $connection; // Objet PDO pour la connexion à la base de données

    private function __construct()
    {
        $dbPath = 'bdd/sport_track.db';

        try {
            $this->connection = new PDO("sqlite:$dbPath");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new SqliteConnection();
        }
        return self::$instance;
    }

    public static function getConnection()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance->connection;
    }
}

?>