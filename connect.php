<?php
$server="localhost";
$username="root";
$password="";
$database="darija";
try{
    $conn=new PDO("mysql:host=$server;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "connected";
}
catch(PDOException $e){
  echo $e->getMessage();
}
?>