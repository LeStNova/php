<?php
require_once('SqliteConnection.php');
class UtilisateurDAO {
    private static UtilisateurDAO $dao;

    public function __construct() {}

    public static function getInstance(): UtilisateurDAO {
        if(!isset(self::$dao)) {
            self::$dao= new UtilisateurDAO();
        }
        return self::$dao;
    }

    public final function findAll(): Array {

        $dbc = SqliteConnection::getInstance()->getConnection();
        $query = "SELECT * FROM User ORDER BY name, firstName";
        $stmt = $dbc->query($query);
        $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Utilisateur');
        return $results;
        
    }

    public final function insert(Utilisateur $st): void {
        if($st instanceof Utilisateur){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "insert into User(mail, firstName, name, born, sexe, weight, size, password) values (:m,:f,:n,:b,:sexe,:w,:size,:p)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':m',$st->getMail(),PDO::PARAM_STR);
            $stmt->bindValue(':f',$st->getFirstName(),PDO::PARAM_STR);
            $stmt->bindValue(':n',$st->getName(),PDO::PARAM_STR);
            $stmt->bindValue(':b',$st->getBorn(),PDO::PARAM_STR);
            $stmt->bindValue(':sexe',$st->getSexe(),PDO::PARAM_STR);
            $stmt->bindValue(':w',$st->getWeight(),PDO::PARAM_STR);
            $stmt->bindValue(':size',$st->getSize(),PDO::PARAM_STR);
            $stmt->bindValue(':p',$st->getPassword(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function delete(Utilisateur $obj): void {
        if($obj instanceof Utilisateur){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "delete from User where mail = (:m)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':m',$obj->getMail(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

    public function update(Utilisateur $obj): void {
        if($obj instanceof Utilisateur){
            $dbc = SqliteConnection::getInstance()->getConnection();
            // prepare the SQL statement
            $query = "update User set firstName = (:fNew), name = (:nNew), born = (:bNew), sexe = (:sexeNew), weight = (:wNew), size = (:sizeNew), password = (:pNew) where mail = (:m)";
            $stmt = $dbc->prepare($query);

            // bind the paramaters
            $stmt->bindValue(':m',$obj->getMail(),PDO::PARAM_STR);

            $stmt->bindValue(':fNew',$obj->getFirstName(),PDO::PARAM_STR);
            $stmt->bindValue(':nNew',$obj->getName(),PDO::PARAM_STR);
            $stmt->bindValue(':bNew',$obj->getBorn(),PDO::PARAM_STR);
            $stmt->bindValue(':sexeNew',$obj->getSexe(),PDO::PARAM_STR);
            $stmt->bindValue(':wNew',$obj->getWeight(),PDO::PARAM_STR);
            $stmt->bindValue(':sizeNew',$obj->getSize(),PDO::PARAM_STR);
            $stmt->bindValue(':pNew',$obj->getPassword(),PDO::PARAM_STR);

            // execute the prepared statement
            $stmt->execute();
        }
    }

}
?>