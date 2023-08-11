<?php
require_once "connect.php";
try {
    $limit = 4;
    $sql = "SELECT word_id,word from article ORDER BY RAND() LIMIT :limit";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();

    $resaults = $stmt->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>darija dictionary</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" defer crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;500;600;700;800;900&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>

<body>

    <header class="container-fluid d-flex justify-content-center align-items-center flex-column p-5">
        <a class="h2 logo" href="">darija-dict</a>
        <p class=" text-center ">استكشاف النسيج الغني للدريجة المغربية: كشف الكلمات والمعاني عبر المناطق</p>
    </header>
    <div class="main container-fluid  px-5">
        <div class="row pt-5">
            <div class="right col-lg-6 ps-lg-5">
                <div class="search-form">
                    <div class="word">
                        <input class="form-control " type="text" id="searchQuery" name="searchQuery" placeholder="  ابحث عن عبارة">
                        <div class="search-resault">

                        </div>
                    </div>
                    <button type="submit"><i class="bi bi-search"></i></button>
                </div>
                <div class=" pub  mt-3 bg-light rounded-3 ">
                    <!-- <img src="pub.png" alt=""> -->
                </div>
                <table class="table  randTable mt-3 bg-light ">

                    <?php
                    foreach ($resaults as $record) {
                        echo "<tr><td><a href=\"def.php?word=$record->word\">$record->word</a></td></tr>";
                    }

                    ?>

                </table>
            </div>
            <div class="col-lg-6 pe-lg-5">
                <p class="lead text-lg-end  my-3 m-lg-0 text-center text-secondary ">أضف عبارات إلى القاموس</p>
                <div class="msg">

                </div>
                <form method="post" class="insert-form">
                    <input type="text" class="form-control" id="word" placeholder=" العبارة">
                    <select class="form-select mt-4" id="regionSelect">
                        <option value="" name="">إختر منطقة</option>
                        <option value="المغرب" name="maroc">المغرب</option>
                        <option value="طنجة-تطوان-الحسيمة" name="Tanger-Tetouan-Al Hoceima">طنجة-تطوان-الحسيمة</option>
                        <option value="الشرق" name="Oriental">الشرق</option>
                        <option value="فاس-مكناس " name="Fès-Meknès">فاس-مكناس</option>
                        <option value="الرباط-سلا-القنيطرة" name="Rabat-Salé-Kénitra">الرباط-سلا-القنيطرة</option>
                        <option value="بني ملال-خنيفرة" name="Béni Mellal-Khénifra">بني ملال-خنيفرة</option>
                        <option value="الدار البيضاء-سطات" name="Casablanca-Settat">الدار البيضاء-سطات</option>
                        <option value="مراكش-آسفي" name="Marrakesh-Safi">مراكش-آسفي</option>
                        <option value="درعة-تافيلالت" name="Drâa-Tafilalet">درعة-تافيلالت</option>
                        <option value="سوس-ماسة" name="Souss-Massa">سوس-ماسة</option>
                        <option value="كلميم-واد نون" name="Guelmim-Oued Noun">كلميم-واد نون</option>
                        <option value="العيون-الساقية الحمراء" name="Laâyoune-Sakia El Hamra">العيون-الساقية الحمراء</option>
                        <option value="الداخلة-وادي الذهب" name="Dakhla-Oued Ed-Dahab">الداخلة-وادي الذهب</option>
                    </select>
                    <textarea class="form-control mt-3" placeholder="المعنى" id="meaning"></textarea>


                    <button type="submit" class="btn btn-dark mt-3 mx-auto">أضف <i class="bi bi-plus-lg"></i></button>

                </form>

            </div>
        </div>
    </div>
    <a href="" class="text-secondary miloud">developped by AJOUAMY Miloud</a>
</body>
<!-- salam -->
</html>