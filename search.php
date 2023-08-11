<?php
require_once "connect.php";
$word=$_POST["query"];
if(isset($word)){  
    
    $output = '';  
    

    $query = "SELECT * FROM article WHERE word LIKE :word";
    
    $stmt = $conn->prepare($query);
    $stmt->bindValue(":word", '%' .$word. '%'); 
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  
    $output = '<ul class="list-unstyled">';  
    
    if(count($result) > 0){  
        foreach($result as $row){  
            // $output .= '<li>'.$row["word"].'</li>';  
            $output .= "<li class='py-2 border-1  border-bottom border-secondary'><a href='def.php?word={$row["word"]} ' target='_top' >{$row["word"]}</a></li>";  
        }  
    }else{  
        $output .= '<li>الكلمة غير معرفة في قاعدة البيانات، الرجاء إضافتها لتعم الفائدة</li>';  
    }  

    $output .= '</ul>';  
    echo $output;  
}
