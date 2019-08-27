<?php
session_start();
$json = file_get_contents('php://input'); //接收AJAX的JSON
// $json = ["account"=>"12345678","password"=>"31424837"];
// $jsonData = json_encode($json);
$result = json_decode($json);  //將JSON轉換成陣列
$input_account = $result->account;
$input_password = $result->password;

// $data = array("account"=>$input_account,"password"=>$input_password);
// $msg = json_encode($data);
// echo $msg;

require_once("connMysql.php");
$inputAccount = htmlspecialchars($input_account, ENT_QUOTES);  //使用htmlspecialchars過濾特殊符號
$inputPassword = htmlspecialchars(md5($input_password), ENT_QUOTES); //使用htmlspecialchars過濾特殊符號，並將密碼加密
$check_sql = "SELECT * FROM `account` WHERE `account` = ? ";  
$check_Object = $db_link -> prepare($check_sql);  //將sql語法存入預備語句
$check_Object -> execute(array($inputAccount));
$result = $check_Object -> fetch();
$account = $result["account"];
$password = $result["password"];

if(empty($account)){
    $db_link = null;  //關閉資料庫連線
    $data = array("result"=>"0");
    $msg = json_encode($data);
    echo $msg; 
}elseif(!empty($account)&&($inputPassword != $password)){
    $db_link = null;  //關閉資料庫連線
    $data = array("result"=>"1");
    $msg = json_encode($data);
    echo $msg; 
}elseif($inputPassword === $password){
    $_SESSION["user"] = $result["account"];
    $db_link = null;  //關閉資料庫連線
    $data = array("result"=>"admin.php");
    $msg = json_encode($data);
    echo $msg; 
}

?>