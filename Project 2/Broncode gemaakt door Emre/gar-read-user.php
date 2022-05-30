<!doctype html>
<html lang="nl">
    <head>
        <meta name="author" content="Anjo Eijeriks">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8">
        <title>garage-read-user.php</title>  
    </head>
    <body>
        <h1>Garage Read user</h1>
        <p>
            Dit zijn alle gegevens uit de<br>
            tabel user van de database garage.</p>
        
        <?php
            require_once "gar-connect-user.php";
 
            $user = $conn->prepare("
             SELECT userid,
            usernaam,
            adres,
            postcode,
            plaats
            FROM   user");
            $user->execute();
        
 
            echo "<table>";
foreach($user as $user)
{
echo "<tr>";
echo "<td>" . $user["userid"] . "</td>" ;
echo "<td>" . $user["usernaam"] . "</td>";
echo "<td>" . $user["adres"] . "</td>";
echo "<td>" . $user["postcode"] . "</td>";
echo "<td>" . $user["plaats"] . "</td>";
echo "<tr>";
            }
            echo "</table>";
            echo "<a href='gar-menu.php'> Terug naar het menu </a>";
        ?>
    </body>
</html>
