<?php

class DBConnection{
    public function connect()    {
        try {
            $username = "root";
            $host = "localhost";
            $pwd = "";
            $db = "assetpro";
            $dbConnection = new PDO('mysql:host=' . $host . ';dbname=' . $db, $username, $pwd);
            $dbConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);
            return $dbConnection;
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage() . '<br/>';
            die();
        }
    }
}
?>
