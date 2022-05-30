<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>artikelen verwijderen</title>
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

include "Artikelen.php";
include "connect.php";


$Artikelen = new Artikelen;
$toonArtikelen = $Artikelen->haalArtikelen();


echo "<div class='parent'>
    <h1>Artikelen verwijderen</h1>
    <form action='index.php'>
        <input type='submit' value='terug'>
    </form>
    <form action='DELETEArtikelen.php' method='post'>
        <input type='submit' name='verwijder' value='verwijder'>
        <input type='hidden' name='id' value='" . $_POST['id'] . "'>
    </form>
    </div>
";
if(isset($_POST['verwijder']))
{
    $Artikelen->Artikelen_verwijderen($toonArtikelen);
    echo "<script>alert('Artikelen verwijderd')
        window.location.replace('INDEXArtikelen.php');
        </script>";
}
?>
    </body>
</html>