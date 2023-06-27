<?php
include "../VerbindungDatenbank.php";

$conn = new DatabaseConnection();

try {
    $strafeBezeichnung = $_REQUEST['strafeBezeichnung'];
    $strafeKosten = $_REQUEST['strafeKosten'];

    $conn->setData("INSERT INTO t_Strafe (Bezeichnung, Kosten) VALUES 
                            ('$strafeBezeichnung',
                             '$strafeKosten');");
    header('Location: verwaltung.php');
} catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}