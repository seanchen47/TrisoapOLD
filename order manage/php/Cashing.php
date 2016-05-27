<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 結帳頁</title>
等第三方支付出來了我才能想辦法丟參數啊<br>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

unset($_SESSION['ORDNO']);

if($EMAIL != null){
	if($CUSIDT == 'A'){
?>
<a href="HomePage_Manager.php">返回首頁</a>
<?php
	}
	else{
?>
<a href="HomePage_Customer.php">返回首頁</a>
<?php
	}
}
else{
?>
<a href="HomePage.php">返回首頁</a>
<?php
}
?>