<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inkooporder zien</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="topnav">
			<a href="index.php">Home</a>
			<a href="ADDklant.php">voeg klant toe</a>
            <a href="INDEXklant.php">zie klant</a>
    
			<a href="ADDverkooporder.php">voeg verkooporder toe</a>
			<a href="INDEXverkooporder.php">zie verkooporders</a>
			<a href="ADDinkooporder.php">voeg inkooporder</a>
			<a href="INDEXinkooporder.php">zie inkooporder</a>
			<a href="INDEXleveranciers.php">zie leverancier</a>
    
		</div>
<?php
include "connect.php";
include "Inkooporder.php";

$Inkooporder = new Inkooporder;
$toonInkooporder = $Inkooporder->haalInkooporder();

$Inkooporder->toonInkooporder($toonInkooporder);

?>
</body>
</html>