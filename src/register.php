<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Account erstellen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Register Form -->
<h1 class="login">Strafenkatalog IT-BW 17</h1>
<div class="center">
    <h1>Registrierung</h1>
    <form action="register.php" method="post">
        <label for="username">Nutzername: </label><br>
        <input type="text" name="username" id="username" placeholder="AxelApple" required><br>
        <label for="password">Passwort: </label><br>
        <input type="password" name="pw" id="password" placeholder="*****" required><br>
        <label for="password2">Passwort wiederholen: </label><br>
        <input type="password" name="pw2" id="password2" placeholder="*****" required><br>
        <input type="submit" name="submit" value="Erstellen">
    </form>
    <br>
    <button onclick="window.location.href='index.php'">
        Hast du bereits einen Account?
    </button>
    <p>

        <!-- Register PHP -->
        <?php
        if (isset($_POST["submit"])) {
            require("mysql.php");
            $stmt = $mysql->prepare("SELECT * FROM t_Accounts WHERE USERNAME = :user");//Username überprüfen
            $stmt->bindParam(":user", $_POST["username"]);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count == 0) {
                //Username ist frei
                if ($_POST["pw"] == $_POST["pw2"]) {
                    //User anlegen
                    $stmt = $mysql->prepare("INSERT INTO t_Accounts (USERNAME, PASSWORD) VALUES (:user, :pw)");
                    $stmt->bindParam(":user", $_POST["username"]);
                    $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
                    $stmt->bindParam(":pw", $hash);
                    $stmt->execute();
                    echo "Dein Account wurde angelegt";
                } else {
                    echo "Die Passwörter stimmen nicht überein";
                }
            } else {
                echo "Der Username ist bereits vergeben";
            }
        }
        ?>
    </p>
</div>
</body>
</html>