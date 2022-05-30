<!doctype html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta chatset="UTF-8">
        <title>garage-delete-user2.php</title>  
    </head>
    <body>
        <h1>Garage Delete User 2</h1>
        <p>
           Op userid gegevens zoeken uit de
           tabel user van de database garage
           zodat ze verwijderd kunnen worden.
        </p>
        <?php
            $klantid = $_POST["useridvak"];
            require_once "gar-connect-klant.php";

            $user = $conn->prepare(' SELECT userid
                                        From auto
                                        where userid = :userid
                                      ');
            $user->execute(["userid" => $userid]);
            $waarde = $user->fetch();
         if($waarde){
                    echo "<form action='gar-delete-user2.php' method='post'>";
                    echo "Welk userid wilt u verwijderen?";
                    echo "<input type='text' name='useridvak'>"."<br/>";
                    echo "<input type='submit'>";
                    echo "</form>"."<br/>"; 
                    echo "<script type='text/javascript'>alert('Foutmelding...');</script>";
                    echo "Deze user kan niet verwijderd worden."."</br>";
                    echo "<a href='gar-menu.php'>Terug naar menu</a>";
                    }
        else{
             $klanten = $conn->prepare("SELECT userid,
                                               usernaam,
                                               adres,
                                               postcode,
                                               plaats
                                        From   user
                                        where  userid = :userid");
            $user->execute(["userid" => $userid]);
            echo "<tabel>";
            foreach($user as $user)
                {
                    echo "<tr>";
                    echo "<td>" . $user["userid"] . "</td>";
                    echo "<td>" . $user["usernaam"] . "</td>";
                    echo "<td>" . $user["useradres"] . "</td>";
                    echo "<td>" . $user["userpostcode"] . "</td>";
                    echo "<td>" . $user["userplaats"] . "</td>";
                    echo "<tr>";
                }
            echo "</tabel><br />";
 
            echo "<form action='gar-delete-user3.php' method='post'>";
 
                echo "<input type='hidden' name='useridvak' value=$userid>";
                echo "<input type='hidden'name='verwijdervak' value='0'>";
                echo "<input type='checkbox' name='verwijdervak' value='1'>";
                echo "Verwijder deze klant. <br />";
                echo "<input type='submit'>";
            echo "</form>";
        }
        ?>
    </body>
</html>