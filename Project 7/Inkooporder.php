<?php


class Inkooporder
{
    public function haalInkooporder(){
        $conn = dbConnect();

        $Inkooporder = $conn->prepare("SELECT * from inkooporders");
        $Inkooporder->execute();

        return $Inkooporder;
    }

    public function toonInkooporder($toonInkooporder){
        echo "<table border=1 class= table>";
        echo "<tr>";
        echo "<th>Inkooporder ID</th>";
        echo "<th>Artikel ID</th>";
        echo "<th>Leverancier ID</th>";
        echo "<th>Inkoop Datum</th>";
        echo "<th>Inkoop Aantal</th>";
        echo "<th>Status</th>";

        echo "</tr>";
        foreach ($toonInkooporder as $row)
        {
            echo "<tr>";
            echo "<td>" . $row["InkOrdId"] . "</td>";
            echo "<td>" . $row["ArtId"] . "</td>";
            echo "<td>" . $row["LevId"] . "</td>";
            echo "<td>" . $row["InkOrdDatum"] . "</td>";
            echo "<td>" . $row["InkOrdBestAantal"] . "</td>";
            echo "<td>" . $row["InkOrdStatus"] . "</td>";
            echo "<td> <form action='Inkooporder_verwijderen.php' method='post'><input type='submit' value='Verwijderen'>
			<input type='hidden' name='id' value=" . $row["InkOrdId"] . " ></form>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function Inkooporder_verwijderen()
    {
        $conn = dbConnect();

        $id = $_POST['id'];

        $sql = "DELETE FROM inkooporders WHERE InkOrdId='$id'";
        return $conn->exec($sql);
    }

}