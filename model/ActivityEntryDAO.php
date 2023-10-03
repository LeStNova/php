<?php
require_once('SqliteConnection.php');
class ActivityEntryDAO {

    private static ActivityEntryDAO $dao;

    public function __construct() {}

    public static function getInstance(): ActivityEntryDAO {
        if (!isset(self::$dao)) {
            self::$dao = new ActivityEntryDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array {
        $db = SqliteConnection::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM Data');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public final function findById(int $id): Array {
        $db = SqliteConnection::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM Data WHERE idData = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public final function insert(ActivityEntry $ae): void {

        if ($ae instanceof ActivityEntry) {

            $dbc = SqliteConnection::getInstance()->getConnection();
            $stmt = $dbc->prepare('INSERT INTO Data (idData, heureDeb, heureFin, freq, lat, lon, alt, idActiForeign) VALUES (:id, :heureDeb, :heureFin, :freq, :lat, :lon, :alt, :idActiForeign)');
            $stmt->bindValue(':id', $ae->getIdData());
            $stmt->bindValue(':heureDeb', $ae->getHeureDeb());
            $stmt->bindValue(':heureFin', $ae->getHeureFin());
            $stmt->bindValue(':freq', $ae->getFreq());
            $stmt->bindValue(':lat', $ae->getLat());
            $stmt->bindValue(':lon', $ae->getLon());
            $stmt->bindValue(':alt', $ae->getAlt());
            $stmt->bindValue(':idActiForeign', $ae->getIdActiForeign());
            $stmt->execute();

        }

    }

    public final function update(ActivityEntry $ae): void {

        if ($ae instanceof ActivityEntry) {

            $dbc = SqliteConnection::getInstance()->getConnection();
            $stmt = $dbc->prepare('UPDATE Data SET heureDeb = :heureDeb, heureFin = :heureFin, freq = :freq, lat = :lat, lon = :lon, alt = :alt, idActiForeign = :idActiForeign WHERE idData = :id');
            $stmt->bindValue(':id', $ae->getIdData());
            $stmt->bindValue(':heureDeb', $ae->getHeureDeb());
            $stmt->bindValue(':heureFin', $ae->getHeureFin());
            $stmt->bindValue(':freq', $ae->getFreq());
            $stmt->bindValue(':lat', $ae->getLat());
            $stmt->bindValue(':lon', $ae->getLon());
            $stmt->bindValue(':alt', $ae->getAlt());
            $stmt->bindValue(':idActiForeign', $ae->getIdActiForeign());
            $stmt->execute();

        }

    }

    public final function delete(int $id): void {

        $dbc = SqliteConnection::getInstance()->getConnection();
        $stmt = $dbc->prepare('DELETE FROM Data WHERE idData = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }

}
?>