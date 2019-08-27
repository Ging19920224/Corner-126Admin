<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location:index.html");
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>轉角126後台管理系統 | 首頁</title>
</head>
<body>
    <h1>126</h1>
</body>
</html>