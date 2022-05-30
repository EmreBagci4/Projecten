<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klant Zoeken</title>
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
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['Zoeken']))
{

    $klant = new Klant;
    $ZoekKlant = $klant->SEARCHklant();

    $klant->toonKlant($ZoekKlant);

}else{
    $conn = new PDO("mysql:host=localhost;dbname=bas", "root", "");
    $klanten = $conn->prepare("SELECT * from klanten");
    $klanten->execute();

    ?>

    <div class="parent">

        <h2>Klant Opzoeken:</h2>
        <form action="SEARCHklant.php" method="post" name="form1">
            <table border="0">
                <tr>
                    <td>Klant ID:</td>
                    <td><select name="klantId">
                            <?php
                            while($row = $klanten->fetch()) {
                                $KlantID = $row['KlantId'];
                                $KlantNaam = $row['KlantNaam'];
                                echo "<option value=".$KlantID.">ID:".$KlantID." | ".$KlantNaam."</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <td>&nbsp</td>
                <td><input type="submit" value="Zoeken" name="Zoeken"/></td>
                </tr>
            </table>
        </form><
    </div>
    <?php

}


?>

</body>
</html>