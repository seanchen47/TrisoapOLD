<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 結帳頁</title>
等第三方支付出來了我才能想辦法丟參數啊<br>
不過既然你都按到這裡了，我就暫時當你這筆訂單付完錢了吧<br><br>
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$ORDNO = $_SESSION['ORDNO'];
$sql = "UPDATE ORDMAS SET PAYSTAT='1' WHERE ORDNO='$ORDNO'";
mysql_query($sql);

unset($_SESSION['ORDNO']);

if($EMAIL != null){
	if($CUSIDT == 'A'){
?>
<a href="../HomePages/index_manager.php">返回首頁</a>
<?php
	}
	else{
?>
<a href="../HomePages/index_customer.php">返回首頁</a>
<?php
	}
}
else{
?>
<a href="../HomePages/index.php">返回首頁</a>
<?php
}
?>