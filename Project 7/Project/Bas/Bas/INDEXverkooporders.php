<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verkooporder toevoegen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include "connect.php";
include "Verkooporder.php";
include 'menu.html';

$Verkooporder = new Verkooporder;
$toonOrders = $Verkooporder->haalVerkooporder();

$Verkooporder->toonVerkooporder($toonOrders);

?>
</body>
</html>

