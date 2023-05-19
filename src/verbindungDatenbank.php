<?php

class DatabaseConnection {
    private $servername = "localhost";
    private $username = "root";
    private $password = "root";
    private $con;

    function __construct() {
        $this->con =  $this->connectDB();
    }

    function connectDB()
    {
        $this->con = new PDO("mysql:host=$this->servername;dbname=strafenkatalog", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->con;
    }

    function getData($query) {
        $result = mysqli_query($this->con, $query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }
}