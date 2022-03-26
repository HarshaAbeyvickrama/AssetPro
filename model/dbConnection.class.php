<?php

class DBConnection
{

    public function connect()
    {
        try {
            $username = "root";
            $host = "localhost";
            $pwd = "";
            $db = "assetpro";
            $dbConnection = new PDO('mysql:host=' . $host . ';dbname=' . $db, $username, $pwd);
            $dbConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbConnection;
        } catch (PDOException $e) {
            print "Error : " . $e->getMessage() . '<br/>';
            die();
        }
    }
    //Newly added
    //Prepare statement with query
    public function query($sql)
    {
        $this->stmt = $this->dbConnection->prepare($sql);
    }

    //Bind values to prepared statement using named parameters
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    //Return multiple records
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Return  single record
    public function single()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }


}

?>
