<?php
function DbConnect(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $myDB = "bas";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>
