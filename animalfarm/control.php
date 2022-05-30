<?PHP

	include "cat.php";
	//include "connect.php";
	require_once "connect.php";

	$missy = new Cat("Missy", 2011, 9,);
	$lucky = new Cat("Lucky", 2020, 4);
	$bob = new Cat("bob", 2012, 7);

	$spike = new Wolf("spike", 2017);
	$marley = new Wolf("marley", 2015);
	$woef = new Wolf("woef", 2000);

    $gop = new Fish ("gop", 2009);
    $blob = new Fish ("blob", 2015);
    $dipo = new Fish ("dipo", 2019);
    

	print $missy;
	echo "</br>";
	echo $lucky;
	echo "</br>";
    echo $bob;
	echo "</br>";

    echo $spike;
	echo "</br>";
    echo $marley;
	echo "</br>";
    echo $woef;
	echo "</br>";

    echo $gop;
	echo "</br>";
	echo $blob;
	echo "</br>";
    echo $dipo;
	echo "</br>";




	echo ($missy->getName() . " is geboren in " . $missy->getYearOfBirth() . ".</br>");
    echo ($lucky->getName() . " is geboren in " . $lucky->getYearOfBirth() . ".</br>");
    echo ($bob->getName() . " is geboren in " . $bob->getYearOfBirth() . ".</br>");

    echo ($spike->getName() . " is geboren in " . $spike->getYearOfBirth() . ".</br>");
    echo ($marley->getName() . " is geboren in " . $marley->getYearOfBirth() . ".</br>");
    echo ($woef->getName() . " is geboren in " . $woef->getYearOfBirth() . ".</br>");

    echo ($gop->getName() . " is geboren in " . $gop->getYearOfBirth() . ".</br>");
    echo ($blob->getName() . " is geboren in " . $blob->getYearOfBirth() . ".</br>");
    echo ($dipo->getName() . " is geboren in " . $dipo->getYearOfBirth() . ".</br>");
	
	echo ($missy->getName() . " heeft de volgende aantal snorharen " . $missy->getAantalSnorharen() . ".</br>");
    echo ($lucky->getName() . " heeft de volgende aantal snorharen " . $lucky->getAantalSnorharen() . ".</br>");
    echo ($bob->getName() . " heeft de volgende aantal snorharen " . $bob->getAantalSnorharen() . ".</br>");

    echo ($missy->getName() . " heeft de volgende aantal tanden " . $missy->getAantalTanden() . ".</br>");
    echo ($lucky->getName() . " heeft de volgende aantal tanden " . $lucky->getAantalTanden() . ".</br>");
    echo ($bob->getName() . " heeft de volgende aantal tanden " . $bob->getAantalTanden() . ".</br>");

    echo ($missy->getName() . " heeft de vachtkleur " . $missy->getVachtkleur() . ".</br>");
    echo ($lucky->getName() . " heeft de vachtkleur " . $lucky->getVachtkleur() . ".</br>");
    echo ($bob->getName() . " heeft de vachtkleur " . $bob->getAantalTanden() . ".</br>");
	
	
	$data = [
    'name' => $missy->getName(),
    'yearofbirth' => $missy->getYearOfBirth(),
    'type' => "cat"
	];

    $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}
    $data = [
    'name' => $lucky->getName(),
    'yearofbirth' => $lucky->getYearOfBirth(),
    'type' => "cat"
	];

     $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}
    $data = [
    'name' => $bob->getName(),
    'yearofbirth' => $bob->getYearOfBirth(),
    'type' => "cat"
	];
$sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}





	   $data = [
    'name' => $missy->getName(),    
    'aantalsnorharen' => $spike->getaAntalSnorharen(),
    'aantaltanden' => $spike->getAantalTanden(),
    'vachtkleur' => $spike->getVachtkleur(),	];
$sql = "INSERT INTO Cat (aantalsnorharen, aantaltanden, vachtkleur) VALUES (:snorharen, :tanden, :vachtkleur)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM Cat");
	while ($row = $stmt->fetch()) 
        
     $data = [
    'name' => $lucky->getName(),    
    'aantalsnorharen' => $spike->getaAntalSnorharen(),
    'aantaltanden' => $spike->getAantalTanden(),
    'vachtkleur' => $spike->getVachtkleur(),	];
$sql = "INSERT INTO Cat (aantalsnorharen, aantaltanden, vachtkleur) VALUES (:snorharen, :tanden, :vachtkleur)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM Cat");
	while ($row = $stmt->fetch()) 
               
     $data = [
    'name' => $bob->getName(),        
    'aantalsnorharen' => $spike->getaAntalSnorharen(),
    'aantaltanden' => $spike->getAantalTanden(),
    'vachtkleur' => $spike->getVachtkleur(),	];
$sql = "INSERT INTO Cat (aantalsnorharen, aantaltanden, vachtkleur) VALUES (:snorharen, :tanden, :vachtkleur)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM Cat");
	while ($row = $stmt->fetch()) 








  $data = [
    'name' => $spike->getName(),
    'yearofbirth' => $$spikegop->getYearOfBirth(),
    'type' => "Wolf"
	];

    $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}

$data = [
    'name' => $marley->getName(),
    'yearofbirth' => $marley->getYearOfBirth(),
    'type' => "Wolf"
	];

    $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}

$data = [
    'name' => $woef->getName(),
    'yearofbirth' => $woef->getYearOfBirth(),
    'type' => "Wolf"
	];

    $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}

	



$data = [
    'name' => $gop->getName(),
    'yearofbirth' => $gop->getYearOfBirth(),
    'type' => "Fish"
	];

    $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}

$data = [
    'name' => $blob->getName(),
    'yearofbirth' => $blob->getYearOfBirth(),
    'type' => "Fish"
	];

    $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}

$data = [
    'name' => $dipo->getName(),
    'yearofbirth' => $dipo->getYearOfBirth(),
    'type' => "Fish"
	];

    $sql = "INSERT INTO animals (name, year_of_birth, type) VALUES (:name, :yearofbirth, :type)";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);

	$stmt = $conn->query("SELECT * FROM animals");
	while ($row = $stmt->fetch()) {
		echo $row['name'] . " is een " .  $row['type'] . " en is geboren in " . $row['year_of_birth'] . ".</br>";}



?>