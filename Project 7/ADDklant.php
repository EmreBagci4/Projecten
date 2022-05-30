<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klant toevoegen</title>
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


if (isset($_POST['opslaan'])) {
    include 'connect.php';
    $conn = DbConnect();

    $Naam = $_POST['Naam'];
    $Email = $_POST['Email'];
    $Adres = $_POST['Adres'];
    $Postcode = $_POST['Postcode'];
    $Woonplaats = $_POST['Woonplaats'];

    if($Naam != "" && $Email != "" && $Adres != "" && $Postcode != "" && $Woonplaats != "") {
        try {
            $query = "INSERT INTO `klanten`(`KlantNaam`, `KlantEmail`, `KlantAdres`, `KlantPostcode`, `KlantWoonplaats`) 
                        VALUES (:KlantNaam, :KlantEmail, :KlantAdres, :KlantPostcode, :KlantWoonplaats)";

            if ($stmt = $conn->prepare($query)){
                $gegevens = [
                    ':KlantNaam'=> $Naam,
                    ':KlantEmail'=> $Email,
                    ':KlantAdres'=> $Adres,
                    ':KlantPostcode'=> $Postcode,
                    ':KlantWoonplaats'=> $Woonplaats,
                ];
                if ($stmt->execute($gegevens)){
                    echo "Toegevoegd";
                    ?>
                    <script>
                        window.alert("Klant toegevoegd");
                        window.location = "index.php";
                    </script>
                    <?php
                }else{


                    ?>
                    <script>
                        window.alert("Er is iets fout gegaan bij klant toevoegen! Try again");
                        window.location = "INDEXklant.php";
                    </script>
                    <?php
                }
            }else{
                    ?>
                    <script>
                        window.alert("Er is iets fout gegaan");
                        window.location = "INDEXklant.php";
                    </script>
                    <?php
            }
        } catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }else {
            ?>
            <script>
                window.alert("Veld moet worden ingevuld");
                window.location = "INDEXklant.php";
            </script>
            <?php
    }
}
?>


<div class="parent">
    <h2>Klant Toevoegen:</h2>
    <form action="ADDklant.php" method="post" name="form1">
        <table border="0">
            <tr>
                <td>Naam:</td>
                <td><input type="text" name="Naam"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="Email"></td>
            </tr>
            <tr>
                <td>Adres:</td>
                <td><input type="text" name="Adres"></td>
            </tr>
            <tr>
                <td>Postcode:</td>
                <td><input type="text" name="Postcode"></td>
            </tr>
            <tr>
                <td>Woonplaats:</td>
                <td><input type="text" name="Woonplaats"></td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td><input type="submit" value="Opslaan" name="opslaan"/></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>