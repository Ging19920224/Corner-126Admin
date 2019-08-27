<?php
$json = file_get_contents('php://input');
// $json = ["account"=>"12345678","password"=>"31424837"];
$data = json_encode($json);
echo $data;
// echo "JSON：".$data."<br>";
// $result = json_decode($data);
// $account = $result->account;
// $password = $result->password;

// echo "account：".$account."<br>password：".$password;

?>