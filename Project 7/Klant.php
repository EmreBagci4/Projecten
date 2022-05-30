<?php
class Klant{

    public function zetKlant(){

        //Toon klant form
        include "Klant_toevoegen.php";
    }

    public function Klant_Zoeken()
    {
        $conn = dbConnect();
        //include 'Klant_Zoek.php';

        $klantID = $_POST['klantId'];

        $klant = $conn->prepare(" SELECT * FROM klanten WHERE KlantId = '$klantID'");
        $klant->execute();
        return $klant;
    }
    public function toonKlant($ZoekKlant){
        echo "<table border=1 class= table>";
        echo "<tr>";
        echo "<th>Klant ID</th>";
        echo "<th>Naam</th>";
        echo "<th>E-mail</th>";
        echo "<th>Adres</th>";
        echo "<th>Postcode</th>";
        echo "<th>Woonplaats</th>";
        echo "</tr>";
        foreach ($ZoekKlant as $row)
        {
            $klantId = $row['KlantId'];
            $KlantNaam = $row['KlantNaam'];
            $KlantEmail = $row['KlantEmail'];
            $KlantAdres = $row['KlantAdres'];
            $KlantPostcode = $row['KlantPostcode'];
            $KlantWoonplaats = $row['KlantWoonplaats'];

            echo "<tr>";
            echo "<td>" . $klantId . "</td>";
            echo "<td>" . $KlantNaam . "</td>";
            echo "<td>" . $KlantEmail . "</td>";
            echo "<td>" . $KlantAdres . "</td>";
            echo "<td>" . $KlantPostcode . "</td>";
            echo "<td>" . $KlantWoonplaats . "</td>";
            echo "<td><form action='Klant_wijzig.php' method='post'><input type='submit' value='Wijzigen'>
			        <input type='hidden' name='klantId' value=" . $klantId . " ></form>";
            echo "<td> <form action='Klant_verwijderen.php' method='post'><input type='submit' value='Verwijderen'>
			<input type='hidden' name='klantId' value=" . $klantId . " ></form>";
            echo "</tr>";
        }
        echo "</table>";
//
//        $form = "<div class='parent'>
//        <h2>Klant Bijwerken:</h2>
//            <form action=Klant_wijzig.php method='POST'>
//                <input type='text' name='KlantNaam' value='" . $KlantNaam . "' placeholder='" . $KlantNaam . "' required>
//                <br /><br />
//                <input type='email' name='KlantEmail' value='" . $KlantEmail . "' placeholder='" . $KlantEmail . "' required>
//                <br /><br />
//                <input type='email' name='KlantAdres' value='" . $KlantAdres . "' placeholder='" . $KlantAdres . "' required>
//                <br /><br />
//                <input type='email' name='KlantPostcode' value='" . $KlantPostcode . "' placeholder='" . $KlantPostcode . "' required>
//                <br /><br />
//                <input type='email' name='KlantWoonplaats' value='" . $KlantWoonplaats . "' placeholder='" . $KlantWoonplaats . "' required>
//                <br /><br />
//                <input type='submit' name='update' value='update'>
//
//                <input type='hidden' name='id' value ='" .  $klantId . "'>
//            </form>
//
//            <form action='index.php'>
//                <input type='submit' value='terug'>
//            </form>
//      </div>";
//        return $form;

    }

    public function Klant_bijwerken()
    {
        $conn = dbConnect();

        $klantId = $_POST['klantId'];
        $KlantNaam = $_POST['KlantNaam'];
        $KlantEmail = $_POST['KlantEmail'];
        $KlantAdres = $_POST['KlantAdres'];
        $KlantPostcode = $_POST['KlantPostcode'];
        $KlantWoonplaats = $_POST['KlantWoonplaats'];

        $sql = "UPDATE klanten SET KlantId='$klantId', KlantNaam='$KlantNaam', KlantEmail='$KlantEmail', KlantAdres='$KlantAdres', KlantPostcode='$KlantPostcode', KlantWoonplaats='$KlantWoonplaats' WHERE KlantId='$klantId'";
        return $conn->query($sql);
    }


    public function Klant_verwijderen()
    {
        $conn = dbConnect();

        $id = $_POST['klantId'];

        $sql = "DELETE FROM klanten WHERE KlantId='$id'";
        return $conn->exec($sql);
    }

}

?>