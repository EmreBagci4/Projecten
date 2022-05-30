<!DOCTYPE html>
<html lang="nl">
<head>
	<meta name="author" content="Anjo Eijeriks">
    <link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>garage-create-user2.php</title>
</head>
<body>
	<h1>Garage Create User 2</h1>
	<p>
		Een gebruiker toevoegen aan de tabel
    user in de database.
	</p>
    <?php
    $userid      = NULL; 
    $usernaam    = $_POST["usernaamvak"];
    $adres   = $_POST["adresvak"];
    $postcode= $_POST["postcodevak"];
    $plaats  = $_POST["plaatsvak"];

    require_once "gar-connect-user.php";

    $sql = $conn->prepare(
    "insert into user values(
    :userid, :usernaam, :adres,
    :postcode, :plaats
                              )");

    $sql->execute ([ 
"userid"         => $userid,
"usernaam"       => $usernaam,
"adres"      => $adres,
"postcode"   => $postcode,
"plaats"     => $plaats,
                  ]);   

    echo "De user is toegevoegd. </br>";
    echo "<a href='gar-menu.php'> Terug naar menu </a>";
    ?>
</body>
</html>