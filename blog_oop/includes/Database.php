<?php

class Database
{
    private $connection;

    public function __construct() {
        $dbc = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $this->connection = $dbc;
    }
    public function __destruct() {
        $this->connection = NULL;
    }
    public function sqlQuery($sql, $bindVal = NULL) {
        $statement = $this->connection->prepare($sql);
        if(is_array($bindVal)) {
            $statement->execute($bindVal);
        } else {
            $statement->execute();
        }
        return $statement;
    }
    public function fetchArray($sql, $bindVal = NULL) {
        $result = $this->sqlQuery($sql, $bindVal);
        if($result->rowCount() == 0) {
            return false;
        } else {
            return $result->fetchAll(PDO::FETCH_ASSOC); //return associative array
        }
    }
}

$dbc = new Database();
?>