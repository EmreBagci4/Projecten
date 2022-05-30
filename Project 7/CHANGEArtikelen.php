<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>artikelen wijzigen</title>
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

foreach ($toonArtikelen as $row)
{

    $ArtId = $row['ArtId'];
    $ArtOmschrijving = $row['ArtOmschrijving'];
    $ArtInkoop = $row['ArtInkoop'];
    $ArtVerkoop = $row['ArtVerkoop'];
    $ArtVoorraad = $row['ArtVoorraad'];
    $ArtMinVoorraad = $row['ArtMinVoorraad'];
    $ArtLocatie = $row['ArtLocatie'];
    $LevId = $row['LevId'];


    echo "<div class='parent'>
        <h2>Artikelen Bijwerken:</h2>
            <form action=CHANGEArtikelen.php method='POST'>                
                <input type='text' name='ArtOmschrijving' value='" . $ArtOmschrijving . "' placeholder='" . $ArtOmschrijving . "' required>
                <br /><br />
                <input type='number' name='ArtInkoop' value='" . $ArtInkoop . "' placeholder='" . $ArtInkoop . "' required>
                <br /><br />
                <input type='number' name='ArtVerkoop' value='" . $ArtVerkoop . "' placeholder='" . $ArtVerkoop . "' required>
                <br /><br />
                <input type='number' name='ArtVoorraad' value='" . $ArtVoorraad . "' placeholder='" . $ArtVoorraad . "' required>
                <br /><br />
                <input type='number' name='ArtMinVoorraad' value='" . $ArtMinVoorraad . "' placeholder='" . $ArtMinVoorraad . "' required>
                <br /><br />
                <input type='text' name='ArtLocatie' value='" . $ArtLocatie . "' placeholder='" . $ArtLocatie . "' required>
                <br /><br />
                <input type='submit' name='update' value='update'>
                <input type='hidden' name='LevId' value ='" .  $LevId . "'>
                <input type='hidden' name='id' value ='" .  $ArtId . "'>
            </form>

            <form action='index.php'>
                <input type='submit' value='terug'>
            </form>
      </div>";
}
if(isset($_POST['update']))
{
    $Artikelen->Artikelen_bijwerken();

    echo "<script>alert('Artikelen bijgewerkt')
            window.location.replace('INDEXArtikelen.php');
            </script>";

}else{
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
?>
    </body>
</html>