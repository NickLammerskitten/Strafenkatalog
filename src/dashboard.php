<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Strafenkatalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- Navigation -->
<nav class="nav-bar">
    <ul>
        <li><a href="" class="active">Dashboard</a></li>
        <li><a href="strafenkatalog/strafenkatalog.php">Strafenkatalog</a></li>
        <li><a href="strafen/strafen.php">Strafen</a></li>
        <li><a href="verwaltung/verwaltung.php">Verwaltung</a></li>
        <a href="logout.php">Abmelden</a>
    </ul>
</nav>

<!-- Content -->
<div class="center">
    <h1>Dashboard</h1>
    <p>
        Herzlich willkommen im Strafenkatalog von unserem Kurs. <br>
        Hier kannst du immer den aktuellsten Stand der festgelegten <br>
        Strafen sehen und welchem Kommilitonen welche Strafen zugeordnet <br>
        wurden. <br>
        Die Verwaltung der Strafen ist ebenfalls über diese Seite <br>
        zu steuern.
    </p>

    <h4>Vorhaben</h4>
    <ul>
        <li>Dashboard zur Erklärung der Seite</li>
        <li>Strafenkatalog als Übersicht der möglichen Strafen</li>
        <li>Strafen als Liste, welcher Kommilitone, welche Strafen erhalten hat</li>
        <li>Verwaltung der Strafen</li>
    </ul>
</div>
</body>
</html>
