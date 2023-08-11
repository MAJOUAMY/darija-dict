<?php

require_once "connect.php";

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $word = $_POST["word"];
    $city = $_POST["city"];
    $meaning = $_POST["meaning"];
    
    // Basic validation
    if (empty($word) || empty($city) || empty($meaning)) {
        echo "<div class='alert alert-danger' role='alert'> يرجى إدخال جميع المعلومات </div>";
    } else {
        try {
            // Insert data into the database
            $insert_query = "INSERT INTO article (word, city, meaning) VALUES (:word, :city, :meaning)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bindValue(":word", $word);
            $stmt->bindValue(":city", $city);
            $stmt->bindValue(":meaning", $meaning);
            $stmt->execute();
            echo "<div class='alert alert-success' role='alert'> تم إدخال العبارة بنجاح </div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-danger' role='alert'> حدث خطأ في إدخال البيانات , يرجى إعادة العملية </div>";
        }
    }
}

?>
