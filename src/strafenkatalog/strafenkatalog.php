<?php
include "../verbindungDatenbank.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css">
    <title>Strafenkatalog</title>
</head>
<body>
<!-- Navigation -->
<nav class="nav-bar">
    <ul>
        <li><a href="../dashboard.php">Dashboard</a></li>
        <li><a href="" class="active">Strafenkatalog</a></li>
        <li><a href="../strafen/strafen.php">Strafen</a></li>
        <li><a href="../verwaltung/verwaltung.php">Verwaltung</a></li>
        <div class="order-container">
            <li><a href="../logout.php">Abmelden</a></li>
        </div>
    </ul>
</nav>
<?php
$conn = new DatabaseConnection();
$strafen = $conn->getData("SELECT Bezeichnung, Kosten FROM t_Strafe ORDER BY Bezeichnung;");
?>
<!-- Content -->
<!-- Tabelle Strafenkatalog -->
<div class="center">
    <h1>Strafenkatalog</h1>
    <table id="strafenkatalog">
        <tr>
            <th class="sortable" onclick="sortTable(0)">Fehlverhalten</th>
            <th>Strafe in €</th>
        </tr>
        <?php foreach ($strafen as $strafe) { ?>
            <tr>
                <td><?php echo $strafe['Bezeichnung'] ?></td>
                <td><?php echo $strafe['Kosten'] ?></td>
            </tr>
        <?php } ?>
    </table>
</div>

<!-- JavaScript Sort -->
<script src="sortStrafen.js"></script>

</body>
</html>