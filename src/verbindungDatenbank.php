<?php

class DatabaseConnection {
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $database = "strafenkatalog";
    private $con;

    function __construct() {
        session_start();
        if(!isset($_SESSION["username"])){
            header("Location: index.php");
            exit;
        }

        $this->con =  $this->connectDB();
    }

    function connectDB()
    {
        $con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $con;
    }

    function getData($query) {
        $result = mysqli_query($this->con, $query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
        else
            return null;
    }

    function setData($query) {
        if ($this->con->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $this->con->error;
        }
    }
}