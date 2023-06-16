<?php
include "../VerbindungDatenbank.php";
include "../allgemeineFunktionen.php";
$conn = new DatabaseConnection();

try {
    $strafeId = $_REQUEST['strafNummer'];
    $datumBeglichen = date("Y-m-d");

    $conn->setData("UPDATE t_HatStrafe
                        SET DatumBeglichen = '$datumBeglichen'
                        WHERE StrafeNr = $strafeId;");
    echo generateAlert("Danke fürs einlösen.");
    header('Location: verwaltung.php');
} catch (PDOException $e) {
    echo generateAlert( $e->getMessage());
}