<?php

include "../VerbindungDatenbank.php";

echo "Test";
try {
    $conn  = new DatabaseConnection();
    $schueler = $conn->getData("SELECT *
                                FROM t_Schueler;");
    $strafen = $conn->getData("SELECT StrafeId, Bezeichnung
                                    FROM t_Strafe;");
    echo "Got Data!";
} catch (Exception $e) {
    echo "<br>" . $e->getMessage();
}

?>