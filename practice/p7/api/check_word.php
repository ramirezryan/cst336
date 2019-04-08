<?php
    //Used to check the letter the user inputed in the form, and if the letter is in the word
    //Should return an array of booleans as the api
    include '../../../../dbConnection.php';
    $conn = getDatabaseConnection("hangman");

    $letter = $_GET['letter'];
    $wordId = $_GET['wordId'];
    
    $sql = "SELECT word, length(word) length FROM words WHERE word_id = $wordId";
    $stmt = $conn -> prepare($sql);  
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $returnData = array();
    $word = $record['word'];
    $i = 0;
    
    while ($i < $record['length']) {
        if ($word[$i] == $letter) {
            $returnData['idx'.$i] = $letter;
        }
        $i = $i + 1;
    }
    
    echo json_encode($returnData);
    
?>