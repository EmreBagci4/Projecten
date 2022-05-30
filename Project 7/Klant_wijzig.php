<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>klant wijzigen</title>
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
//Toon Verkooporders
$ZoekKlant = $klant->Klant_Zoeken();
//
//echo $klant->toonKlant($ZoekKlant);
//

foreach ($ZoekKlant as $row)
{

$KlantID =  $row['KlantId'];
$KlantNaam = $row['KlantNaam'];
$KlantEmail = $row['KlantEmail'];
$KlantAdres = $row['KlantAdres'];
$KlantPostcode = $row['KlantPostcode'];
$KlantWoonplaats = $row['KlantWoonplaats'];


echo "<div class='parent'>
        <h2>Klant Bijwerken:</h2>
            <form action=Klant_wijzig.php method='POST'>                
                <input type='text' name='KlantNaam' value='" . $KlantNaam . "' placeholder='" . $KlantNaam . "' required>
                <br /><br />
                <input type='email' name='KlantEmail' value='" . $KlantEmail . "' placeholder='" . $KlantEmail . "' required>
                <br /><br />
                <input type='text' name='KlantAdres' value='" . $KlantAdres . "' placeholder='" . $KlantAdres . "' required>
                <br /><br />
                <input type='text' name='KlantPostcode' value='" . $KlantPostcode . "' placeholder='" . $KlantPostcode . "' required>
                <br /><br />
                <input type='text' name='KlantWoonplaats' value='" . $KlantWoonplaats . "' placeholder='" . $KlantWoonplaats . "' required>
                <br /><br />
                <input type='submit' name='update' value='update'>

                <input type='hidden' name='klantId' value ='" .  $KlantID . "'>
            </form>

            <form action='index.php'>
                <input type='submit' value='terug'>
            </form>
      </div>";
}
if(isset($_POST['update']))
{
    $klant->Klant_bijwerken();

    echo "<script>alert('Klant bijgewerkt')
            window.location.replace('Klant_index.php');
            </script>";

}
?>
    </body>
</html>