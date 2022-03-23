<?php

class Database
{
    //DB stuff
    private $servername = "localhost";
    private $db_name = "to_do_list";
    private $username = "root";
    private $password = "";

    //set options
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    private $conn;

    //DB Connect
    public function connect(): PDO
    {
        try {
            $dsn = "mysql:host=$this->servername;dbname=$this->db_name";
            $this->conn = new PDO($dsn, $this->username, $this->password, $this->options);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }

        return $this->conn;
    }


}