<?php

    // receives the paramters: action, url, keyword
    // 1. add favorites
    // 2. delete favorites
    // 3. display keyword list from db

    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("c9");
    
    $arr = array();
    
    $action = $_GET["action"];
    
    echo $arr[":url"];

    switch ($action) {
        
        case "add":
            
            $arr[":url"] = $_GET["url"];
            $arr[":keyword"] = $_GET["keyword"];
            
            $sql = "INSERT INTO lab8_pixabay (`imageURL`, `keyword`) VALUES (:url, :keyword)";
                    
            $stmt = $conn->prepare($sql);
            $stmt->execute($arr);
            
            break;
        
        
        case "delete":
            
            $arr[":url"] = $_GET["url"];
            
            $sql = "DELETE FROM lab8_pixabay WHERE `imageURL` = :url";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($arr);
            
            break;
            
        default:
            echo "hi";
        
    }

?>