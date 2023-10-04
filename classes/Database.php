<?php

class Database {
    //connection variable
    private $host = "localhost";
    private $dbname = "crud_pdo";
    private $username = "root";
    private $password = "";


    public $conn;

    public function dbConnection()
    {
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" .$this->host. ";dbname=" .$this->dbname, $this->username,$this->password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));

        }catch(PDOException $exception){
            echo "connection error" . $exception->getMessage();
        }

        return $this->conn;
    }
}






?>