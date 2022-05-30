<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verkooporder toevoegen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

    include 'menu.html';
    include 'connect.php';
if (isset($_POST['Opslaan'])) {

    include "Verkooporder.php";
    $conn = DbConnect();

    $klantId = $_POST['klantId'];
    $artId = $_POST['artId'];
    $verkOrdDatum = $_POST['verkOrdDatum'];
    $verOrdBestAantal = $_POST['verOrdBestAantal'];
    $verOrdStatus = $_POST['verOrdStatus'];

    if($klantId != "" && $artId != "" && $verkOrdDatum != "" && $verOrdBestAantal != "" && $verOrdStatus != "") {
        try {
            $query = "INSERT INTO `verkooporders`(`KlantId`, `Artikelen_ArtId`, `verkOrdDatum`, `verkOrdBest`, `verkOrdStatus`) 
                        VALUES (:KlantId, :Artikelen_ArtId, :verkOrdDatum, :verOrdBest, :verOrdStatus)";

            if ($stmt = $conn->prepare($query)){
                $gegevens = [
                    ':KlantId'=> $klantId,
                    ':Artikelen_ArtId'=> $artId,
                    ':verkOrdDatum'=> $verkOrdDatum,
                    ':verOrdBest'=> $verOrdBestAantal,
                    ':verOrdStatus'=> $verOrdStatus,
                ];
                if ($stmt->execute($gegevens)){
                    ?>
                    <script>
                        window.alert("Uw verkooporder is geplaats!");
                        window.location = "index.php";
                    </script>
                    <?php
                }else{
                    ?>
                    <script>
                        window.alert("Fout bij verkooporder plaatsen! Probeer het nog een keer.");
                        window.location = "Verkooporder_toevoegen.php";
                    </script>
                    <?php
                }
            }else{
                    ?>
                    <script>
                        window.alert("Er is een fout opgetreden!");
                        window.location = "Verkooporder_toevoegen.php";
                    </script>
                    <?php
            }
        } catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }else {
        ?>
        <script>
            window.alert("Alle velden zijn verplicht!");
            window.location = "Verkooporder_toevoegen.php";
        </script>
        <?php
    }
}
try {

    $conn = new PDO("mysql:host=localhost;dbname=bas", "root", "");
    $Artikelen = $conn->prepare("SELECT * from artikelen");
    $Artikelen->execute();

    $klanten = $conn->prepare("SELECT * from klanten");
    $klanten->execute();

    $resultaat =  $Artikelen->setFetchMode(PDO::FETCH_ASSOC);
    $resultaat2 = $klanten->setFetchMode(PDO::FETCH_ASSOC);

?>

<div class="parent">

    <h2>Verkooporder Toevoegen:</h2>
    <form action="Verkooporder_toevoegen.php" method="post" name="form1">
        <table border="0">
            <tr>
                <td>Klant Id:</td>
                <td><select name="klantId">
                        <?php
                        while($row = $klanten->fetch()) {
                            $klantId = $row['KlantId'];
                            $klantNaam = $row['KlantNaam'];
                            echo "<option value=".$klantId.">ID:".$klantId." | ".$klantNaam."</option>";
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Artikel Id:</td>
                <td><select name="artId">
                        <?php
                        while($row = $Artikelen->fetch()) {
                            $ArtId = $row['ArtId'];
                            $ArtOmschrijving = $row['ArtOmschrijving'];
                            $ArtVerkoop = $row['ArtVerkoop'];
                            echo "<option value=".$ArtId.">".$ArtOmschrijving." | Prijs: €".$ArtVerkoop."</option>";
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <td>Datum:</td>
                <td><input type="datetime-local" name="verkOrdDatum"></td>
            </tr>
            <tr>
                <td>Aantal Artikelen:</td>
                <td><input type="number" name="verOrdBestAantal"></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><select name="verOrdStatus">
                        <option value="" disabled selected>Choose option</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select></td>
            </tr>
            <tr>
                <td>&nbsp</td>
                <td><input type="submit" value="Opslaan" name="Opslaan"/></td>
            </tr>
        </table>
    </form>
</div>
<?php

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

</body>
</html>