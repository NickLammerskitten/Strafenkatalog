<?php
include "../VerbindungDatenbank.php";

$conn = new DatabaseConnection();

try {
    $strafeId = $_REQUEST['strafNummer'];
    $datumBeglichen = date("Y-m-d");

    $conn->setData("UPDATE t_HatStrafe
                        SET DatumBeglichen = '$datumBeglichen'
                        WHERE StrafeNr = $strafeId;");
    header('Location: verwaltung.php');
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}