<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikelen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include "connect.php";
include "Artikelen.php";
include 'menu.html';

$Artikelen = new Artikelen;
$toonArtikelen = $Artikelen->haalArtikelen();

$Artikelen->toonArtikelen($toonArtikelen);

?>
</body>
</html>