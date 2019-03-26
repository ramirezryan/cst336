<?php
    include 'dbConn.php';
    $conn = getDatabaseConnection("friends_list");
    $sql = "SELECT * FROM friends WHERE 1 ORDER BY display_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>