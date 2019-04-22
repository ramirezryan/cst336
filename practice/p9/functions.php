<?php

    include '../../inc/dbConnection.php';
    $conn = getDatabaseConnection("friends_list");
    
    $arr = array();
    $arr[":option"] = $_GET["optionVal"];
    
    // $sql = "UPDATE poll_response SET :option = 1";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute($arr);

    $sql = "SELECT * FROM poll_response WHERE pollId = 'q1'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);

?>