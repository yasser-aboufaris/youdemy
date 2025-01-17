<?php

class Connection
{
    public $conn; 
    private $serverName = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "youdemy";

    public function __construct()
    {

        try {
            $this->conn = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection good";
        } 
        catch(PDOException $e) {
            echo "error";
        }
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }
    
}
$conn = new Connection();