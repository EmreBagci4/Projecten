<?php

class Artikelen{

    public function haalArtikelen(){
        $conn = dbConnect();

        $Artid = $_POST['id'];

        if ($Artid == ''){
            $Artikelen = $conn->prepare("SELECT * from artikelen");
            $Artikelen->execute();
        }else{
            $Artikelen = $conn->prepare("SELECT * from artikelen WHERE ArtId = '$Artid'");
            $Artikelen->execute();
        }
        return $Artikelen;
    }

    public function toonArtikelen($toonArtikelen){
        echo "<table border=1 class= table>";
        echo "<tr>";
        echo "<th>Artikel ID</th>";
        echo "<th>Artikel Omschrijving</th>";
        echo "<th>Artikel Inkoop</th>";
        echo "<th>Artikel Verkoop</th>";
        echo "<th>Artikel Voorraad</th>";
        echo "<th>Artikel MinVoorraad</th>";
        echo "<th>Artikel Locatie</th>";
        echo "<th>Leveranciers ID</th>";

        echo "</tr>";
        foreach ($toonArtikelen as $row)
        {
            echo "<tr>";
            echo "<td>" . $row["ArtId"] . "</td>";
            echo "<td>" . $row["ArtOmschrijving"] . "</td>";
            echo "<td>" . $row["ArtInkoop"] . "</td>";
            echo "<td>" . $row["ArtVerkoop"] . "</td>";
            echo "<td>" . $row["ArtVoorraad"] . "</td>";
            echo "<td>" . $row["ArtMinVoorraad"] . "</td>";
            echo "<td>" . $row["ArtLocatie"] . "</td>";
            echo "<td>" . $row["LevId"] . "</td>";
            echo "<td><form action='CHANGEArtikelen.php' method='post'><input type='submit' value='Wijzigen'>
			        <input type='hidden' name='id' value=" . $row["ArtId"] . " ></form>";
            echo "<td> <form action='DELETEArtikelen.php' method='post'><input type='submit' value='Verwijderen'>
			<input type='hidden' name='id' value=" . $row["ArtId"] . " ></form>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function CHANGEArtikelen()
    {
        $conn = dbConnect();

        $ArtId = $_POST['id'];
        $ArtOmschrijving = $_POST['ArtOmschrijving'];
        $ArtInkoop = $_POST['ArtInkoop'];
        $ArtVerkoop = $_POST['ArtVerkoop'];
        $ArtVoorraad = $_POST['ArtVoorraad'];
        $ArtMinVoorraad = $_POST['ArtMinVoorraad'];
        $ArtLocatie = $_POST['ArtLocatie'];
        $LevId = $_POST['LevId'];

        $sql = "UPDATE artikelen SET ArtId='$ArtId', ArtOmschrijving='$ArtOmschrijving', ArtInkoop='$ArtInkoop', ArtVerkoop='$ArtVerkoop', ArtVoorraad='$ArtVoorraad', ArtMinVoorraad='$ArtMinVoorraad', ArtLocatie='$ArtLocatie', LevId='$LevId' WHERE ArtId='$ArtId'";
        return $conn->query($sql);
    }

    public function DELETEArtikelen()
    {
        $conn = dbConnect();

        $id = $_POST['id'];

        $sql = "DELETE FROM artikelen WHERE ArtId='$id'";
        return $conn->exec($sql);
    }

}
?>