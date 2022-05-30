<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inkooporder verwijderen</title>
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

include "Inkooporder.php";
include "connect.php";


$Inkooporder = new Inkooporder;
$toonInkooporder = $Inkooporder->haalInkooporder();


echo "<div class='parent'>
    <h1>Inkooporder verwijderen</h1>
    <form action='index.php'>
        <input type='submit' value='terug'>
    </form>
    <form action='DELETEinkooporder.php' method='post'>
        <input type='submit' name='verwijder' value='verwijder'>
        <input type='hidden' name='id' value='" . $_POST['id'] . "'>
    </form>
    </div>
";
if(isset($_POST['verwijder']))
{
    $Inkooporder->Inkooporder_verwijderen($toonInkooporder);
    echo "<script>alert('Inkooporder verwijderd')
        window.location.replace('INDEXinkooporder.php');
        </script>";
}
?>
    </body>
</html>