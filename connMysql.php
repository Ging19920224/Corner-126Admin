<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "1234";
$db_name = "corner126";

//錯誤處理
try{
    //使用PDO連線資料庫
    $db_link = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8",$db_user,$db_password);
} catch(PDOException $e) {
    print "資料庫連線失敗，訊息：{$e->getMessage()}<br/>";
    die();
}



?>