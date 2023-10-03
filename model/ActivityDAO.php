<?php
require_once("SqliteConnection.php");
class ActivityDAO {

    private static ActivityDAO $instance;

    public static function getInstance(): ActivityDAO {
        if (!isset(self::$instance)) {
            self::$instance = new ActivityDAO();
        }
        return self::$instance;
    }

    public final function findAll(): Array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "SELECT * FROM Activite";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, "Activity");
        return $results;
    }

    public final function findById(int $id): Activity {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "SELECT * FROM Activite WHERE idActi = :id";
        $stmt = $dbc->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchObject("Activite");
        return $result;
    }

    public final function insert(Activity $ac): void {
        if ($ac instanceof Activity) {
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "INSERT INTO Activite (idActi, mailForeign, dateActi, description) VALUES (:idActi, :mailForeign, :dateActi, :description)";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':idActi', $ac->getIdActi());
            $stmt->bindValue(':mailForeign', $ac->getMailForeign());
            $stmt->bindValue(':dateActi', $ac->getDateActi());
            $stmt->bindValue(':description', $ac->getDescription());
            $stmt->execute();
        }
    }

    public function delete(Activity $obj): void {

        if($obj instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from Activite where idActi = (:id)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':id',$obj->getIdActi(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }

    }

    public function update(Activity $obj): void {

        if($obj instanceof Activity){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "update Activite set description = (:description) where idActi = (:idActi)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':dateActi',$obj->getDateActi(),PDO::PARAM_STR);
            $stmt->bindValue(':description',$obj->getDescription(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }

    }

    public function maxId(): array {
        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "SELECT * FROM Activite where idActi = (select MAX(idActi) from Activite)";
        $stmt = $dbc->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Activity");
        return $result;
    }

}
?>