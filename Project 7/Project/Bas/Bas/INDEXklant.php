<?php
include "connect.php";
include "Klant.php";
$conn = DbConnect();

$klant = new Klant($conn);

$klant->zetKlant();
?>


