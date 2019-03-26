<?php

    include 'dbConn.php';
    $conn = getDatabaseConnection("friends_list");
    
    $namedParameters = array();
    $sql = "SELECT * FROM messages WHERE 0"; //Retrieves ALL records

    if (!empty($_GET['sender'])) { 
        $sql =  "SELECT * FROM messages WHERE 1 AND online_id = :onlineId";
        $namedParameters[":onlineId"] = $_GET['sender'];
    }
    
    $stmt = $conn -> prepare($sql);  //$connection MUST be previously initialized
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
    
    //print_r($records); //debugging    
    
    echo json_encode($records);

?>