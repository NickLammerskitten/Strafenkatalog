<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=strafenkatalog", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $schuelerId = $_REQUEST['schueler'];
    $strafeId = $_REQUEST['strafNummer'];
    $datumErfassung = date("Y-m-d");

    $sql = "INSERT INTO t_HatStrafe (FKSchuelerId, FKStrafeId, DatumErfassung) 
                VALUES ('$schuelerId' , '$strafeId', '$datumErfassung');";

    $conn->query($sql);
    echo "New record created successfully";
} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
}