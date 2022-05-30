<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>verkooporder verwijderen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <a href="INDEXArtikelen.php">zie artikelen</a>

		</div>
<?php

include "Verkooporder.php";
include "connect.php";

$Verkooporder = new Verkooporder;
$toonOrders = $Verkooporder->haalVerkooporder();


echo "<div class='parent'>
    <h1>Verkooporder verwijderen</h1>
    <form action='index.php'>
        <input type='submit' value='terug'>
    </form>
    <form action='DELETEverkooporder.php' method='post'>
        <input type='submit' name='verwijder' value='verwijder'>
        <input type='hidden' name='id' value='" . $_POST['id'] . "'>
    </form>
    </div>
";
if(isset($_POST['verwijder']))
{
    $Verkooporder->Verkooporder_verwijderen($toonOrders);
    echo "<script>alert('Verkooporder verwijderd')
        window.location.replace('INDEXverkooporder.php');
        </script>";
}
?>
    </body>
</html>
