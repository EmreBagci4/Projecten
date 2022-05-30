<!doctype html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <title>garage-delete-user3.php</title>   
    </head>
<body>
      <h1>Garage Delete User 3</h1>
      <p>
        Op userid gegevens zoeken uit de <br>
        tabel user van de database garage<br> 
        zodat ze verwijderd kunnen worden.
      </p>
    <?php
        $userid = $_POST["useridvak"];
        $verwijderen = $_POST["verwijdervak"];
    
        if($verwijderen)
        {
           require_once "gar-connect-user.php";
           $sql = $conn->prepare("
            delete from user
            where userid = :userid");
           
           $sql->execute(["userid" => $userid]);
           echo "De gegevens zijn verwijderd. <br />";
    
        }
       else
        {
           echo "De gegevens zijn niet verwijderd. <br />";
        }
           echo "<a href='gar-menu.php'>Terug naar het menu. </a>";
    ?>
</body>
</html>