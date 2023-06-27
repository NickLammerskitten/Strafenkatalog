<?php
include "../verbindungDatenbank.php";
include "../allgemeineFunktionen.php";
$conn = new DatabaseConnection();

try {
    $schuelerId = $_REQUEST['schueler'];
    $strafeId = $_REQUEST['strafNummer'];
    $datumErfassung = date("Y-m-d");

    $conn->setData("INSERT INTO t_HatStrafe (FKSchuelerId, FKStrafeId, DatumErfassung) 
                VALUES ('$schuelerId' , '$strafeId', '$datumErfassung');");

    echo generateAlert("Strafe hinzugefügt.");
    header('Location: verwaltung.php');

} catch (PDOException $e) {
    echo generateAlert( $e->getMessage());
}
