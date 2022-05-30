<?php

class Verkooporder{

    public function haalVerkooporder(){
        $conn = dbConnect();

        $Verkid = $_POST['id'];

        if ($Verkid == ''){
            $Verkooporder = $conn->prepare("SELECT * from verkooporders");
            $Verkooporder->execute();
        }else{
            $Verkooporder = $conn->prepare("SELECT * from verkooporders WHERE VerkoopOrdId = '$Verkid'");
            $Verkooporder->execute();
        }

        return $Verkooporder;
    }

    public function toonVerkooporder($toonOrders){
        echo "<table border=1 class= table>";
        echo "<tr>";
        echo "<th>Klant ID</th>";
        echo "<th>Artikel ID</th>";
        echo "<th>Verkoop Order Datum</th>";
        echo "<th>Aantal Artikelen</th>";
        echo "<th>Status</th>";
        echo "</tr>";
        foreach ($toonOrders as $row)
        {

            $VerkoopOrdId = $row['VerkoopOrdId'];
            $klantId = $row['KlantId'];
            $artId = $row['Artikelen_ArtId'];
            $verkOrdDatum = $row['verkOrdDatum'];
            $verOrdBestAantal = $row['verkOrdBest'];
            $verOrdStatus = $row['verkOrdStatus'];

            echo "<tr>";
            echo "<td>" . $klantId . "</td>";
            echo "<td>" . $artId . "</td>";
            echo "<td>" . $verkOrdDatum . "</td>";
            echo "<td>" . $verOrdBestAantal . "</td>";
            $statusrow = $verOrdStatus;
            if ($statusrow == 1){
                $status = "Genoteerd in deze tabel";
            }elseif ($statusrow == 2){
                $status = "De artikel woordt verzameld(picking)";
            }elseif ($statusrow == 3){
                $status = "Arikelen zijn bij bezorger";
            }elseif ($statusrow == 4){
                $status = "Artikel bezorgd";
            }else{
                $status = "Geen status";
            }
            echo "<td>" . $status . "</td>";
            echo "<td>
                    <form action='CHANGEverkooporder.php' method='post'><input type='submit' value='Wijzigen'>
			        <input type='hidden' name='id' value=" . $VerkoopOrdId . " ></form>";
            echo "<td> <form action='DELETEverkooporder.php' method='post'><input type='submit' value='Verwijderen'>
			<input type='hidden' name='id' value=" . $VerkoopOrdId . " ></form>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function CHANGEverkooporder()
    {
        $conn = dbConnect();

        $VerkoopOrdId = $_POST['id'];
        $klantId = $_POST['klantId'];
        $artId = $_POST['artId'];
        $verkOrdDatum = $_POST['verkOrdDatum'];
        $verOrdBestAantal = $_POST['verOrdBestAantal'];
        $verOrdStatus = $_POST['verOrdStatus'];

        $sql = "UPDATE verkooporders SET VerkoopOrdId='$VerkoopOrdId', KlantId='$klantId', Artikelen_ArtId='$artId', verkOrdDatum='$verkOrdDatum', verkOrdBest='$verOrdBestAantal', verkOrdStatus='$verOrdStatus' WHERE VerkoopOrdId='$VerkoopOrdId'";
        return $conn->query($sql);
    }


    public function DELETEverkooporder()
    {
        $conn = dbConnect();

        $id = $_POST['id'];

        $sql = "DELETE FROM verkooporders WHERE VerkoopOrdId='$id'";
        return $conn->exec($sql);
    }

}

?>