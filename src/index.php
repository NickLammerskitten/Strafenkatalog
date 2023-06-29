<?php
include "allgemeineFunktionen.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Login Form -->
<h1 class="login">Strafenkatalog IT-BW 17</h1>
<div class="center">
    <h1> Anmeldung </h1>
    <form action="index.php" method="post">
        <label for="username">Nutzername: </label><br>
        <input type="text" name="username" placeholder="AxelApple" required><br>
        <label for="password">Passwort: </label><br>
        <input type="password" name="pw" placeholder="*****" required><br>
        <input type="submit" name="submit" value="Einloggen">
    </form>
    <br>
    <button onclick="window.location.href='register.php';">
        Account erstellen
    </button>
    <p>

        <!-- Login PHP -->
        <?php
        if (isset($_POST["submit"])) {
            require("mysql.php");
            $stmt = $mysql->prepare("SELECT * FROM t_Accounts WHERE USERNAME = :user");//Username überprüfen
            $stmt->bindParam(":user", $_POST["username"]);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count == 1) {
                //Username ist frei
                $row = $stmt->fetch();
                if (password_verify($_POST["pw"], $row["PASSWORD"])) {
                    session_start();
                    $_SESSION["username"] = $row["USERNAME"];
                    header("Location: dashboard.php");
                } else {
                    echo "Der Login ist fehlgeschlagen";
                }
            } else {
                echo "Der Login ist fehlgeschlagen";
            }
        }
        ?>
    </p>
</div>
</body>
</html>
