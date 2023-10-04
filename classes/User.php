<?php
require_once('Database.php');
class User{


    private $conn;

    //initialized the databse first
    public function __construct( ) {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
    }


    // Execute sql
    public function runQury($sql)
    {
        $statement = $this->conn->prepare($sql);
        return $statement;

    }


    //Insert data
    public function insert($name , $email)
    {
       try {
        $statement = $this->conn->prepare("INSERT INTO students (name, email) VALUES (:email, :email)");

        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->execute();
        return $statement;

       } catch (PDOException $exception) {
            echo $exception->getMessage();
       }

    }


    public function udpate($name, $email, $id)
    {
       try {
        $statement = $this->conn->prepare("UDPAET INTO students SET name = :name, email = :email WHERE id = :id");
        
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement;

       } catch (PDOException $exception) {

            echo $exception->getMessage();       
        }

    }

    public function delete($id)
    {
        try {
            $statement = $this->conn->prepare("DELETE FROM   students  WHERE id = :id");
            
            $statement->bindParam(":id", $id);
            $statement->execute();
            return $statement;
    
           } catch (PDOException $exception) {
            
                echo $exception->getMessage();       
            }
    }

    public function redirectUrl($url){
        header("Location: $url");
    }
    
}



?>