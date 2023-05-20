<?php
    include "../VerbindungDatenbank.php"; ?>
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
    $conn =  new DatabaseConnection();
    $schueler = $conn->getData("SELECT * FROM t_Schueler;");
    $strafen = $conn->getData("SELECT StrafeId, Bezeichnung FROM t_Strafe;");
?>
<!-- Navigation -->
<nav class="nav-bar">
    <ul>
        <li><a href="../index.php">Dashboard</a></li>
        <li><a href="../strafenkatalog/strafenkatalog.html">Strafenkatalog</a></li>
        <li><a href="" class="active">Verwaltung</a></li>
    </ul>
</nav>
<!-- Content -->
<h1>Verwaltung</h1>
<h4>Strafe hinzufügen</h4>
<form method="POST" action="strafeHinzufuegen.php">
    <label for="schuelerField">Schüler: </label><br>
    <select name="schueler" id="schuelerField">
        <?php foreach($schueler as $oneSchueler){ ?>
        <option value="<?php echo $oneSchueler['SchuelerId'] ?>">
            <?php
            echo $oneSchueler['Vorname'] . " " . $oneSchueler['Nachname'] ?></option>
        <?php } ?>
    </select><br>
    <label for="strafeField">Strafnummer</label><br>
    <select name="strafNummer" id="strafeField">
        <?php foreach($strafen as $strafe){ ?>
            <option value="<?php echo $strafe['StrafeId'] ?>">
                <?php
                echo $strafe['Bezeichnung'] ?></option>
        <?php } ?>
    </select><p>
    <input class="input" type="submit" value="Abschicken">
</form>

<p>Bei klicken auf den Button "Abschicken", wird eine HTTP Request ausgelöst, der einen neuen Strafeintrag erstellt</p>
</body>
</html>