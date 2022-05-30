<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>klant verwijderen</title>
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

include "Klant.php";
include "connect.php";

$klant = new Klant;
$ZoekKlant = $klant->Klant_Zoeken();

echo "<div class='parent'>
    <h1>Klant verwijderen</h1>
    <form action='index.php'>
        <input type='submit' value='terug'>
    </form>
    <form action='DELETEklant.php' method='post'>
        <input type='submit' name='verwijder' value='verwijder'>
        <input type='hidden' name='klantId' value='" . $_POST['klantId'] . "'>
    </form>
    </div>
";

if(isset($_POST['verwijder']))
{
    $klant->Klant_verwijderen($ZoekKlant);
    echo "<script>alert('Klant verwijderd')
        window.location.replace('INDEXklant.php');
        </script>";
}
?>
    </body>
</html>
