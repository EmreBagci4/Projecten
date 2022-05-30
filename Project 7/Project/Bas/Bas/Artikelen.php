<?php

class Artikelen{

    public function haalArtikelen(){
        $conn = dbConnect();

        $Artikelen = $conn->prepare("SELECT * from artikelen");
        $Artikelen->execute();

        return $Artikelen;
    }

    public function toonArtikelen($toonArtikelen){
        echo "<table border=1 id= table>";
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
            echo "</tr>";
        }
        echo "</table>";
    }

}
?>