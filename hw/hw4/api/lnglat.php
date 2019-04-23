<?php
    
    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("c9");
    
    // Push the newest set of coordinates to the database.
    $np = array();
    $np[':lng'] = $_GET['lng'];
    $np[':lat'] = $_GET['lat'];
    $sql = "INSERT INTO map (`lng`, `lat`) VALUES (:lng, :lat)";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($np);
    
    // Retreive all of the coordinate values from the database.
    $sql = "SELECT * FROM map";
    $stmt = $conn -> prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    
    // Echo data to be retrieved.
    echo json_encode($records);
    
?>