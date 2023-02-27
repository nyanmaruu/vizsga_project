<?php

class Connection
 {
    private $dsn = "mysql:host=localhost;dbname=vizsgaproject_ladmaczilinda";
    private $user = "root";
    private $pass = "";
    public $conn;
    public function __construct()
    {
        try
        {
            $this->conn=new PDO($this->dsn,$this->user, $this->pass);
            $this->conn->exec("set names utf8");
        } catch(PDOException $e)
        {
            throw new Exception("Az adatbázissal való kapcsolódás sikertelen");

        }
    }
}
