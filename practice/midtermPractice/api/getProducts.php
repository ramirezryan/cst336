<?php
    include 'dbConn.php';
    $conn = getDatabaseConnection("midterm");
    $sql = "SELECT * FROM mp_product WHERE 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($records);
?>