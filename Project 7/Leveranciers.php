<?php


class Leveranciers
{
    public function haalLeveranciers(){
        $conn = dbConnect();

        $Leveranciers = $conn->prepare("SELECT * from leveranciers");
        $Leveranciers->execute();

        return $Leveranciers;
    }

    public function toonLeveranciers($toonLeveranciers){
        echo "<table border=1 class= table>";
        echo "<tr>";
        echo "<th>Leveranciers ID</th>";
        echo "<th>Leveranciers Naam</th>";
        echo "<th>Leveranciers Email</th>";
        echo "<th>Leveranciers Adres</th>";
        echo "<th>Leveranciers Postcode</th>";
        echo "<th>Leveranciers Woonplaats</th>";

        echo "</tr>";
        foreach ($toonLeveranciers as $row)
        {
            echo "<tr>";
            echo "<td>" . $row["LevId"] . "</td>";
            echo "<td>" . $row["LevNaam"] . "</td>";
            echo "<td>" . $row["LevEmail"] . "</td>";
            echo "<td>" . $row["LevAdres"] . "</td>";
            echo "<td>" . $row["LevPostcode"] . "</td>";
            echo "<td>" . $row["LevWoonplaats"] . "</td>";
            echo "<td> <form action='Leveranciers_verwijderen.php' method='post'><input type='submit' value='Verwijderen'>
			<input type='hidden' name='id' value=" . $row["LevId"] . " ></form>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function Leveranciers_verwijderen()
    {
        $conn = dbConnect();

        $id = $_POST['id'];

        $sql = "DELETE FROM leveranciers WHERE LevId='$id'";
        return $conn->exec($sql);
    }
}