<?php
include "../verbindungDatenbank.php"; ?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Verwaltung</title>
    <link rel="stylesheet" href="verwaltung.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<?php
$conn = new DatabaseConnection();
$schueler = $conn->getData("SELECT * FROM t_Schueler;");
$strafen = $conn->getData("SELECT StrafeId, Bezeichnung FROM t_Strafe;");

$erfassteStrafen = $conn->getData("SELECT t_HatStrafe.*, tS.Vorname, Nachname, t.Bezeichnung, Kosten  FROM t_HatStrafe
                                                                            LEFT JOIN t_Schueler tS
                                                                                      on tS.SchuelerId = t_HatStrafe.FKSchuelerId
                                                                            LEFT JOIN t_Strafe t
                                                                                      on t_HatStrafe.FKStrafeId = t.StrafeId;
");
?>
<!-- Navigation -->
<nav class="nav-bar">
    <ul>
        <li><a href="../dashboard.php">Dashboard</a></li>
        <li><a href="../strafenkatalog/strafenkatalog.php">Strafenkatalog</a></li>
        <li><a href="../strafen/strafen.php">Strafen</a></li>
        <li><a href="" class="active">Verwaltung</a></li>
        <div class="order-container">
       <li><a href="../logout.php">Abmelden</a></li>
       </div>
    </ul>
</nav>

<!-- Content -->
<div class="center">
    <div class="inline">
        <h1>Verwaltung</h1>
        <!-- Info Button -->
        <div class="info" id="center">
            &#9432;
            <span class="extra-info" id="center">
            Verwaltet alle Strafen.
            </span>
        </div>
    </div>
    <h4>Strafe hinzufügen</h4>
    <form method="POST" action="strafeHinzufuegen.php">
        <label for="schuelerField">Schüler: </label><br>
        <select name="schueler" id="schuelerField">
            <?php foreach ($schueler as $oneSchueler) { ?>
                <option value="<?php echo $oneSchueler['SchuelerId'] ?>">
                    <?php
                    echo $oneSchueler['Vorname'] . " " . $oneSchueler['Nachname'] ?></option>
            <?php } ?>
        </select><br>
        <label for="strafeField">Strafe</label><br>
        <select name="strafNummer" id="strafeField">
            <?php foreach ($strafen as $strafe) { ?>
                <option value="<?php echo $strafe['StrafeId'] ?>">
                    <?php
                    echo $strafe['Bezeichnung'] ?></option>
            <?php } ?>
        </select>
        <p></p>
        <input class="input" type="submit" value="Hinzufügen">
    </form>

    <h4>Strafe als beglichen markieren</h4>
    <form method="POST" action="strafeBegleichen.php">
        <label for="strafeField">Strafe</label><br>
        <select name="strafNummer" id="strafeField">
            <?php foreach ($erfassteStrafen as $erfassteStrafe) {
                if ($erfassteStrafe['DatumBeglichen'] == null) { ?>
                    <option value="<?php echo $erfassteStrafe['StrafeNr'] ?>">
                        <?php
                        echo $erfassteStrafe['Vorname'] . " " . $erfassteStrafe['Nachname'] . ", " . $erfassteStrafe['DatumErfassung'] . ", " . $erfassteStrafe['Bezeichnung'] ?></option>
                    <?php
                }
            }
            ?>
        </select>
        <p></p>
        <input class="input" type="submit" value="Begleichen">
    </form>

    <h4>Strafe löschen</h4>
    <form method="POST" action="strafeLoeschen.php">
        <label for="strafeField">Strafe</label><br>
        <select name="strafNummer" id="strafeField">
            <?php foreach ($erfassteStrafen as $erfassteStrafe) { ?>
                <option value="<?php echo $erfassteStrafe['StrafeNr'] ?>">
                    <?php
                    echo $erfassteStrafe['Vorname'] . " " . $erfassteStrafe['Nachname'] . ", " . $erfassteStrafe['DatumErfassung'] . ", " . $erfassteStrafe['Bezeichnung'] ?></option>
                <?php
            }
            ?>
        </select>
        <p></p>
        <input class="input" type="submit" value="Löschen">
    </form>

    <hr>

    <h4>Neue Strafe anlegen</h4>
    <form method="POST" action="strafeErstellen.php">
        <label for="strafeField">Bezeichnung</label><br>
        <input placeholder="Neue Strafe" type="text" class="input" name="strafeBezeichnung" id="strafeField">
        <p></p>
        <label for="strafeKostenField">Kosten</label><br>
        <input placeholder="10.50" type="text" class="input" name="strafeKosten" id="strafeKostenField">
        <p></p>
        <input class="input" type="submit" value="Anlegen">
    </form>
</div>
</body>
</html>