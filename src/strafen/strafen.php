<?php
include "../verbindungDatenbank.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Strafen</title>
</head>
<body>
<?php
$conn = new DatabaseConnection();
$strafen = $conn->getData("SELECT t_HatStrafe.*, tS.Vorname, Nachname, t.Bezeichnung, Kosten  FROM t_HatStrafe
                                    LEFT JOIN t_Schueler tS 
                                        on tS.SchuelerId = t_HatStrafe.FKSchuelerId
                                    LEFT JOIN t_Strafe t 
                                        on t_HatStrafe.FKStrafeId = t.StrafeId;");
?>

<!-- Navigation -->
<nav class="nav-bar">
    <ul>
        <li><a href="../dashboard.php">Dashboard</a></li>
        <li><a href="../strafenkatalog/strafenkatalog.php">Strafenkatalog</a></li>
        <li><a href="" class="active">Strafen</a></li>
        <li><a href="../verwaltung/verwaltung.php">Verwaltung</a></li>
    </ul>
</nav>

<!-- Content -->
<div class="center">
    <div class="inline">
        <h1>Strafen</h1>
        <!-- Info Button -->
        <div class="info" id="center">
            &#9432;

            <span class="extra-info" id="center">
            Hier findest du eine Liste aller Strafen.
            </span>
        </div>
    </div>

    <table>
        <tr>
            <th>Vorname, Nachname</th>
            <th>Strafe</th>
            <th>Datum Erfassung</th>
            <th>Datum Beglichen</th>
            <th>Kosten</th>
        </tr>
        <?php foreach ($strafen as $oneStrafe) { ?>
            <tr>
                <td><?php echo $oneStrafe['Vorname'] . " " . $oneStrafe['Nachname'] ?></td>
                <td><?php echo $oneStrafe['Bezeichnung'] ?></td>
                <td><?php echo $oneStrafe['DatumErfassung'] ?></td>
                <td><?php echo $oneStrafe['DatumBeglichen'] ?></td>
                <td><?php echo $oneStrafe['Kosten'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>