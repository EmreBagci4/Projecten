<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>verkooporder wijzigen</title>
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

foreach ($toonOrders as $row) {

    $VerkoopOrdId = $row['VerkoopOrdId'];
    $klantId = $row['KlantId'];
    $artId = $row['Artikelen_ArtId'];
    $verkOrdDatum = $row['verkOrdDatum'];
    $verOrdBestAantal = $row['verkOrdBest'];
    $verOrdStatus = $row['verkOrdStatus'];


    echo "<div class='parent'>
        <h2>Verkooporder Bijwerken:</h2>
            <form action=CHANGEverkooporder.php method='POST'>
                <input type='text' name='klantId' value='" . $klantId . "' placeholder='" . $klantId . "' required>
                <br /><br />
                <input type='text' name='artId' value='" . $artId . "' placeholder='" . $artId . "' required>
                <br /><br />
                <input type='text' name='verkOrdDatum' value='" . $verkOrdDatum . "' placeholder='" . $verkOrdDatum . "' required>
                <br /><br />
                <select name='verOrdStatus'>
                        <option value='" . $verOrdStatus . "' selected>" . $verOrdStatus . "</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                    </select>
                <input type='number' name='verOrdBestAantal' value='" . $verOrdBestAantal . "' placeholder='" . $verOrdBestAantal . "' required>
                <br /><br />
                <input type='submit' name='update' value='update'>

                <input type='hidden' name='id' value ='" .  $VerkoopOrdId . "'>
            </form>

            <form action='index.php'>
                <input type='submit' value='terug'>
            </form>
      </div>";
}


if(isset($_POST['update']))
{
    $Verkooporder->CHANGEverkooporder();

        echo "<script>alert('Verkooporder bijgewerkt')
            window.location.replace('INDEXverkooporders.php');
            </script>";

}
?>
    </body>
</html>