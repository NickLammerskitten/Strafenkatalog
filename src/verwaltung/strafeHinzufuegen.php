<?php
    include "../VerbindungDatenbank.php";

    $con = new DatabaseConnection();

    try {
    $schuelerId = $_REQUEST['schueler'];
    $strafeId = $_REQUEST['strafNummer'];
    $datumErfassung = date("Y-m-d");

    $sql = "INSERT INTO t_HatStrafe (FKSchuelerId, FKStrafeId, DatumErfassung) 
                VALUES ('$schuelerId' , '$strafeId', '$datumErfassung');";

    $con->connectDB($sql);
    echo "New record created successfully";

    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }