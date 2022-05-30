<?php

class Verkooporder{

    public function haalVerkooporder(){
        $conn = dbConnect();

        $Verkooporder = $conn->prepare("SELECT * from verkooporders");
        $Verkooporder->execute();

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
            echo "<tr>";
            echo "<td>" . $row["KlantId"] . "</td>";
            echo "<td>" . $row["Artikelen_ArtId"] . "</td>";
            echo "<td>" . $row["verkOrdDatum"] . "</td>";
            echo "<td>" . $row["verkOrdBest"] . "</td>";
            $statusrow = $row["verkOrdStatus"];
            if ($statusrow == 1){
                $status = "Genoteerd in deze tabel";
            }elseif ($statusrow == 2){
                $status = "Magazijnmedewerker verzamelt het artikel(picking)";
            }elseif ($statusrow == 3){
                $status = "Tas met artikel is bij de bezorgen";
            }elseif ($statusrow == 4){
                $status = "Tas met artikel is afgeleverd bij de klant";
            }else{
                $status = "Geen status";
            }
            echo "<td>" . $status . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

}

?>