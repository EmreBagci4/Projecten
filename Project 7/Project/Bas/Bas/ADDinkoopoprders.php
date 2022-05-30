<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inkooporder toevoegen</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

include 'menu.html';
include 'connect.php';
if (isset($_POST['Opslaan'])) {

    $conn = DbConnect();

    $ArtId = $_POST['ArtId'];
    $LevId = $_POST['LevId'];
    $InkOrdBestAantal = $_POST['InkOrdBestAantal'];
    $InkOrdStatus = $_POST['InkOrdStatus'];

    if($ArtId != "" && $LevId != "" && $InkOrdBestAantal != "" && $InkOrdStatus != "") {
    try {
        $query = "INSERT INTO inkooporders (ArtId, LevId, InkOrdBestAantal, InkOrdStatus) 
                VALUES (:ArtId, :LevId, :InkOrdBestAantal, :InkOrdStatus)";

    if ($stmt = $conn->prepare($query)){
        $gegevens = [
            ':ArtId'=> $ArtId,
            ':LevId'=> $LevId,
            ':InkOrdBestAantal'=> $InkOrdBestAantal,
            ':InkOrdStatus'=> $InkOrdStatus,
        ];
    if ($stmt->execute($gegevens)){
        ?>
        <script>
            window.alert("Uw inkooporder added");
            window.location = "index.php";
        </script>
    <?php
    }else{
    ?>
        <script>
            window.alert("Fout bij inkooporder toeveogen");
            window.location = "ADDinkooporders.php";
        </script>
    <?php
    }
    }else{
    ?>
        <script>
            window.alert("Er is een fout opgetreden!");
            window.location = "ADDinkooporders.php";
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
            window.location = "ADDinkooporders.php";
        </script>
        <?php
    }
}
try {

    $conn = new PDO("mysql:host=localhost;dbname=bas", "root", "");
    $Artikelen = $conn->prepare("SELECT * from artikelen");
    $Artikelen->execute();

    $leveranciers = $conn->prepare("SELECT * from leveranciers");
    $leveranciers->execute();

    $resultaat =  $Artikelen->setFetchMode(PDO::FETCH_ASSOC);
    $resultaat2 = $leveranciers->setFetchMode(PDO::FETCH_ASSOC);


    ?>

    <div class="parent">

        <h2>Inkooporder Toevoegen:</h2>
        <form action="ADDinkooporders.php" method="post" name="form1">
            <table border="0">
                <tr>                                                                                

                 
                    <td>Artikel Id:</td>
                    <td><select name="ArtId">
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
                    <td>Leverancier Id:</td>
                    <td><select name="LevId">
                            <?php
                            while($row = $leveranciers->fetch()) {
                                $LevId = $row['LevId'];
                                $LevNaam = $row['LevNaam'];
                                echo "<option value=".$LevId.">ID:".$LevId." | ".$LevNaam."</option>";
                            }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td>Datum en tijd:</td>
                    <td><input type="text" value="<?php echo date("Y-m-d,h:m:s"); ?>" disabled></td>
                </tr>
                <tr>
                    <td>Aantal Artikelen:</td>
                    <td><input type="number" name="InkOrdBestAantal"></td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td><select name="InkOrdStatus">
                            <option value="0" disabled selected>Choose option</option>
                            <option value="1">Artikel ingeleverd</option>
                            <option value="0">Artikel niet ingeleverd</option>
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