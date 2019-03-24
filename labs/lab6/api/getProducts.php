<?php

$host = "us-cdbr-iron-east-03.cleardb.net";
$dbname = "heroku_2a82e3ada2013ec";
$username = "b04c3ea880440e";
$password = "77573882";

// Establishing a connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Setting Errorhandling to Exception
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "SELECT * FROM om_product ORDER BY productPrice LIMIT 10";
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

// print_r($records);
echo json_encode($records);

?>