<?php
include "../VerbindungDatenbank.php";
$conn = new DatabaseConnection();

try {
    $strafeId = $_REQUEST['strafNummer'];

    $conn->setData("DELETE FROM t_HatStrafe
                        WHERE StrafeNr = $strafeId;");
    header('Location: verwaltung.php');
} catch (PDOException $e) {
    echo generateAlert( $e->getMessage());
}