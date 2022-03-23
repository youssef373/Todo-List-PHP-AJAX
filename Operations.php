<?php

class Operations
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    //insert Task
    public function insert()
    {
        if(isset($_POST['task']))
        {
            //get the task
            $task = $_POST['task'];
            //Insert Query
            $query = "INSERT INTO tasks (task) VALUES (?)";
            //prepare the query
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $task, PDO::PARAM_STR);
            //execute query
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                return false;
            }

        }
        return false;
    }
    //Get Tasks
    public function getTasks()
    {
        $query = "SELECT * FROM tasks; ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    //remove task
    public function removeTask($id): bool
    {
        $query = "DELETE FROM tasks WHERE id = $id";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}