<?php
require_once "connect.php";
$word=$_GET["word"];
try{
    if (isset($word)) {
        $sql="SELECT * FROM article where word=:word";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(":word",$word);
        $stmt->execute();
        $resault=$stmt->fetchAll(PDO::FETCH_ASSOC);

    }
   
}catch(PDOException $e){
    echo "can't get the word";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>definition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" defer
        crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;500;600;700;800;900&family=Roboto:wght@100;300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>
<body>
    <h1 class="text-center mt-4 text">معنى الكلمة أو العبارة</h1>
    <div class="container my-5">
        <?php foreach ($resault as $row):?>
        <div class="p-3  px-lg-5 post rounded mt-4">
            <strong class="h2"><?=$row["word"] ?></strong>
            <p class="h6 text-secondary"><?=$row["city"] ?></p>
            <p class="text-secondary lead"><?=$row["meaning"] ?></p>
        </div>
       <?php endforeach ?>
    </div>
    <a href="" class="text-secondary miloud">developped by AJOUAMY Miloud</a>
</body>
</html>